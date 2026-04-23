<?php
namespace App\Http\Controllers\fornt;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Razorpay\Api\Api;

class RazorpayController extends Controller
{
    public function createPayment(Request $request)
    {
        // Validate and process the payment
        $validated = $request->validate([
            'order_id' => 'required',
            'amount'   => 'required|numeric',
        ]);

        try {
            // Initialize the Razorpay API
            $api = new Api(config('services.razorpay.key'), config('services.razorpay.secret'));

            // Prepare order data for Razorpay
            $orderData = [
                'receipt'  => $request->input('order_id'),
                'amount'   => $request->amount * 100, // amount in paise
                'currency' => 'INR',
            ];

            // Create the Razorpay order
            $razorpayOrder = $api->order->create($orderData);

            // Log successful order creation
            Log::info('Razorpay order created successfully.', [
                'orderId'   => $razorpayOrder['id'],
                'orderData' => $orderData,
            ]);

            // Return the payment page view with Razorpay order details
            return response()->json([
                'orderId'     => $razorpayOrder['id'],
                'razorpayKey' => config('services.razorpay.key'),
                'amount'      => $orderData['amount'],
                'currency'    => $orderData['currency'],
                'status'      => 'success',
            ], 200);

        } catch (\Razorpay\Api\Errors\BadRequestError $e) {
            // Handle BadRequestError (e.g., invalid parameters)
            Log::error('Razorpay BadRequestError: ', [
                'error'     => $e->getMessage(),
                'orderData' => $orderData,
            ]);
            return response()->json([
                'error' => 'Payment order creation failed due to invalid request.',
            ], 400);

        } catch (\Razorpay\Api\Errors\GatewayError $e) {
            // Handle GatewayError (e.g., issue with Razorpay service)
            Log::error('Razorpay GatewayError: ', [
                'error'     => $e->getMessage(),
                'orderData' => $orderData,
            ]);
            return response()->json([
                'error' => 'Payment order creation failed due to a service error.',
            ], 500);

        } catch (\Exception $e) {
            // Handle other exceptions
            Log::error('Razorpay Error: ', [
                'error'     => $e->getMessage(),
                'orderData' => $orderData,
            ]);
            return response()->json([
                'error' => 'An unexpected error occurred while creating the payment order.',
            ], 500);
        }
    }

    public function razoraPaypayment(Request $request)
    {
        try {
            $api = new Api(config('services.razorpay.key'), config('services.razorpay.secret'));

            // Optional: Verify signature (recommended for security)
            if ($request->has(['razorpay_order_id', 'razorpay_payment_id', 'razorpay_signature'])) {
                $attributes = [
                    'razorpay_order_id'   => $request->razorpay_order_id,
                    'razorpay_payment_id' => $request->razorpay_payment_id,
                    'razorpay_signature'  => $request->razorpay_signature,
                ];

                $api->utility->verifyPaymentSignature($attributes);
            }

            $payment = $api->payment->fetch($request->razorpay_payment_id);

            if ($payment->capture(['amount' => $payment->amount])) {
                Log::info('Razorpay payment captured successfully.', [
                    'paymentId' => $payment->id,
                    'amount'    => $payment->amount,
                    'currency'  => $payment->currency,
                    'status'    => $payment->status,
                ]);

                // Store payment info in DB if needed

                return response()->json([
                    'success'   => true,
                    'message'   => 'Payment captured successfully',
                    'paymentId' => $payment->id,
                    'orderId'   => $payment->order_id,
                    'amount'    => $payment->amount,
                    'currency'  => $payment->currency,
                ], 200);
            } else {
                Log::warning('Payment capture failed.', [
                    'paymentId' => $payment->id,
                    'amount'    => $payment->amount,
                    'status'    => $payment->status,
                ]);

                return response()->json([
                    'success' => false,
                    'message' => 'Payment capture failed!',
                ], 422);
            }
        } catch (\Razorpay\Api\Errors\SignatureVerificationError $e) {
            Log::error('Signature verification failed.', [
                'error' => $e->getMessage(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Signature verification failed.',
            ], 403);
        } catch (\Exception $e) {
            Log::error('Unexpected error occurred during payment processing.', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'An unexpected error occurred. Please try again later.',
            ], 500);
        }
    }

}
