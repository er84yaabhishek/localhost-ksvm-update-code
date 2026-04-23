<?php

// app/Services/DummyPaymentGateway.php
namespace App\Services;

use Exception;

class DummyPaymentGateway
{
    public function processPayment(array $paymentDetails)
    {
        // Simulate processing payment by checking the payment amount
        if (!isset($paymentDetails['amount']) || $paymentDetails['amount'] <= 0) {
            throw new Exception("Invalid payment amount");
        }

        // Simulate a successful payment
        return [
            'status' => 'success',
            'transaction_id' => 'TXN' . time(),
            'message' => 'Payment successfully processed!',
        ];
    }
}
