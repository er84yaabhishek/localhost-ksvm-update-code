<?php
namespace App\Http\Controllers\fornt;

use App\Http\Controllers\Controller;
use App\Services\DummyPaymentGateway;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    protected $dummyPaymentGateway;

    public function __construct(DummyPaymentGateway $dummyPaymentGateway)
    {
        $this->dummyPaymentGateway = $dummyPaymentGateway;
    }
    public function index(Request $request)
    {
        $allRequest = $request->all();
        $orderId    = 'ORD-' . strtoupper(uniqid());
        $cart       = session('cart', []);
        $cart_total = array_sum(array_column($cart, 'total'));
        $cartSub    = $cart_total - ($shippingCharge->discount_amount ?? 0);
        $shipping   = $shippingCharge->shipping_charge ?? 0;
        $delivery   = $shippingCharge->delivery_charge ?? 0;
        $tax        = ($cart_total * array_sum(array_column($cart, 'tax', 0))) / 100;
        $grandTotal = $cartSub + $tax + $shipping + $delivery;

        $charges = [
            'ship'           => $shipping,
            'discount'       => $shippingCharge->discount_amount ?? 0,
            'delivery'       => $delivery,
            'cart_total'     => $cart_total,
            'cart_sub_total' => $cartSub,
            'tax_amt'        => $tax,
            'tax'            => array_sum(array_column($cart, 'tax', 0)),
            'grand_total'    => $grandTotal,
            'orderid'        => $orderId,
        ];
        return view('Frontend.payment.form', compact('charges', 'allRequest'));
    }

    public function processPayment(Request $request)
    {
        // Validate and process the payment
        $validated = $request->validate([
            'order_id' => 'required',
            'amount'   => 'required|numeric',
        ]);

        try {
            $paymentDetails = [
                'amount' => $validated['amount'],
                // You can add other payment details here (e.g., card number, expiration, etc.)
            ];

            $paymentResult = $this->dummyPaymentGateway->processPayment($paymentDetails);

            return response()->json([
                'status'       => $paymentResult['status'],
                'message'      => $paymentResult['message'],
                'redirect_url' => route('payment.success'),
            ]);
        } catch (\Exception $e) {

            return response()->json([
                'status'  => 'error',
                'message' => $e->getMessage(),
            ]);
        }
        //return view('payment.error', ['error' => $e->getMessage()]);

    }
    public function paymentSuccess()
    {
        return view('fornt.payment.success');
    }
    public function paymentError()
    {
        return view('fornt.payment.error');
    }
}
