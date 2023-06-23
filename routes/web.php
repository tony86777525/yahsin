<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\IndexController;

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

    Route::get('/', 'IndexController@index')->name('index');

    Route::post('/upload-pdf', [IndexController::class, 'uploadPDF'])->name('uploadPDF');

    Route::get('google-drive/file-upload','GoogleDriveController@googleDriveFilePpload')->name('google.drive.file.upload');
});

// 第一次需要拿KEY
Route::get('google/login','GoogleDriveController@googleLogin')->name('google.login');

//Route::get('/', function () {
//    return view('welcome');
//});
