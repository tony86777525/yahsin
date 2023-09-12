<?php

namespace App\Services;

use Ecpay\Sdk\Factories\Factory;
use Ecpay\Sdk\Services\UrlService;
use Ecpay\Sdk\Response\VerifiedArrayResponse;
use Carbon\Carbon;

class ECPayService
{
    private $factory;
    private $urlService;

    public function __construct()
    {
        $this->factory = new Factory(
            [
                'hashKey' => env('ECPAY_HASH_KEY'),
                'hashIv' => env('ECPAY_HASH_IV'),
            ]
        );
        $this->urlService = new UrlService;
    }

    public function query($data)
    {
        $service = $this->factory->create('PostWithCmvVerifiedEncodedStrResponseService');

        $input = [
            'MerchantID' => env('ECPAY_MERCHANT_ID'),
            'MerchantTradeNo' => $data['number'],
            'TimeStamp' => time(),
        ];

        $url = env('ECPAY_QUERY_ACTION');

        return $service->post($input, $url);
    }

    public function payByCredit($data)
    {
        $service = $this->factory->create('AutoSubmitFormWithCmvService');

        $input = [
            'MerchantID' => env('ECPAY_MERCHANT_ID'),
            'MerchantTradeNo' => $data->payment_number,
            'MerchantTradeDate' => Carbon::now()->format('Y/m/d H:i:s'),
            'PaymentType' => 'aio',
            'TotalAmount' => $data['price'],
            'TradeDesc' => $this->urlService->ecpayUrlEncode('yahsin'),
            'ItemName' => 'yahsin',
            'ChoosePayment' => 'Credit',
            'EncryptType' => 1,
            'ReturnURL' => route('user.api.order.pay.ecpay.notify'),
            'OrderResultURL' => route('user.order.pay.ecpay.complete', ['orderNumber' => $data->number]),
        ];

        $action = env('ECPAY_PAY_ACTION');

        return $service->generate($input, $action);
    }

    public function checkoutResponse($data)
    {
        $checkoutResponse = $this->factory->create(VerifiedArrayResponse::class);

        return $checkoutResponse->get($data);
    }
}
