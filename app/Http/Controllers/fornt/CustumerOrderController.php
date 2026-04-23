<?php

namespace App\Http\Controllers\fornt;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Address;
use App\Models\BillingAddress;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

class CustumerOrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        // Validate the form data
        $request->validate([
            'billing_fname' => 'required|string|max:255',
            'billing_email' => 'required|email',
            'billing_number' => 'required|string',
            'pick_up_date' => 'required_if:serving_method,pick_up|date',
            'pick_up_time' => 'required_if:serving_method,pick_up',
            'shpping_fname' => 'required_if:serving_method,home_delivery|string|max:255',
            'shpping_email' => 'required_if:serving_method,home_delivery|email',
            'shpping_number' => 'required_if:serving_method,home_delivery|string',
        ]);

        try {
            // Log validation success
            logger()->info('Validation successful', $request->all());

            // Check if shipping address exists
            $shippingAddress = null;
            if ($request->serving_method === 'home_delivery') {
                $shippingAddress = Address::firstOrCreate([
                    'user_id' => Auth::id(),
                    'billing_fname' => $request->shpping_fname . ' ' . $request->shpping_lname,
                    'address' => $request->shpping_address . ' ' . $request->shpping_city,
                    'billing_email' => $request->shpping_email,
                    'billing_number' => $request->shpping_number,
                ]);
                logger()->info('Shipping Address Created', ['shippingAddress' => $shippingAddress]);
            }

            // Check if billing address exists
            $billingAddress = BillingAddress::firstOrCreate([
                'user_id' => Auth::id(),
                'billing_fname' => $request->billing_fname . ' ' . $request->billing_fname,
                'address' => $request->billing_address . ' ' . $request->billing_city,
                'billing_email' => $request->billing_email,
                'billing_number' => $request->billing_number,
            ]);
            logger()->info('Billing Address Created', ['billingAddress' => $billingAddress]);

            // Generate unique order and payment numbers
            $orderNumber = 'ORD-' . strtoupper(uniqid());
            $paymentNumber = 'PAY-' . strtoupper(uniqid());
            logger()->info('Generated Order and Payment Numbers', [
                'orderNumber' => $orderNumber,
                'paymentNumber' => $paymentNumber,
            ]);

            // Insert order into the orders table
            $order = Order::create([
                'user_id' => Auth::id(),
                'order_number' => $orderNumber,
                'shipping_address_id' => $shippingAddress ? $shippingAddress->id : null,
                'billing_address_id' => $billingAddress->id,
                'serving_method' => $request->serving_method,
                'pick_up_date' => $request->pick_up_date,
                'pick_up_time' => $request->pick_up_time,
                'order_notes' => $request->order_notes,
                'total_amount' => $request->grandTotal,
            ]);
            logger()->info('Order Created', ['order' => $order]);

            $payment = Payment::create([
                'user_id' => Auth::id(),
                'order_id' => $order->id,
                'payment_number' => $paymentNumber,
                'payment_method' => $request->payment_method,
                'payment_status' => 'pending',
                'amount' => $request->grandTotal,
            ]);
            logger()->info('Payment Created', ['payment' => $payment]);

            return redirect()->back()->with('success', 'Order placed successfully!');
        } catch (\Exception $e) {
            logger()->error('Error occurred while placing the order', ['error' => $e->getMessage()]);
            return redirect()->back()->with('error', 'An error occurred while placing the order: ' . $e->getMessage());
        }
    }
}
