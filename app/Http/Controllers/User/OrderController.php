<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\StoreOrderFirstRequest;
use App\Http\Requests\StoreOrderSecondRequest;
use App\Models\Order;
use App\Services\ECPayService;
use App\Services\PayPalService;
use App\Services\MailService;
use App\Services\OrderService;
use App\Services\UploadToGoogleDrive;
use Carbon\Carbon;
use Google\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
                'created_at_date' => Carbon::now()->format('Ymd'),
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

        if (
            empty($orderData)
            || !in_array($orderData->status, [Order::STATUS_UNPAID, Order::STATUS_NEW])
        ) {
            abort('404');
        }

        return view('user.order.confirm', compact('orderData'));
    }

    public function storeSecond(StoreOrderSecondRequest $request)
    {
        $inputData = $request->post();

        if (empty($inputData['number'])) {
            abort('404');
        }

        $orderNumber = $inputData['number'];
        $orderData = Order::firstWhere('number', $orderNumber);

        if (!empty($orderData)) {
            DB::beginTransaction();

            try {
                $orderData->payment_times += 1;
                $orderData->payment_number = $orderData->number;
                $orderData->amount = $inputData['amount'];
                $orderData->price = $orderData->amount * Order::PRICE;
                $orderData->lang = app()->getLocale();
                $orderData->recipient_name = $inputData['recipient_name'];
                $orderData->recipient_company_name = $inputData['recipient_company_name'];
                $orderData->recipient_address_nation = $inputData['recipient_address_nation'];
                $orderData->recipient_address_country = $inputData['recipient_address_country'];
                $orderData->recipient_address_code = $inputData['recipient_address_code'];
                $orderData->recipient_address = $inputData['recipient_address'];
                $orderData->recipient_tel = $inputData['recipient_tel'];
                $orderData->recipient_email = $inputData['recipient_email'];
                $orderData->status = Order::STATUS_UNPAID;

                $orderData->save();

                DB::commit();

                if ($inputData['payment'] === 'creditcard') {
                    $ECPayService = new ECPayService;
                    $result = $ECPayService->payByCredit($orderData);

                    return $result;
                } elseif ($inputData['payment'] === 'paypal') {
                    $payPalService = new PayPalService;
                    $result = $payPalService->pay($orderData);

                    return $result;
                }
            } catch (\Exception $e) {
                DB::rollback();
            }
        }

        return redirect()
            ->route('user.index');
    }

    public function payByECPayCreditComplete($orderNumber, Request $request)
    {
        $data = $request->all();

        DB::beginTransaction();

        try {
            $ECPayService = new ECPayService;
            $payResult = $ECPayService->checkoutResponse($data);

            $orderPaymentNumber = $payResult['MerchantTradeNo'];
            $orderData = Order::firstWhere('payment_number', $orderPaymentNumber);

            if (empty($orderData)) {
                abort('404');
            }

            session()->put('webLanguage', $orderData->lang);
            app()->setLocale($orderData->lang);

            if (!empty($orderData)) {
                $orderData->status = Order::STATUS_PAID;
                $orderData->save();

                DB::commit();

                MailService::sendMail($orderData);

                return view('user.order.complete', compact('orderNumber'));
            }
        } catch (\Exception $e) {
            DB::rollback();
        }

        abort('404');
    }

    public function payByPaypalComplete($orderNumber, Request $request)
    {
        $data = $request->all();

        $payPalService = new PayPalService;
        $response = $payPalService->payResponse($data['token']);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            try {
                $orderData = Order::firstWhere('payment_number', $orderNumber);

                if (empty($orderData)) {
                    abort('404');
                }

                session()->put('webLanguage', $orderData->lang);
                app()->setLocale($orderData->lang);

                if (!empty($orderData)) {
                    $orderData->status = Order::STATUS_PAID;
                    $orderData->save();

                    DB::commit();

                    MailService::sendMail($orderData);

                    return view('user.order.complete', compact('orderNumber'));
                }
            } catch (\Exception $e) {
                DB::rollback();

                return 'It`s cancel to pay by Paypay!';
            }
        }

        return redirect()
            ->route('user.index');
    }

    /*
     * no use
     */
    public function payByPaypalNotify(Request $request)
    {
        $data = $request->all();
        Storage::put('notify_' . date('YmdHis') . '.txt', json_encode($data));

        $payPalService = new PayPalService;
        $response = $payPalService->verifyIPN($request);

        header("HTTP/1.1 200 OK");
//        $payPalService = new PayPalService;
//        $response = $payPalService->payResponse($data);
//
//        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
//
//        }
    }
}
