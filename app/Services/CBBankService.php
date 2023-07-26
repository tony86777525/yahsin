<?php

namespace App\Services;

class CBBankService
{
    private $merchantID = 'CB0000000316';
    private $pwd = '53f68181c7ea48b2674fc80ac05918ef';
    private $method = 'PUT';
    private $apiOperation = 'PAY';
    private $softype = 'CARD';
    private $ordercurrency = 'MMK';
    private $version = '50';
    private $base_url = "https://cbbank.gateway.mastercard.com";

    public $orderId;
    public $transactionId;
    public $orderamount;
    public $sofcardNo;
    public $sofexpmonth;
    public $sofexpyear;
    public $sofsecuritycode;

    public function pay()
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $this->getPostUrl());
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->getHeader());
        curl_setopt($ch, CURLOPT_REFERER, $this->getPostUrl());
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $this->method);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$this->getDataToPost());
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, false);

        return curl_exec($ch);
    }


    public function setOrderId($data)
    {
        $this->orderId = $data;

        return $this;
    }

    public function setTransactionId($data)
    {
        $this->transactionId = $data;

        return $this;
    }

    public function setOrderamount($data)
    {
        $this->orderamount = $data;

        return $this;
    }

    public function setSofcardNo($data)
    {
        $this->sofcardNo = $data;

        return $this;
    }

    public function setSofexpmonth($data)
    {
        $this->sofexpmonth = $data;

        return $this;
    }

    public function setSofexpyear($data)
    {
        $this->sofexpyear = $data;

        return $this;
    }

    public function setSofsecuritycode($data)
    {
        $this->sofsecuritycode = $data;

        return $this;
    }

    private function getApiUrl()
    {
        return $this->base_url . "/api/rest/version/" . $this->version . "/merchant/" . $this->merchantID;
    }

    private function getCredential()
    {
        return "merchant." . $this->merchantID . ":" . $this->pwd;
    }

    private function getEncodedCredential()
    {
        return base64_encode($this->getCredential());
    }

    private function getHeader()
    {
        return array('Content-Type: application/json', 'Authorization: Basic '.$this->getEncodedCredential());
    }

    private function getPostUrl()
    {
        return $this->getApiUrl() . '/order/' . $this->orderId . '/transaction/' . $this->transactionId;
    }

    private function getDataToPost()
    {
        return json_encode(
            [
                "apiOperation"=>$this->apiOperation,
                "order"=>[
                    "amount"=>$this->orderamount,
                    "currency"=>$this->ordercurrency,
                ],
                "sourceOfFunds"=>[
                    "type"=>$this->softype,
                    "provided"=>[
                        "card"=>[
                            "number"=>$this->sofcardNo,
                            "expiry"=>[
                                "month"=>$this->sofexpmonth,
                                "year"=>$this->sofexpyear
                            ],
                            "securityCode"=>$this->sofsecuritycode
                        ]
                    ]
                ]
            ]
        );
    }
}
