<?php

use App\Http\Controllers\User\Api\CaptchaController;
use App\Http\Controllers\User\Api\OrderPay\ECPayController;
use App\Http\Controllers\User\IndexController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\GoogleDriveController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([
    'namespace' => 'App\Http\Controllers\User',
    'as' => 'user.',
    'middleware' => ['set.web.language'],
], function () {
    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::view('/cart', 'user.cart')
            ->name('user.cart');
    Route::view('/complete', 'user.complete')
            ->name('user.complete');

    Route::post('/api/captcha/reload', [CaptchaController::class, 'getCaptchaImageSrc'])->name('api.captcha.reload');
    Route::post('/api/order/pay/ecpay/credit', [ECPayController::class, 'credit'])->name('api.order.pay.ecpay.credit');
    Route::post('/api/order/pay/ecpay/notify', [ECPayController::class, 'notify'])->name('api.order.pay.ecpay.notify');
    Route::post('/api/order/pay/ecpay/search', [ECPayController::class, 'search'])->name('api.order.pay.ecpay.search');

    Route::group([
        'as' => 'order.',
    ], function () {
        Route::post('/order/store/first', [OrderController::class, 'storeFirst'])->name('store.first');
        Route::get('/order/{orderNumber}/confirm', [OrderController::class, 'confirm'])->name('confirm');
        Route::post('/order/store/second', [OrderController::class, 'storeSecond'])->name('store.second');
        Route::post('/order/{orderNumber}/pay/ecpay/complete', [OrderController::class, 'payByECPayCreditComplete'])->name('pay.ecpay.complete');
        Route::get('/order/{orderNumber}/pay/paypal/complete', [OrderController::class, 'payByPaypalComplete'])->name('pay.paypal.complete');

        Route::get('/order/{orderNumber}/pay/ecpay/complete', function () {
            return redirect()
                ->route('user.index');
        });

        Route::post('/order/pay/paypal/notify', [OrderController::class, 'payByPaypalNotify'])->name('pay.paypal.notify');
    });

//    Route::get('google-drive/file-upload','GoogleDriveController@googleDriveFilePpload')->name('google.drive.file.upload');
});

Route::get('google/login',[GoogleDriveController::class, 'googleLogin'])->name('google.login');

//Route::get('/', function () {
//    return view('welcome');
//});
