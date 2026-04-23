<?php
namespace App\Http\Controllers\fornt;

use App\Http\Controllers\Controller;
use App\Models\Addon;
use App\Models\Blog;
use App\Models\CategoryAndTex;
use App\Models\Item;
use App\Models\Order;
use App\Models\Policy;
use App\Models\SliderImage;
use App\Models\Subscribe;
use App\Models\Variant;
use App\Models\VariantOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{

    public function index()
    {
        $category  = CategoryAndTex::where('delete_category', 0)->orderBy("created_at", "desc")->get();
        $item      = Item::where(['delete_item' => 0, 'status' => 0])->orderBy("created_at", "desc")->take(3)->get();
        $itemPizza = Item::where(['delete_item' => 0, 'status' => 0])->orderBy("created_at", "desc")->take(10)->get();
        $blog      = Blog::all();

        $addon         = [];
        $variant       = [];
        $variantOption = [];
        $response      = [];

        foreach ($item as $product) {
            // Get variants for each product
            $variant[$product->id] = Variant::where('product_id', $product->id)->get();

            foreach ($variant[$product->id] as $variantItem) {
                $variantOption[$variantItem->id . '_' . $product->id] = VariantOption::where('variant_id', $variantItem->id)->get();
            }

            // Get add-ons for each product
            $addon[$product->id] = Addon::where('product_id', $product->id)->get();

            // Map the product data
            $response[$product->id] = [
                'id'             => $product->id,
                'language_id'    => 1, // Assuming the product has this field
                'title'          => $product->title,
                'slug'           => $product->slug,
                'category_id'    => $product->category,
                'feature_image'  => str_replace('images/item/', '', $product->featured_image),
                'summary'        => $product->summary,
                'description'    => strip_tags($product->description),
                'variations'     => $this->getVariations($variant[$product->id]),
                'addons'         => $this->getAddons($addon[$product->id]),
                'current_price'  => $product->current_price,
                'previous_price' => $product->previous_price,
                'rating'         => 4,
                'status'         => $product->status,
                'is_feature'     => 1,
                'created_at'     => $product->created_at,
                'updated_at'     => $product->updated_at,
                'is_special'     => 0,
                'subcategory_id' => $product->subcategory,
            ];
        }
        return view("Frontend.home", compact(["category", "item", "itemPizza", "response", "blog"]));
    }

    public function getProduct(Request $request)
    {
        $id       = $request->id;
        $products = Item::where('subcategory', $id)->take(4)->get();

        // $addon         = [];
        // $variant       = [];
        // $variantOption = [];
        // $response      = [];

        // foreach ($products as $product) {
        //     // Get variants for each product
        //     $variant[$product->id] = Variant::where('product_id', $product->id)->get();

        //     foreach ($variant[$product->id] as $variantItem) {
        //         $variantOption[$variantItem->id . '_' . $product->id] = VariantOption::where('variant_id', $variantItem->id)->get();
        //     }

        //     // Get add-ons for each product
        //     $addon[$product->id] = Addon::where('product_id', $product->id)->get();

        //     // Map the product data
        //     $response[] = [
        //         'id'             => $product->id,
        //         'language_id'    => 1, // Assuming the product has this field
        //         'title'          => $product->title,
        //         'slug'           => $product->slug,
        //         'category_id'    => $product->category,
        //         'feature_image'  => str_replace('images/item/', '', $product->featured_image),
        //         'summary'        => $product->summary,
        //         'description'    => strip_tags($product->description),
        //         'variations'     => $this->getVariations($variant[$product->id]),
        //         'addons'         => $this->getAddons($addon[$product->id]),
        //         'current_price'  => $product->current_price,
        //         'previous_price' => $product->previous_price,
        //         'rating'         => 4,
        //         'status'         => $product->status,
        //         'is_feature'     => 1,
        //         'created_at'     => $product->created_at,
        //         'updated_at'     => $product->updated_at,
        //         'is_special'     => 0,
        //         'subcategory_id' => $product->subcategory,
        //     ];
        // }

        $addon         = [];
        $variant       = [];
        $variantOption = [];
        $response      = [];

        foreach ($products as $product) {
            // Get variants for each product
            $variant[$product->id] = Variant::where('product_id', $product->id)->get();

            foreach ($variant[$product->id] as $variantItem) {
                $variantOption[$variantItem->id . '_' . $product->id] = VariantOption::where('variant_id', $variantItem->id)->get();
            }

            // Get add-ons for each product
            $addon[$product->id] = Addon::where('product_id', $product->id)->get();

            // Map the product data
            $response['json_' . $product->id] = [
                'id'             => $product->id,
                'language_id'    => 1, // Assuming the product has this field
                'title'          => $product->title,
                'slug'           => $product->slug,
                'category_id'    => $product->category,
                'feature_image'  => str_replace('images/item/', '', $product->featured_image),
                'summary'        => $product->summary,
                'description'    => strip_tags($product->description),
                'variations'     => $this->getVariations($variant[$product->id]),
                'addons'         => $this->getAddons($addon[$product->id]),
                'current_price'  => $product->current_price,
                'previous_price' => $product->previous_price,
                'rating'         => 4,
                'status'         => $product->status,
                'is_feature'     => 1,
                'created_at'     => $product->created_at,
                'updated_at'     => $product->updated_at,
                'is_special'     => 0,
                'subcategory_id' => $product->subcategory,
            ];
        }
        $response['item'] = $products;
        return response()->json($response);
    }

    // Helper function to map variations
    private function getVariations($variants)
    {
        $variations = [];
        foreach ($variants as $variant) {
            $variantOptions = VariantOption::where('variant_id', $variant->id)->get();
            $options        = [];
            foreach ($variantOptions as $option) {
                $options[] = [
                    'name'  => $option->name,
                    'price' => $option->price,
                ];
            }
            $variations[$variant->name] = $options;
        }
        return $variations;
    }

// Helper function to map addons
    private function getAddons($addons)
    {
        $addonArray = [];
        foreach ($addons as $addon) {
            $addonArray[] = [
                'name'  => $addon->name,
                'price' => $addon->price,
            ];
        }
        return $addonArray;
    }

    public function getProductById(Request $request, $slug)
    {
        $product       = Item::where('slug', $slug)->first();
        $addon         = Addon::where('product_id', $product->id)->get();
        $variant       = Variant::where('product_id', $product->id)->get();
        $sliderImage   = SliderImage::where('item_id', $product->id)->get();
        $variantOption = [];

        foreach ($variant as $variantItem) {
            $variantOption[$variantItem->name] = VariantOption::where('variant_id', $variantItem->id)->get()->map(function ($option) {
                return [
                    'name'  => $option->name,
                    'price' => $option->price,
                ];
            });
        }

        $response = [
            'id'             => (string) $product->id,
            'language_id'    => '176', // Assuming a static language ID
            'title'          => $product->title,
            'slug'           => $product->slug,
            'category_id'    => $product->category,
            'feature_image'  => str_replace('images/item/', '', $product->featured_image),
            'summary'        => $product->summary,
            'description'    => strip_tags($product->description),
            'variations'     => $variantOption,
            'addons'         => $addon->map(function ($addonItem) {
                return [
                    'name'  => $addonItem->name,
                    'price' => $addonItem->price,
                ];
            }),
            'current_price'  => $product->current_price,
            'previous_price' => $product->previous_price,
            'rating'         => 4.67, // Assuming a static rating
            'status'         => $product->status,
            'is_feature'     => 1, // Assuming a static value
            'created_at'     => $product->created_at,
            'updated_at'     => $product->updated_at,
            'is_special'     => 0, // Assuming a static value
            'subcategory_id' => $product->subcategory,
            'input_data'     => [
                'product_id' => $request->input('product_id'),
                'quantity'   => $request->input('quantity'),
                'variant'    => $request->input('variant'),
                'addons'     => $request->input('addons'),
            ],
        ];

        // return response()->json($response);
        return view('Frontend.item_detali', compact('response', 'sliderImage', 'product'));
    }

    public function getAllProduct()
    {
        $products = Item::where(['delete_item' => 0, 'status' => 0])->orderBy("created_at", "desc")->get();
        $category = CategoryAndTex::where('delete_category', 0)->orderBy("created_at", "desc")->get();

        $addon         = [];
        $variant       = [];
        $variantOption = [];
        $response      = [];

        foreach ($products as $product) {
            // Get variants for each product
            $variant[$product->id] = Variant::where('product_id', $product->id)->get();

            foreach ($variant[$product->id] as $variantItem) {
                $variantOption[$variantItem->id . '_' . $product->id] = VariantOption::where('variant_id', $variantItem->id)->get();
            }

            // Get add-ons for each product
            $addon[$product->id] = Addon::where('product_id', $product->id)->get();

            // Map the product data
            $response[$product->id] = [
                'id'             => $product->id,
                'language_id'    => 1, // Assuming the product has this field
                'title'          => $product->title,
                'slug'           => $product->slug,
                'category_id'    => $product->category,
                'feature_image'  => str_replace('images/item/', '', $product->featured_image),
                'summary'        => $product->summary,
                'description'    => strip_tags($product->description),
                'variations'     => $this->getVariations($variant[$product->id]),
                'addons'         => $this->getAddons($addon[$product->id]),
                'current_price'  => $product->current_price,
                'previous_price' => $product->previous_price,
                'rating'         => 4,
                'status'         => $product->status,
                'is_feature'     => 1,
                'created_at'     => $product->created_at,
                'updated_at'     => $product->updated_at,
                'is_special'     => 0,
                'subcategory_id' => $product->subcategory,
            ];
        }

        // return response()->json($response);
        return view('Frontend.menu', compact("products", "category", "response"));
    }

    public function getProductByCategory(Request $request, $slug)
    {
        $categoryid = CategoryAndTex::where('slug', $slug)->first();
        $products   = Item::where(['category' => $categoryid->id, 'delete_item' => 0, 'status' => 0])->orderBy("created_at", "desc")->get();
        $category   = CategoryAndTex::where('delete_category', 0)->orderBy("created_at", "desc")->get();

        $addon         = [];
        $variant       = [];
        $variantOption = [];
        $response      = [];

        foreach ($products as $product) {
            // Get variants for each product
            $variant[$product->id] = Variant::where('product_id', $product->id)->get();

            foreach ($variant[$product->id] as $variantItem) {
                $variantOption[$variantItem->id . '_' . $product->id] = VariantOption::where('variant_id', $variantItem->id)->get();
            }

            // Get add-ons for each product
            $addon[$product->id] = Addon::where('product_id', $product->id)->get();

            // Map the product data
            $response[$product->id] = [
                'id'             => $product->id,
                'language_id'    => 1, // Assuming the product has this field
                'title'          => $product->title,
                'slug'           => $product->slug,
                'category_id'    => $product->category,
                'feature_image'  => str_replace('images/item/', '', $product->featured_image),
                'summary'        => $product->summary,
                'description'    => strip_tags($product->description),
                'variations'     => $this->getVariations($variant[$product->id]),
                'addons'         => $this->getAddons($addon[$product->id]),
                'current_price'  => $product->current_price,
                'previous_price' => $product->previous_price,
                'rating'         => 4,
                'status'         => $product->status,
                'is_feature'     => 1,
                'created_at'     => $product->created_at,
                'updated_at'     => $product->updated_at,
                'is_special'     => 0,
                'subcategory_id' => $product->subcategory,
            ];
        }

        return view('Frontend.menu', compact("products", "category", "response"));
    }

    public function getSpecialProducts(Request $request)
    {
        $category = CategoryAndTex::where('delete_category', 0)->orderBy("created_at", "desc")->get();
        $products = Item::where(['delete_item' => 0, 'status' => 0])->orderBy("created_at", "desc")->take(3)->get();
        // $products      = Item::where('is_special', 1)->get();
        $response = [];

        foreach ($products as $product) {
            $addon         = Addon::where('product_id', $product->id)->get();
            $variant       = Variant::where('product_id', $product->id)->get();
            $variantOption = [];

            foreach ($variant as $variantItem) {
                $variantOption[$variantItem->name] = VariantOption::where('variant_id', $variantItem->id)->get()->map(function ($option) {
                    return [
                        'name'  => $option->name,
                        'price' => $option->price,
                    ];
                });
            }

            $response[] = [
                'id'             => (string) $product->id,
                'language_id'    => '176', // Assuming a static language ID
                'title'          => $product->title,
                'slug'           => $product->slug,
                'category_id'    => $product->category,
                'feature_image'  => str_replace('images/item/', '', $product->featured_image),
                'summary'        => $product->summary,
                'description'    => strip_tags($product->description),
                'variations'     => $variantOption,
                'addons'         => $addon->map(function ($addonItem) {
                    return [
                        'name'  => $addonItem->name,
                        'price' => $addonItem->price,
                    ];
                }),
                'current_price'  => $product->current_price,
                'previous_price' => $product->previous_price,
                'rating'         => 4.67, // Assuming a static rating
                'status'         => $product->status,
                'is_feature'     => 1, // Assuming a static value
                'created_at'     => $product->created_at,
                'updated_at'     => $product->updated_at,
                'is_special'     => $product->is_special,
                'subcategory_id' => $product->subcategory,
            ];
        }

        return response()->json($response);
    }

    public function subscribeEmail(Request $request)
    {
        // Validate the email
        $validated = $request->validate([
            'email' => 'required|string|email|max:255|unique:subscribes',
        ]);

        $subscriber = Subscribe::create([
            'user_id' => Auth::id(),
            'email'   => $validated['email'],
        ]);

        if ($subscriber) {
            return response()->json([
                'success' => true,
                'message' => 'Subscription successful!',
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Subscription Falied!',
            ], 202);
        }

    }

    public function getSubcribe()
    {
        $subscriber = Subscribe::all();
        return view('admin.user.subscribes', compact('subscriber'));
    }

    public function getRecentOrders()
    {
        // Get the most recent orders, limit the number based on your requirement
        $recentOrders = Order::latest()->take(5)->get();
        return response()->json($recentOrders);
    }

    public function showPolicy($slug)
    {
       
        $policy = Policy::where('slug', $slug)->first();
       
        return view('Frontend.privacy', compact('policy'));
    }
     
    public function searchItem(Request $request){

        $item  = Item::where('title', 'like', '%' . $request->search . '%')->get();

        return response()->json($item);
    }

    public function sendEmail(Request $request)
    {
        $email = $request->all(); // Get all request data

        // Validate the email data
        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Send the email
        $this->sendEmailToUser($email);
    }
    private function sendEmailToUser($email)
    {
        $userEmail      = Auth::user()->email; // Get the authenticated user's email
        $subject        = $email['subject'];   // Subject from the $email parameter
        $messageContent = $email['message'];   // Message from the $email parameter

        $data = ['name' => 'Admin', 'bodyMessage' => $messageContent];

        // Log the email details
        Log::info('Sending email', ['to' => $userEmail, 'subject' => $subject]);

        try {
            // Send the email with custom "From" address
            Mail::send('emails.contact', $data, function ($mailMessage) use ($userEmail, $subject) {
                $mailMessage->to($userEmail)
                    ->subject($subject)
                    ->from('deepaksharma62354@gmail.com', 'Deepak Sharma'); // Set custom "From" email
            });

            // Log success message
            Log::info('Email sent successfully', ['to' => $userEmail, 'subject' => $subject]);
            return response()->json([
                'success' => true,
                'message' => 'Email sent successfully!',
                'status' => 200,
            ], 200);

        } catch (\Exception $e) {
            // Log failure message
            Log::error('Email sending failed', [
                'to'      => $userEmail,
                'subject' => $subject,
                'error'   => $e->getMessage(),
            ]);
            return response()->json([
                'success' => false,
                'message' => 'Email sent Falied!',
                'status' => 201,
            ], 201);

        }
    }

    public function checkEmail(){
        $userEmail      = 'deepaksharma62354@gmail.com'; // Get the authenticated user's email
        $subject        = "Mail Check";   // Subject from the $email parameter
        $messageContent = 'Test Email';   // Message from the $email parameter

        $data = ['name' => 'Admin', 'bodyMessage' => $messageContent];

        // Log the email details
        Log::info('Sending email', ['to' => $userEmail, 'subject' => $subject]);

        try {
            // Send the email with custom "From" address
            Mail::send('emails.contact', $data, function ($mailMessage) use ($userEmail, $subject) {
                $mailMessage->to($userEmail)
                    ->subject($subject)
                    ->from('restorent@brandmoso.com', 'Bihar Capital'); // Set custom "From" email
            });

            // Log success message
            Log::info('Email sent successfully', ['to' => $userEmail, 'subject' => $subject]);
            return response()->json([
                'success' => true,
                'message' => 'Email sent successfully!',
                'status' => 200,
            ], 200);

        } catch (\Exception $e) {
            // Log failure message
            Log::error('Email sending failed', [
                'to'      => $userEmail,
                'subject' => $subject,
                'error'   => $e->getMessage(),
            ]);
            return response()->json([
                'success' => false,
                'message' => 'Email sent Falied!',
                'status' => 201,
            ], 201);

        }
    }
}
