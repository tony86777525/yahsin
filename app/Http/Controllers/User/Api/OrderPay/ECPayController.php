<?php

namespace App\Http\Controllers\User\Api\OrderPay;

use App\Http\Requests\OrderPay\StoreECPayRequest;
use App\Models\Order;
use App\Services\ECPayService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ECPayController
{
    /**
     * @param StoreECPayRequest $request
     * @return JsonResponse
     */
    public function search(StoreECPayRequest $request): JsonResponse
    {
        $data = $request->all();

        if (!empty($data['number'])) {
            $orderData = Order::firstWhere('number', $data['number']);

            $ECPayService = new ECPayService;

            $result = $ECPayService->query($orderData);

            return response()->json(['success' => true, 'result' => $result]);
        }

        return response()->json(['success' => false, 'result' => '']);
    }

    /**
     * @param StoreECPayRequest $request
     * @return JsonResponse
     */
    public function credit(StoreECPayRequest $request): JsonResponse
    {
        $data = $request->all();
dd($data);
        if (!empty($data['number'])) {
            $orderData = Order::firstWhere('number', $data['number']);

            $ECPayService = new ECPayService;

            $result = $ECPayService->payByCredit($orderData);

            return response()->json(['success' => true, 'result' => $result]);
        }

        return response()->json(['success' => false, 'result' => '']);
    }

    /**
     * @param Request $request
     * @return string
     */
    public function notify(Request $request)
    {
        $data = $request->all();

        $ECPayService = new ECPayService;
        $result = $ECPayService->checkoutResponse($data);

        if ($result['RtnCode'] === '1') {
            $order = Order::firstWhere('number', $result['MerchantTradeNo']);

            if (!empty($order)) {
                $order->status = Order::STATUS_PAID;
                $order->save();
            }

            return '1|OK';
        }

        return '0|ERROR';
    }
}
