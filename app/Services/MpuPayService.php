<?php

namespace App\Services;

use App\Models\Deposit;
use App\Models\LangLocale;
use App\Models\RegisterSource;
use Illuminate\Support\Facades\Log;

class MpuPayService
{
    public function notify($post) {
        Log::info('mpu_notify', $post);

        $res = self::create_signature_string($post);

        LOG::info('mpu Sign :' , ['sign' => $res]);
        $hash = self::generate_hash_value($post);
        LOG::info('mpu hash : ', ['hash' => $hash]);

        if(self::is_hash_value_matched($post) && $post['status'] == 'AP' && $post['respCode'] == '00'){
            $exchange = 1600;
            // Recive DATA
            $uid = $post['userDefined1'];
            $email = $post['userDefined2'];
            $mmk_money = intval($post['amount'])/100;
            $wallet_usd = $mmk_money / $exchange;
            $mt_user = RegisterSource::where("uid","=",$uid)->first();
            $deposit_type = 'qq';
            $wallet_type = 'MPU';

            $deposit_data = array(
                "uid"=>$uid,
                "email"=>$email,
                "name"=>''."-".'',
                "walletID"=>$mt_user["walletID"],
                "order_num"=>$post['invoiceNo'],//订单号
                "wallet_type"=>$deposit_type,//入金账号
                "qq_wallet"=>0,
                "usd"=>$wallet_usd,//美金
                "currency"=> 'MMK',
                "rmb"=>$mmk_money,//越南盾
                "rmb_real"=>$mmk_money,//实际支付越南盾
                "exchange"=>$exchange,
                "pay_type"=>$wallet_type,
                "clients"=>"pc",
                "status"=>"1",
                "lang"=> app()->getLocale(),
                "pay_date"=>time()
            );
            Deposit::insert($deposit_data);

            $seesion = GetSession($uid);

            $recharge = Recharge($seesion,$mt_user["walletID"],$deposit_type,$wallet_usd);

            if($recharge) {
                //入金大于200添加一次圣诞抽奖
                if($deposit_data["usd"] > 199){
                    ChristmasDrawService::addNumberOfDraws($deposit_data["uid"],$deposit_data["email"],$deposit_data["usd"]);
                }

                //入金积分
                $points = round($deposit_data["usd"]);
                $userLogin = new UserLogin(LangLocale::get()->keyBy('tag'));
                $userLogin->memberPoints($deposit_data["email"],$points,"deposit",2);

            }
        }
    }

    public function create_signature_string($input_fields_array)
    {
        unset($input_fields_array["hashValue"]);    // exclude hash value from signature string

        sort($input_fields_array, SORT_STRING);

        $signature_string = "";
        foreach($input_fields_array as $key => $value)
        {
            $signature_string .= $value;
        }

        return $signature_string;
    }

    public function generate_hash_value($post)
    {
        $input_fields_array = $post;

        $signature_string = self::create_signature_string($input_fields_array);
        $secret_key = "FSYRDGTADO3Z4TWOYUE3HKKKTSLHUNF3";

        $hash_value = hash_hmac('sha1', $signature_string, $secret_key, false);
        $hash_value = strtoupper($hash_value);

        return $hash_value;
    }

    public function is_hash_value_matched($post)
    {
        $is_matched = false;
        $generated_hash_value = self::generate_hash_value($post);
        if(!$post["hashValue"]) { return false; }
        $server_hash_value = $post["hashValue"];

        if ($generated_hash_value == $server_hash_value)
        {
            $is_matched = true;
        }

        return $is_matched;
    }
}
