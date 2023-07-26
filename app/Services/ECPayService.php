<?php

namespace App\Services;

use Ecpay\Sdk\Factories\Factory;
use Ecpay\Sdk\Services\UrlService;
use Ecpay\Sdk\Response\VerifiedArrayResponse;
use Ecpay\Sdk\Services\AutoSubmitFormService;

class ECPayService
{
    private $factory;
    private $urlService;
    const CREDIT_CARD_NO = '4311-9522-2222-2222';
    const CREDIT_CARD_SAFE_NO = '222';
    const CREDIT_CARD_VALIDITY_YEAR = '2100';
    const CREDIT_CARD_VALIDITY_MONTH = '12';

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
            'MerchantTradeNo' => $data['number'],
            'MerchantTradeDate' => date('Y/m/d H:i:s'),
            'PaymentType' => 'aio',
            'TotalAmount' => $data['amount'],
            'TradeDesc' => UrlService::ecpayUrlEncode('dcc1'),
            'ItemName' => 'dcc2',
            'ChoosePayment' => 'Credit',
            'EncryptType' => 1,
            'ReturnURL' => route('user.api.order.pay.ecpay.notify'),
            'OrderResultURL' => route('user.order.pay.ecpay.result'),
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
