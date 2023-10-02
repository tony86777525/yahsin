<?php

namespace App\Http\Controllers\User;

use App\Models\Order;

class IndexController extends BasicController
{
    public function __construct()
    {
    }

    public function index()
    {
        $countryOptions = Order::COUNTRY_OPTIONS;

        return view('user.index', compact('countryOptions'));
    }

    public function test()
    {
        $orderNumber = '1234';
        $isBankTransfer = true;

        return view('user.order.complete', compact('orderNumber', 'isBankTransfer'));
    }
}
