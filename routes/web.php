<?php

use App\Http\Controllers\User\Api\CaptchaController;
use App\Http\Controllers\User\Api\OrderPay\ECPayController;
use App\Http\Controllers\User\IndexController;
use App\Http\Controllers\User\OrderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group([
    'namespace' => 'App\Http\Controllers\User',
    'as' => 'user.',
    'middleware' => ['set.web.language'],
], function () {
    Route::get('/', [IndexController::class, 'index'])->name('index');

    Route::post('/api/captcha/reload', [CaptchaController::class, 'getCaptchaImageSrc'])->name('api.captcha.reload');
    Route::post('/api/order/pay/ecpay/credit', [ECPayController::class, 'credit'])->name('api.order.pay.ecpay.credit');
    Route::post('/api/order/pay/ecpay/notify', [ECPayController::class, 'notify'])->name('api.order.pay.ecpay.notify');
    Route::post('/api/order/pay/ecpay/search', [ECPayController::class, 'search'])->name('api.order.pay.ecpay.search');

    Route::group([
        'as' => 'order.',
    ], function () {
        Route::post('/order/store/first', [OrderController::class, 'storeFirst'])->name('store.first');

        Route::get('/order/confirm/{orderNumber}', [OrderController::class, 'confirm'])->name('confirm');

        Route::post('/order/store/second', [OrderController::class, 'storeSecond'])->name('store.second');

        Route::get('/order/pay/{orderNumber}', [OrderController::class, 'pay'])->name('pay');

        Route::post('/order/pay/ecpay/result', [OrderController::class, 'payByECPayCreditResult'])->name('pay.ecpay.result');
    });

//    Route::get('google-drive/file-upload','GoogleDriveController@googleDriveFilePpload')->name('google.drive.file.upload');
});

//Route::group([
//    'namespace' => 'App\Http\Controllers\User\Api',
//    'as' => 'api.',
//    'middleware' => ['set.web.language'],
//], function () {
//    Route::post('/api/order/form/validation', [OrderFormController::class, 'validation'])->name('order.form.validation');
//});

// 第一次需要拿KEY
Route::get('google/login','GoogleDriveController@googleLogin')->name('google.login');

//Route::get('/', function () {
//    return view('welcome');
//});
