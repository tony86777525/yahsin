<?php

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
    Route::get('/', 'IndexController@index')->name('index');
});
//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('google/login','User/GoogleDriveController@googleLogin')->name('google.login');
Route::get('google-drive/file-upload','User/GoogleDriveController@googleDriveFilePpload')->name('google.drive.file.upload');
