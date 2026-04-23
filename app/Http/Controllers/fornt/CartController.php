<?php
namespace App\Http\Controllers\fornt;

use App\Http\Controllers\Admin\CategoryAndTexController;
use App\Http\Controllers\Controller;
use App\Models\CategoryAndTex;
use App\Models\Item;
use App\Models\ShippingAndDelivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    public function viewCart()
    {
        $cart = session()->get('cart', []);
        return view('Frontend.cart', compact('cart'));
    }
    
    public function addToCart(Request $request)
    {
        try {
            Log::info('Add to cart process started.');

            if (!Auth::check()) {
                Log::warning('User not authenticated.');
                return response()->json(['message' => 'Please log in to continue', 'redirect' => route('user-login'), 'status' => 401]);
            }

            $productId = $request->input('product_id');
            $quantity  = $request->input('quantity', 1);
            $variants  = $request->input('variant', []);
            $addons    = $request->input('addons', []);
            Log::info('Request data received.', compact('productId', 'quantity', 'variants', 'addons'));

            $product = Item::where('id', $productId)->first();
            if (!$product) {
                Log::error('Product not found.', ['product_id' => $productId]);
                return response()->json(['message' => 'Product not found', 'status' => 'false'], 404);
            }

            $tax = CategoryAndTex::where('id', $product->category)->first()->tax;
            Log::info('Product and tax details fetched.', ['product' => $product, 'tax' => $tax]);

            $cart = session()->get('cart', []);
            Log::info('Current cart fetched.', ['cart' => $cart]);

            $variantDetails = [];
            $addonDetails   = [];
            $variantTotal   = 0;
            $addonTotal     = 0;

            // Process variants
            if (!empty($variants)) {
                foreach ($variants as $variantName => $variantData) {
                    if (!isset($variantData['name'], $variantData['price'])) {
                        Log::error('Invalid variant data.', ['variant' => $variantData]);
                        return response()->json(['message' => 'Invalid variant data', 'status' => 'false'], 400);
                    }
                    $variantDetails[] = [
                        'name'  => $variantData['name'],
                        'price' => $variantData['price'],
                    ];
                    $variantTotal += $variantData['price'];
                }
                Log::info('Variants processed.', ['variantDetails' => $variantDetails, 'variantTotal' => $variantTotal]);
            } else {
                $variantDetails[] = [
                    'name'  => 'No Variant',
                    'price' => 0,
                ];
                Log::info('No variants provided.');
            }

            // Process addons
            if (!empty($addons)) {
                foreach ($addons as $addon) {
                    if (!isset($addon['name'], $addon['price'])) {
                        Log::error('Invalid addon data.', ['addon' => $addon]);
                        return response()->json(['message' => 'Invalid addon data', 'status' => 'false'], 400);
                    }
                    $addonDetails[] = [
                        'name'  => $addon['name'],
                        'price' => $addon['price'],
                    ];
                    $addonTotal += $addon['price'];
                }
                Log::info('Addons processed.', ['addonDetails' => $addonDetails, 'addonTotal' => $addonTotal]);
            } else {
                $addonDetails[] = [
                    'name'  => 'No Addon',
                    'price' => 0,
                ];
                Log::info('No addons provided.');
            }

            $totalPrice = ($product->current_price + $variantTotal + $addonTotal) * $quantity;
            Log::info('Total price calculated.', ['totalPrice' => $totalPrice]);

            if (isset($cart[$productId])) {
                $cart[$productId]['quantity'] += $quantity;
                $cart[$productId]['total'] += $totalPrice;
                Log::info('Product already in cart. Updated quantity and total.', ['productId' => $productId, 'cart' => $cart[$productId]]);
            } else {
                $cart[$productId] = [
                    'id'         => $product->id,
                    'user_id'    => Auth::id(),
                    'product_id' => $product->id,
                    'title'      => $product->title,
                    'quantity'   => $quantity,
                    'tax'        => $tax,
                    'price'      => $product->current_price,
                    'image'      => $product->featured_image,
                    'variants'   => $variantDetails,
                    'addons'     => $addonDetails,
                    'total'      => $totalPrice,
                ];
                Log::info('Product added to cart.', ['productId' => $productId, 'cart' => $cart[$productId]]);
            }

            session()->put('cart', $cart);
            Log::info('Cart updated in session.', ['cart' => $cart]);

            return response()->json(['message' => 'Product added to cart', 'cart' => $cart, 'status' => 200]);
        } catch (\Exception $e) {
            Log::error('Error adding to cart: ' . $e->getMessage(), ['exception' => $e]);
            return response()->json(['message' => 'An error occurred while adding the product to the cart', 'status' => 500], 500);
        }
    }

    public function updateCart(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity  = $request->input('quantity');

        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $product = $cart[$productId];

            // Calculate the base price (product price + variant + addon)
            $variantTotal = 0;
            $addonTotal   = 0;

            if (!empty($product['variants'])) {
                foreach ($product['variants'] as $variant) {
                    $variantTotal += $variant['price'];
                }
            }

            if (!empty($product['addons'])) {
                foreach ($product['addons'] as $addon) {
                    $addonTotal += $addon['price'];
                }
            }

            $basePrice = $product['price'] + $variantTotal + $addonTotal;

            if ($quantity > 0) {
                // Update quantity and total
                $cart[$productId]['quantity'] = $quantity;
                $cart[$productId]['total']    = $basePrice * $quantity;
            } else {
                // Remove product from cart if quantity is zero
                unset($cart[$productId]);
            }

            session()->put('cart', $cart);

            // Calculate cart totals and item count
            $shippingCharge = ShippingAndDelivery::orderBy("id", "desc")->first();

            $cart = session('cart', []);
            $cartTotal = array_sum(array_column($cart, 'total'));
            $cartSub = $cartTotal - ($shippingCharge->discount_amount ?? 0);
            $shipping = $shippingCharge->shipping_charge ?? 0;
            $delivery = $shippingCharge->delivery_charge ?? 0;
            $tax = ($cartTotal * array_sum(array_column($cart, 'tax', 0))) / 100;
            $grandTotal = $cartSub + $tax + $shipping + $delivery;
    
            $charges = [
                'ship' => $shipping,
                'discount' => $shippingCharge->discount_amount ?? 0,
                'delivery' => $delivery,
                'cart_total' => $cartTotal,
                'cart_sub_total' => $cartSub,
                'tax_amt' => $tax,
                'tax' => array_sum(array_column($cart, 'tax', 0)),
                'grand_total' => $grandTotal,
            ];

            return response()->json([
                'message'       => 'Cart updated',
                'cart'          => $cart,
                'total'         => $cart[$productId]['total'] ?? 0,
                'cartTotal'     => $cartTotal,
                'tax'           => $tax,
                'cartItemCount' => count($cart),
                'quantity'      => $cart[$productId]['quantity'] ?? 1,
                'charges'       => $charges,
            ]);
        }

        return response()->json(['message' => 'Item not found in cart. please add item and try again!'], 404);
    }

    public function removeFromCart(Request $request)
    {
        $productId = $request->input('product_id');
        $cart      = session()->get('cart', []);
        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
        }
        return response()->json(['message' => 'Product removed from cart', 'cart' => $cart]);
    }
}
