<?php

namespace App\Services;

use App\Models\Order;
use Carbon\Carbon;

class OrderService
{
    public static function getNewNumber()
    {
        $currentDate = Carbon::now()->format('Ymd');

        $orderCount = Order::where('created_at_date', $currentDate)->lockForUpdate()->count() + 1;

        $orderNumber = $currentDate . str_pad($orderCount, 3, '0', STR_PAD_LEFT);

        return $orderNumber;
    }
}
