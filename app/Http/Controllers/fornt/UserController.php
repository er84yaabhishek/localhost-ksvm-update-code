<?php
namespace App\Http\Controllers\fornt;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\BillingAddress;
use App\Models\Order;
use App\Models\user\User;
use App\Models\Verification_code;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showLoginForm()
    {
        return view('Frontend.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function showRegistrationForm()
    {
        return view('Frontend.register');
    }

    public function register(Request $request)
    {

        if ($request->type == 'resend_otp') {
            dd($request->all());
            $this->SendOtp($request ,$type = 'resend_otp');
            return response()->json(['success' => true, 'message' => 'OTP resent successfully']);

        }

        $request->validate([
            'name'              => 'required|string|max:255',
            'mobile'            => 'required|string|digits:10|unique:users,mobile',
            // 'email' => 'required|string|email|max:255|unique:users',
            'verification_code' => 'required|string|digits:6',
            'password'          => 'required|string|min:6|confirmed',
        ]);
        // Verify OTP

        $verification_code = Verification_code::where('number', $request->mobile)
            ->where('otp', $request->verification_code)
            ->where('status', 'pending')
            ->notExpired()
            ->first();
        if ($verification_code) {
            $verification_code->status = 'verified';
            $verification_code->save();
            // Create user
            $user = User::create([
                'name'     => $request->name,
                'mobile'   => $request->mobile,
                'email'    => $request->email ?? '',
                'password' => Hash::make($request->password),
                'role'     => 'user',
            ]);

            Auth::login($user);

            return response()->json(['success' => true, 'url' => url('/'), 'message' => 'Registered Successfully']);

        } else {
            return response()->json(['success' => false, 'message' => 'Invalid OTP']);
        }

        //return redirect()->intended('/');
    }

    public function SendOtp(Request $request, $type = '')
    {
        // Validate input only for new OTP requests (not for resend)
        if ($type !== 'resend_otp') {
            $request->validate([
                'name'     => 'required|string|max:255',
                'mobile'   => 'required|string|digits:10|unique:users,mobile',
                'password' => 'required|string|min:6|confirmed',
            ]);
        }

        $mobile = $request->mobile;
        $otp    = rand(100000, 999999);

        // Handle resend OTP
        if ($request->type === 'resend_otp') {
            $verificationCode = Verification_code::where('number', $mobile)
                //->where('status', 'pending')
               // ->notExpired()
                ->first();

            if ($verificationCode) {
                $verificationCode->update([
                    'otp'        => $otp,
                    'expires_at' => now()->addSeconds(300), // Extend OTP validity (5 minutes)
                ]);

                // TODO: Send OTP via SMS here

                return response()->json(['success' => true, 'message' => 'OTP resent successfully', 'otp' => $otp]); // Remove this in production!
            }

            return response()->json(['success' => false, 'message' => 'No pending OTP found']);
        }

        // Create new verification code
        $verificationCode = Verification_code::create([
            'number'              => $mobile,
            'otp'                 => $otp,
            'status'              => 'pending',
            'expires_at'          => now()->addSeconds(60),
            'verification_type'   => 'sms',
            'verification_method' => 'automatic',
        ]);

        // TODO: Send OTP via SMS here

        if ($verificationCode) {
            return response()->json([
                'success' => true,
                'message' => 'OTP sent successfully',
                'otp'     => $otp, // Remove this in production!
            ]);
        }

        return response()->json(['success' => false, 'message' => 'Failed to send OTP']);
    }

    public function dashboard()
    {
        $user_id = Auth::id();
        $user    = User::find($user_id); // Fetch user details

        if (! $user) {
            abort(404, 'User not found');
        }
        return view('Frontend.dashboard', compact('user'));
    }

    public function orderpage()
    {
        $user_id = Auth::id();
        $orders  = Order::where('user_id', $user_id)->with('orderDetailsWithProducts')->orderBy("created_at", "desc")->get();
        //  dd($orders);
        return view('Frontend.order', compact('orders'));
    }
    public function shippingdetailpage()
    {
        $user_id = Auth::id();
        $Address = Address::where('user_id', $user_id)->get();
        return view('Frontend.shippingdetail', compact('Address'));
    }

    public function billingdetailpage()
    {
        $user_id = Auth::id();
        $Address = BillingAddress::where('user_id', $user_id)->get();
        return view('Frontend.billingdetail', compact('Address'));

    }
    public function changepasswordpage()
    {
        return view('Frontend.changepassword');
    }

    public function updateProfile(Request $request)
    {
        $user = User::find(Auth::id());

        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|unique:users,email,' . $user->id,
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user->name  = $request->name;
        $user->email = $request->email;

        if ($request->hasFile('profile')) {
            $file     = $request->file('profile');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('front/assets/front/img/user'), $filename);
            $user->profile = $filename;
        }

        $user->save();
        if ($user) {
            return response()->json([
                'status'  => 'success',
                'message' => 'Profile updated successfully!',
            ]);
        } else {
            return response()->json([
                'status'  => 'falied',
                'message' => 'Profile updated falied!',
            ]);
        }

        //return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }

    public function updateaddress(Request $request)
    {
        $request->validate([
            'id'             => 'required|exists:addresses,id',
            'billing_fname'  => 'required|string|max:255',
            'billing_email'  => 'required|email',
            'billing_number' => 'required|numeric',
            'address'        => 'required|string',
        ]);

        $address = Address::findOrFail($request->id);
        $address->update([
            'billing_fname'  => $request->billing_fname,
            'billing_email'  => $request->billing_email,
            'billing_number' => $request->billing_number,
            'address'        => $request->address,
        ]);

        return redirect()->back()->with('success', 'Address updated successfully!');
    }

    public function updatebillingaddress(Request $request)
    {
        $request->validate([
            'id'             => 'required|exists:addresses,id',
            'billing_fname'  => 'required|string|max:255',
            'billing_email'  => 'required|email',
            'billing_number' => 'required|numeric',
            'address'        => 'required|string',
        ]);

        $address = BillingAddress::findOrFail($request->id);
        $address->update([
            'billing_fname'  => $request->billing_fname,
            'billing_email'  => $request->billing_email,
            'billing_number' => $request->billing_number,
            'address'        => $request->address,
        ]);

        return redirect()->back()->with('success', 'Address updated successfully!');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'password_confirmation' => 'required',
            'password'              => 'required|string|min:6|confirmed',
        ]);

        $user = User::find(Auth::id());

        if (! Hash::check($request->current_password, $user->password)) {
            return response()->json([
                'status'  => 'failed',
                'message' => 'Current password does not match!',
            ]);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json([
            'status'  => 'success',
            'message' => 'Password changed successfully!',
        ]);
    }

    public function contactInfoSubmit(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'required|string|max:10',
            'title'   => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $contact          = new \App\Models\Contact();
        $contact->name    = $request->name;
        $contact->email   = $request->email;
        $contact->phone   = $request->phone;
        $contact->title   = $request->title;
        $contact->message = $request->message;
        $contact->save();

        return response()->json([
            'status'  => 'success',
            'message' => 'Contact information submitted successfully!',
        ]);
    }

}
