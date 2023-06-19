<?php

namespace App\Services;

use App\Models\Deposit;
use App\Models\DepositOrder;
use App\Models\Coupon;
use App\Services\ChristmasDrawService;
use App\Services\DepositService;

class NLPayService
{
    //配置参数
    private $url_api = 'https://www.nganluong.vn/checkout.api.nganluong.post.php';  //支付请求地址
    private $merchant_id = '59781';		//商家支付编码
    private $merchant_password = '44b32b0dd2cfed08dca46d350d509db3';	//秘钥
    private $receiver_email = 'quyenchiho@gmail.com';		//商家邮箱
    private $cur_code = 'vnd';	//支付代码
    private $version = '3.1';	//版本号

    //发起支付
    public function request($data)
    {
        $array_items = array();
        //发起支付
        $params = array(
            'cur_code'          => $this->cur_code,
            'function'          => 'SetExpressCheckout',
            'version'           =>  $this->version,
            'merchant_id'        => $this->merchant_id,
            'receiver_email'      => $this->receiver_email,
            'merchant_password'       => MD5($this->merchant_password),
            'order_code'         => $data['order_num'], //订单号
            'total_amount'       => $data['money_real'], //支付金额，越南盾
            'payment_method'      => $data['option_payment'], //支付类型参数
            'payment_type'       => "1", //交易类型：1  - 权利; 2  - 临时拘留; 如果没有传输或空，则采取NganLuong.vn的政策
            'order_description'       => "", //订单说明
            'tax_amount'         => 0, //税额总额
            'fee_shipping'       => 0, //运费
            'discount_amount'     => 0, //折扣金额
            'return_url'         => route('notify.HLPay'), //后台回调地址
            'cancel_url'         => route('entry.UserCenter'), //前台回调地址
            'buyer_fullname'      => $data['name'], //买家全名
            'buyer_email'        => $data['email'], //买家邮箱
            'buyer_mobile'       => $data['phone'], //买家电话
            'buyer_address'          => "", //买家地址
            'total_item'         => count($array_items) //计算数组元素个数
        );
        if($data["bankcode"] != ""){
            $params["bank_code"]=$data['bankcode'];//银联编号
        }

        $post_field = '';
        foreach ($params as $key => $value) {
            if ($post_field != ''){
                $post_field .= '&';
            }
            $post_field .= $key . "=" . $value;
        }
        $result = $this->curl_post($this->url_api,$post_field);
        $xml_result = str_replace('&','&amp;',(string)$result);
        $nl_result  = simplexml_load_string($xml_result);
        if($nl_result->error_code =='00'){
            echo '<script>window.location.href="'.$nl_result->checkout_url.'"</script>';
            exit;
        }else{
            $error_message = $this->GetErrorMessage($nl_result->error_code);
            exit($error_message);
        }
    }

    //支付回调
    public function notify($token)
    {
        $params = array(
            'merchant_id'       => $this->merchant_id ,	//读取配置参数数据
            'merchant_password' => MD5($this->merchant_password),	//读取配置参数数据
            'version'           => $this->version,	//读取配置参数数据
            'function'          => 'GetTransactionDetail',	//固定参数
            'token'             => $token	//回调接收到的值
        );

        //把数组拼接成字符串
        $post_field = '';
        foreach ($params as $key => $value){
            if($post_field != ''){
                $post_field .= '&';
            }
            $post_field .= $key."=".$value;
        }
        $result = $this->curl_post($this->url_api,$post_field);
        $nl_result  = simplexml_load_string($result);

        if($nl_result){
            //支付成功
            $nl_errorcode = (string)$nl_result->error_code;
            $nl_transaction_status  = (string)$nl_result->transaction_status;
            if($nl_errorcode == '00') {
                if($nl_transaction_status == '00') {
                    $total_amount = (string)$nl_result->total_amount;//支付越南盾
                    $order_num = (string)$nl_result->order_code;//订单号
                    //给用户入金并且更改订单状态
                    $notify = DepositService::notify($order_num,$total_amount);
                    exit;
                }
            }else{
                echo $this->GetErrorMessage($nl_errorcode);
                exit;
            }
        }
    }
    //提示信息
    public function GetErrorMessage($error_code)
    {
        $arrCode = array(
            '00' => 'Thành công',
            '99' => 'Lỗi chưa xác minh',
            '06' => 'Mã merchant không tồn tại hoặc bị khóa',
            '02' => 'Địa chỉ IP truy cập bị từ chối',
            '03' => 'Mã checksum không chính xác, truy cập bị từ chối',
            '04' => 'Tên hàm API do merchant gọi tới không hợp lệ (không tồn tại)',
            '05' => 'Sai version của API',
            '07' => 'Sai mật khẩu của merchant',
            '08' => 'Địa chỉ email tài khoản nhận tiền không tồn tại',
            '09' => 'Tài khoản nhận tiền đang bị phong tỏa giao dịch',
            '10' => 'Mã đơn hàng không hợp lệ',
            '11' => 'Số tiền giao dịch lớn hơn hoặc nhỏ hơn quy định',
            '12' => 'Loại tiền tệ không hợp lệ',
            '29' => 'Token không tồn tại',
            '80' => 'Không thêm được đơn hàng',
            '81' => 'Đơn hàng chưa được thanh toán',
            '110' => 'Địa chỉ email tài khoản nhận tiền không phải email chính',
            '111' => 'Tài khoản nhận tiền đang bị khóa',
            '113' => 'Tài khoản nhận tiền chưa cấu hình là người bán nội dung số',
            '114' => 'Giao dịch đang thực hiện, chưa kết thúc',
            '115' => 'Giao dịch bị hủy',
            '118' => 'tax_amount không hợp lệ',
            '119' => 'discount_amount không hợp lệ',
            '120' => 'fee_shipping không hợp lệ',
            '121' => 'return_url không hợp lệ',
            '122' => 'cancel_url không hợp lệ',
            '123' => 'items không hợp lệ',
            '124' => 'transaction_info không hợp lệ',
            '125' => 'quantity không hợp lệ',
            '126' => 'order_description không hợp lệ',
            '127' => 'affiliate_code không hợp lệ',
            '128' => 'time_limit không hợp lệ',
            '129' => 'buyer_fullname không hợp lệ',
            '130' => 'buyer_email không hợp lệ',
            '131' => 'buyer_mobile không hợp lệ',
            '132' => 'buyer_address không hợp lệ',
            '133' => 'total_item không hợp lệ',
            '134' => 'payment_method, bank_code không hợp lệ',
            '135' => 'Lỗi kết nối tới hệ thống ngân hàng',
            '140' => 'Đơn hàng không hỗ trợ thanh toán trả góp',);
        return $arrCode[(string)$error_code];
    }

    private function curl_post($url,$data,$timeout=0)
    {
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
