<?php
namespace App\Http\Controllers\fornt;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\BillingAddress;
use App\Models\CategoryAndTex;
use App\Models\Item;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Payment;
use App\Models\Promocode;
use App\Models\ShippingAndDelivery;
use App\Models\UserCoupon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        Log::info('Validation data', ['request_data' => $request->all()]);
        // Validate the incoming request data
        $validatedData = $request->validate([
            // 'billing_fname'   => 'required|string|max:255',
            // 'billing_lname'   => 'required|string|max:255',
            // 'billing_email'   => 'required|email',
            // 'billing_number'  => 'required|string',
            // 'billing_address' => 'required|string|max:255',
            // 'billing_city'    => 'required|string|max:255',
            // 'shpping_fname'   => 'required_if:serving_method,home_delivery|string|max:255',
            // 'shpping_lname'   => 'nullable|string|max:255',
            // 'shpping_email'   => 'required_if:serving_method,home_delivery|email',
            // 'shpping_number'  => 'required_if:serving_method,home_delivery|string',
            // 'shpping_address' => 'required_if:serving_method,home_delivery|string|max:255',
            // 'shpping_city'    => 'required_if:serving_method,home_delivery|string|max:255',
            //  'delivery_date'   => 'required|date',
            // 'delivery_time'   => 'required|string',
            // 'order_notes'     => 'nullable|string',
            // 'grandTotal'      => 'required|numeric',
            // 'payment_method'  => 'required|string',
        ]);

        Log::info('Validation data', ['validated_data' => $validatedData]);

        try {
            Log::info('Validation passed', ['user_id' => Auth::id()]);
            $promocode = Promocode::where('code', $request->coupon)->first();
            $shippingAddress = null;
            if ($request->address_id == '') {
                // Handle shipping address if serving method is home delivery
                if ($request->serving_method === 'home_delivery') {
                    $shippingAddress = Address::firstOrCreate([
                        'user_id'        => Auth::id(),
                        'billing_fname'  => $request->shpping_fname . ' ' . $request->shpping_lname,
                        'address'        => $request->shpping_address . ', ' . $request->shpping_city,
                        'billing_email'  => $request->shpping_email,
                        'billing_number' => $request->shpping_number,
                    ]);
                    Log::info('Shipping address created', ['shipping_address_id' => $shippingAddress->id]);
                }

                // Handle billing address
                $billingAddress = BillingAddress::firstOrCreate([
                    // 'user_id'        => Auth::id(),
                    // 'billing_fname'  => $request->billing_fname . ' ' . $request->billing_lname,
                    // 'address'        => $request->billing_address . ', ' . $request->billing_city,
                    // 'billing_email'  => $request->billing_email,
                    // 'billing_number' => $request->billing_number,
                    'user_id'        => Auth::id(),
                    'billing_fname'  => $request->shpping_fname . ' ' . $request->shpping_lname,
                    'address'        => $request->shpping_address . ', ' . $request->shpping_city,
                    'billing_email'  => $request->shpping_email,
                    'billing_number' => $request->shpping_number,
                ]);
                Log::info('Billing address created', ['billing_address_id' => $billingAddress->id]);
            }

            // Create the order
            $orderNumber = $request->orderId;
            if ($request->gateway == 'Cash') {
                $paymentNumber = 'PAY-' . strtoupper(uniqid());
            } else {
                $paymentNumber = $request->payment_id;
            }

            $order = Order::create([
                'user_id'            => Auth::id(),
                'order_number'       => $orderNumber,
                'address_id'         => $shippingAddress ? $shippingAddress->id : $request->address_id,
                'billing_address_id' => $shippingAddress ? $shippingAddress->id : $request->address_id,
                'serving_method'     => $request->serving_method === 'home_delivery' ? 'Home Delivery' : $request->serving_method,
                'delivery_date'      => now()->toDateString(),
                'delivery_time'      => now()->toTimeString(),
                'order_notes'        => $request->order_notes,
                'tax_ship'           => $request->ship,
                'tax_discount'       => $request->discount,
                'coupon_discount'    => $request->codediscount,
                'tax_delivery'       => $request->delivery,
                'tax_total'          => $request->tax,
                'total_amount'       => $request->grandTotal,
                'order_type'         => $request->gateway,
                'payment_method'     => $request->gateway,
            ]);
            Log::info('Order created', ['order_id' => $order->id, 'order_number' => $orderNumber]);

            $variants = [];
            $addons   = [];
            // Loop through the cart items and create order details
            foreach (session('cart', []) as $item) {
                if (! empty($item['variants']) && is_array($item['variants'])) {
                    foreach ($item['variants'] as $variant) {
                        $variants['name'][]       = $variant['name'] ?? '';
                        $variants['product_id'][] = $item['id'];
                        $variants['price'][]      = $variant['price'] ?? 0;
                        $variants['order_id'][]   = $order->id;

                    }

                }
            }

            Log::info('Order variants', ['order_id' => $order->id, 'variants' => json_encode($variants)]);

            foreach (session('cart', []) as $item) {
                if (! empty($item['addons']) && is_array($item['addons'])) {
                    foreach ($item['addons'] as $addon) {
                        $addons['name'][]       = $addon['name'] ?? '';
                        $addons['product_id'][] = $item['id'];
                        $addons['price'][]      = $addon['price'] ?? 0;
                        $addons['order_id'][]   = $order->id;

                    }
                }
            }
            Log::info('Order addons', ['order_id' => $order->id, 'addons' => json_encode($addons)]);

            foreach (session('cart', []) as $item) {
                OrderDetails::create([
                    'order_id'     => $order->id,
                    'product_id'   => $item['id'],
                    'quantity'     => $item['quantity'],
                    'total_amount' => $item['price'],
                    'tax'          => $item['price'] * $item['tax'] / 100,
                    'variants'     => json_encode($variants),
                    'addons'       => json_encode($addons),
                ]);
            }

            // Create the payment
            $payment = Payment::create([
                'user_id'        => Auth::id(),
                'order_id'       => $order->id,
                'payment_number' => $paymentNumber,
                'payment_method' => $request->payment_method,
                'payment_status' => $request->payment_status,
                'amount'         => $request->grandTotal,
            ]);
            Log::info('Payment created', ['payment_id' => $payment->id, 'payment_number' => $paymentNumber]);
            // Clear the cart session after successful order placement
            session()->forget('cart');
            
            /// Remove the coupon from the table
            UserCoupon::where('user_id', Auth::id())
            ->where('promocode_id', $promocode->id)
            ->delete();

            Log::info('Cart session cleared', ['user_id' => Auth::id()]);
            return response()->json(['success' => true, 'message' => 'Order placed successfully!', 'status' => 200, 'url' => url('/')]);

        } catch (\Exception $e) {
            Log::error('Error placing order', [
                'user_id' => Auth::id(),
                'error'   => $e->getMessage(),
            ]);

            // return redirect()->back()->with('error', 'An error occurred while placing the order: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'An error occurred while placing the order: ' . $e->getMessage(), 'status' => 201]);
        } catch (\Exception $e) {
            Log::error('Error placing order', [
                'user_id' => Auth::id(),
                'error'   => $e->getMessage(),
            ]);

            return response()->json(['success' => false, 'message' => 'An error occurred while placing the order: ' . $e->getMessage(), 'status' => 201]);
        }
    }

    public function getRecentOrders()
    {
        if (! Auth::check()) {
            return response()->json(['orders' => []]);
        }

        $orders = Order::with(['orderDetalies', 'payment'])
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get()
            ->map(function ($order) {
                return [
                    'order_number' => $order->order_number,
                    'date'         => $order->created_at->format('d M Y'),
                    'total'        => $order->total_amount,
                    'status'       => $order->payment->payment_status ?? 'pending',
                    'items'        => $order->orderDetalies->count(),
                ];
            });

        return response()->json(['orders' => $orders]);
    }

    public function orderComplain(Request $request)
    {
        $order           = Order::find($request->id);
        $order->complain = $request->complain;
        $order->save();
        if ($order) {
            return response()->json(['success' => true, 'message' => 'Your Complain Register Successfully!'], 200);
        } else {
            return response()->json(['success' => true, 'message' => 'Your Complain Register Falied!'], 401);
        }
    }

    public function reOrder(Request $request)
    {
        $order = Order::with('orderDetalies')->find($request->order_id);

        try {
            foreach ($order->orderDetalies as $item) {
                Log::info('Add to cart process started.');

                if (! Auth::check()) {
                    Log::warning('User not authenticated.');
                    return response()->json(['message' => 'Please log in to continue', 'redirect' => route('user-login'), 'status' => 401]);
                }

                $productId = $item->product_id;
                $quantity  = $item->quantity;
                $variants  = json_decode($item->variants);
                $addons    = json_decode($item->addons);
                Log::info('Request data received.', compact('productId', 'quantity', 'variants', 'addons'));

                $product = Item::where('id', $productId)->first();
                if (! $product) {
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
                if (! empty($variants)) {
                    Log::info('Processing variants.', ['variants' => $variants]);
                    foreach ($variants->name as $index => $name) {
                        $variantDetails[] = [
                            'name'  => $name,
                            'price' => $variants->price[$index],
                        ];
                        $variantTotal += $variants->price[$index];
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
                if (! empty($addons)) {
                    foreach ($addons->name as $index => $namead) {
                        $addonDetails[] = [
                            'name'  => $namead,
                            'price' => $addons->price[$index],
                        ];
                        $addonTotal += $addons->price[$index];
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
            }
            // Send response after processing all items
            return response()->json(['message' => 'All products added to cart', 'cart' => $cart, 'status' => 200]);
        } catch (\Exception $e) {
            Log::error('Error adding to cart: ' . $e->getMessage(), ['exception' => $e]);
            return response()->json(['message' => 'An error occurred while adding the product to the cart', 'status' => 500], 500);
        }

    }

    public function cancelOrder(Request $request)
    {
        $orderId = $request->input('order_id');
        $order   = Order::find($orderId);
        if (! $order) {
            return response()->json(['success' => false, 'message' => 'Order not found', 'status' => 404], 404);
        }
        $order->order_status = 'Cancelled';
        $order->save();

        return response()->json(['success' => true, 'message' => 'Order cancelled successfully', 'status' => 200], 200);

        // Call the sendEmail method to send the email notification
    }

    public function applyCoupon(Request $request)
    {
        $userId = Auth::id(); // define early for error tracking

        try {
            $request->validate([
                'coupon_code' => 'required|string',
            ]);

            $couponCode = $request->input('coupon_code');

            // Calculate cart totals and item count
            $shippingCharge = ShippingAndDelivery::orderBy("id", "desc")->first();

            $cart       = session('cart', []);
            $cartTotal  = array_sum(array_column($cart, 'total'));
            $cartSub    = $cartTotal - ($shippingCharge->discount_amount ?? 0);
            $shipping   = $shippingCharge->shipping_charge ?? 0;
            $delivery   = $shippingCharge->delivery_charge ?? 0;
            $tax        = ($cartTotal * array_sum(array_column($cart, 'tax', 0))) / 100;
            $grandTotal = $cartSub + $tax + $shipping + $delivery;

            $cartTotal = $grandTotal;

            Log::info("User {$userId} is trying to apply coupon: {$couponCode} with cart total: {$cartTotal}");

            $promocode = Promocode::where('code', $couponCode)->first();

            if (! $promocode) {
                Log::warning("Invalid coupon attempt by user {$userId}: {$couponCode}");
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid coupon code',
                    'status'  => 404,
                ], 404);
            }

            $currentDate = now();
            Log::info("Coupon details: Start Date: {$promocode->start_date}, End Date: {$promocode->end_date}, Current Date: {$currentDate}");

            if (! $promocode->is_active) {
                return response()->json([
                    'success' => false,
                    'message' => 'Coupon code is inactive',
                    'status'  => 403,
                ], 403);
            }

            if ($promocode->start_date && Carbon::parse($promocode->start_date)->gt($currentDate)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Coupon code is not yet valid',
                    'status'  => 403,
                ], 403);
            }

            if ($promocode->end_date && Carbon::parse($promocode->end_date)->lt($currentDate)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Coupon code has expired',
                    'status'  => 403,
                ], 403);
            }

            if ($promocode->max_uses && $promocode->uses >= $promocode->max_uses) {
                return response()->json([
                    'success' => false,
                    'message' => 'Coupon code has reached its maximum usage limit',
                    'status'  => 403,
                ], 403);
            }

            if (UserCoupon::where('user_id', $userId)
                ->where('promocode_id', $promocode->id)
                ->exists()) {
                return response()->json([
                    'success' => false,
                    'message' => 'You have already used this coupon code',
                    'status'  => 403,
                ], 403);
            }

            $discount = $promocode->discount_type === 'percentage'
            ? ($cartTotal * $promocode->discount) / 100
            : $promocode->discount;

            $discount = min($discount, $cartTotal);

            // Round the discount to 2 decimal places
            $discount = round($discount, 2);

            // Subtract and round the new total
            $newTotal = round($cartTotal - $discount, 2);

            session(['cart_total' => $newTotal]);
            $promocode->increment('uses');

            UserCoupon::create([
                'user_id'      => $userId,
                'promocode_id' => $promocode->id,
            ]);

            Log::info("Coupon applied successfully by user {$userId}: {$couponCode}, Discount: {$discount}, New total: {$newTotal}");

            return response()->json([
                'success'   => true,
                'message'   => 'Coupon code applied successfully',
                'new_total' => $newTotal,
                'discount'  => $discount,
                'status'    => 200,
            ], 200);

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error("Validation error during coupon application by user {$userId}: " . $e->getMessage(), $e->errors());
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
                'errors'  => $e->errors(),
                'status'  => 422,
            ], 422);

        } catch (\Exception $e) {
            Log::error("Exception during coupon application by user {$userId}: " . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong. Please try again later.',
                'error'   => $e->getMessage(),
                'status'  => 500,
            ], 500);
        }
    }

    public function removeCoupon(Request $request)
    {
        $userId     = $request->user()->id;
        $couponCode = $request->input('coupon_code');
        $cartTotal  = session('cart_total');
        $promocode  = Promocode::where('code', $couponCode)->first();
        if (! $promocode) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid coupon code',
                'status'  => 404,
            ], 404);
        }
        $discount = $promocode->discount_type === 'percentage'
        ? $cartTotal * ($promocode->discount / 100)
        : $promocode->discount;
        $newTotal = $cartTotal + $discount;
        $newTotal = round($newTotal, 2);
        session(['cart_total' => $newTotal]);
        $promocode->decrement('uses');
        $promocode->save();

        UserCoupon::where('user_id', $userId)
            ->where('promocode_id', $promocode->id)
            ->delete();
        Log::info("Coupon removed successfully by user {$userId}: {$couponCode}, New total: {$newTotal}");
        return response()->json([
            'success'   => true,
            'message'   => 'Coupon code removed successfully',
            'new_total' => $newTotal,
            'status'    => 200,
        ], 200);
    }

    // Send the email using the Mailable class
    // Mail::to($email)->send(new YourMailableClass($data));
    // return response()->json(['success' => true, 'message' => 'Email sent successfully', 'status' => 200], 200);
}
