<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\StoreOrderFirstRequest;
use App\Http\Requests\StoreOrderSecondRequest;
use App\Models\Order;
use App\Services\ECPayService;
use App\Services\OrderService;
use App\Services\UploadToGoogleDrive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends BasicController
{
    private $uploadToGoogleDrive;

    public function __construct(UploadToGoogleDrive $uploadToGoogleDrive)
    {
        $this->uploadToGoogleDrive = $uploadToGoogleDrive;
    }

    public function storeFirst(StoreOrderFirstRequest $request)
    {
        $orderData = $request->post();

        DB::beginTransaction();

        try {
            $newOrderData = Order::create([
                'number' => OrderService::getNewNumber(),
                'name' => $orderData['name'],
                'email' => $orderData['email'],
                'country' => $orderData['country'],
            ]);

            $filesData = $request->file('files');

            $folderId = $this->uploadToGoogleDrive->upload($filesData, $newOrderData->number, $newOrderData->number);

            $newOrderData->google_drive_folder_id = $folderId;
            $newOrderData->save();

            DB::commit();

            return redirect()
                ->route('user.order.confirm', [
                    'orderNumber' => $newOrderData->number
                ]);
        } catch (\Exception $e) {
            DB::rollback();
        }

        return redirect()
            ->route('user.index');
    }

    public function confirm($orderNumber)
    {
        $orderData = Order::firstWhere('number', $orderNumber);

        if (empty($orderData)) {
            return redirect()
                ->route('user.index');
        }

        return view('user.order.confirm', compact('orderData'));
    }

    public function storeSecond(StoreOrderSecondRequest $request)
    {
        $inputData = $request->post();

        if (!empty($inputData['number'])) {
            $orderNumber = $inputData['number'];

            $orderData = Order::firstWhere('number', $orderNumber);

            if (!empty($orderData)) {
                DB::beginTransaction();

                try {
                    $orderData->address = $inputData['address'];
                    $orderData->status = Order::STATUS_UNPAID;

                    $orderData->save();

                    DB::commit();

                    return redirect()
                        ->route('user.order.pay', [
                            'orderNumber' => $orderData->number
                        ]);
                } catch (\Exception $e) {
                    DB::rollback();
                }
            }
        }

        return redirect()
            ->route('user.index');
    }

    public function pay($orderNumber)
    {
        $orderData = Order::firstWhere('number', $orderNumber);

        if (empty($orderData)) {
            return redirect()
                ->route('user.index');
        }

        return view('user.order.pay', compact('orderData'));
    }

    public function payByECPayCreditResult(Request $request)
    {
        $data = $request->all();

        $ECPayService = new ECPayService;
        $result = $ECPayService->checkoutResponse($data);

        return view('user.order.pay.result.ecpay', compact('result'));
    }
}
