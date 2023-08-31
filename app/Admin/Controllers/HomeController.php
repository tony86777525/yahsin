<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Widgets\InfoBox;

class HomeController extends Controller
{
    public function index(Content $content)
    {
        return $content
            ->title('首頁')
            ->description('')
            ->row(function (Row $row) {
                $row->column(3, function (Column $column) {
                    $orderCount = Order::where('created_at_date', Carbon::now()->format('Ymd'))->count();
                    $column->append(new InfoBox('本日訂單總數', 'book', 'maroon', config('admin.route.prefix') . '/orders', $orderCount));
                });
                $row->column(3, function (Column $column) {
                    $orderCount = Order::count();
                    $column->append(new InfoBox('累積訂單總數', 'book', 'purple', config('admin.route.prefix') . '/orders', $orderCount));
                });
            })
            ->row(function (Row $row) {
                $row->column(3, function (Column $column) {
                    $orderCount = Order::where('status', Order::STATUS_NEW)->count();
                    $column->append(new InfoBox('新訂單', 'search-plus', 'yellow', config('admin.route.prefix') . '/orders?status=0', $orderCount));
                });
                $row->column(3, function (Column $column) {
                    $orderCount = Order::where('status', Order::STATUS_UNPAID)->count();
                    $column->append(new InfoBox('待付款', 'search-plus', 'aqua', config('admin.route.prefix') . '/orders?status=1', $orderCount));
                });
                $row->column(3, function (Column $column) {
                    $orderCount = Order::where('status', Order::STATUS_PAID)->count();
                    $column->append(new InfoBox('已付款', 'search-plus', 'red', config('admin.route.prefix') . '/orders?status=2', $orderCount));
                });
                $row->column(3, function (Column $column) {
                    $orderCount = Order::where('status', Order::STATUS_CLOSED)->count();
                    $column->append(new InfoBox('已結單', 'search-plus', 'green', config('admin.route.prefix') . '/orders?status=3', $orderCount));
                });
            });
    }
}
