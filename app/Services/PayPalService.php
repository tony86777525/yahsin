<?php

namespace App\Services;

use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Carbon\Carbon;

class PayPalService
{
    public function __construct()
    {}

    public function pay($data)
    {
        $provider = new PayPalClient;
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('user.order.pay.paypal.result'),
                "cancel_url" => route('user.index'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "TWD",
                        "value" => $data->price
                    ]
                ]
            ]
        ]);

        if (isset($response['id']) && $response['id'] != null) {
            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }
        }

        return redirect()->route('user.index');
    }

    public function payResponse($data)
    {
        $provider = new PayPalClient;
        $provider->getAccessToken();

        $response = $provider->capturePaymentOrder($data['token']);

        return $response;
    }
}
