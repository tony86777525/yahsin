<?php

namespace App\Services;

use App\Services\DepositService;
use Illuminate\Support\Facades\Log;

class HLPayService
{

    //发起支付
    public function request($data){
        @$v_date=time();
        //发起支付
        $payMsg['Bank']=$data['hlpay_bank'];	  //银行编号
        //$payMsg['Currency']='VND'; //固定参数
        $payMsg['Currency'] = $data['currency'];
        $payMsg['Language']=$data['language']; //固定参数
        $payMsg['Amount'] =$data['money_real'].'.00'; //越南盾
        $SecurityCode='C6kTpHJCrKBn9uM'; //秘钥
        $payMsg['Merchant']='M0204'; //商户号
        $payMsg['Reference']=$data['order_num']; //订单号
        $payMsg['Customer']= substr($v_date, -6);; //截取时间戳的后6位数字
        $payMsg['Datetime']=date('Y-m-d H:i:s',$v_date); //当前时间 2018-09-06 11:22:33
        $Datetime=date('YmdHis',$v_date); //当前时间 20180906112233
        $payMsg['FrontURI']= route('entry.UserCenter'); //前台回调地址
        $payMsg['BackURI']= route('notify.HLPay'); //后台回调地址
        $payMsg['ClientIP']=getIP(); //IP地址
        $payMsg['Key']=MD5($payMsg['Merchant'].$payMsg['Reference'].$payMsg['Customer'].$payMsg['Amount'].$payMsg['Currency'].$Datetime.$SecurityCode.$payMsg['ClientIP']);
        $url='https://api.racethewind.net/MerchantTransfer'; //请求地址
        $result = $this->curl_post($url,$payMsg);
        echo $result;
    }
    //支付回调
    public function notify($asynData){
        if(!$asynData) exit;
        Log::info('notify', $asynData);
        $SecurityCode='C6kTpHJCrKBn9uM';
        $resultKey=strtoupper(MD5($asynData['Merchant'].$asynData['Reference'].$asynData['Customer'].$asynData['Amount'].$asynData['Currency'].$asynData['Status'].$SecurityCode));
        if($asynData['Key']==$resultKey&&$asynData['Status']=='000'){
            Log::info('HLpay success');
            //支付成功
            $order_num = $asynData['Reference']; //订单号
            $total_amount = $asynData['Amount']; //订单号
            //给用户入金并且更改订单状态
            $notify = DepositService::notify($order_num,$total_amount);
            exit;
        }
    }

    /**
     * https 访问(post方式传递数据)
     * $url 地址
     * $data 传递数据
     */
    private function curl_post($url,$data,$timeout=0){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_URL, $url);
        if($timeout == 1){
            curl_setopt($ch, CURLOPT_TIMEOUT,1); //设置执行时间为1秒，减少用户等待的时间.但是数据还是在后台执行中
        }
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $result = curl_exec($ch);
        if($result === FALSE){
            $response = array('success'=>false, 'message'=>curl_error($ch),'link'=>"");
            echo (json_encode($response));
            exit;
        }
        curl_close($ch);
        return $result;
    }
}
