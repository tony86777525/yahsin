<?php

namespace App\Services;

use Google\Exception;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Carbon\Carbon;

class PayPalService
{
    private $provider;
    private $paypalToken;

    public function __construct()
    {
        $this->provider = new PayPalClient;
        $this->paypalToken = $this->provider->getAccessToken();
    }

    public function pay($data)
    {
        $response = $this->provider->createOrder(
            [
                "intent" => "CAPTURE",
                "application_context" => [
                    'brand_name' => env('APP_NAME'),
                    "return_url" => route('user.order.pay.paypal.complete', ['orderNumber' => $data->number]),
                    "cancel_url" => route('user.order.pay.paypal.complete', ['orderNumber' => $data->number]),
                ],
                "purchase_units" => [
                    0 => [
                        "custom_id" => $data->payment_number,
                        "amount" => [
                            "currency_code" => "TWD",
                            "value" => $data->price
                        ]
                    ]
                ]
            ]
        );

        if (isset($response['id']) && $response['id'] != null) {
            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }
        }

        throw new Exception('It`s Error to pay by Paypay!');
    }

    public function payResponse($token)
    {
        $response = $this->provider->capturePaymentOrder($token);

        return $response;
    }

    public function verifyIPN($request)
    {
        $response = $this->provider->verifyIPN($request);

        return $response;
    }
}
