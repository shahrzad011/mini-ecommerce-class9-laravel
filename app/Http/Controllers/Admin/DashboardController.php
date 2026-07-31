<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Hekmatinasser\Verta\Verta;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {

        $range = [
            Verta::now()->startMonth()->toCarbon(),
            Verta::now()->endMonth()->toCarbon(),
        ];

        // تعداد سفارشات این ماه
        $ordersCount = Order::query()
            ->whereBetween('created_at', $range)
            ->count();

        // مبلغ فروش این ماه
        $monthSales = Order::query()
            ->whereBetween('created_at', $range)
            ->sum('final_price');

        // تعداد محصولات
        $productsCount = Product::query()->count();


        // تعداد کاربران
        $usersCount = User::query()->count();

        //فروش روزانه این ماه
        $dailySales = Order::query()
            ->select(
                DB::raw('DATE(created_at) as day'),
                DB::raw('SUM(final_price) as total')
            )
            ->whereBetween('created_at', $range)
            ->groupBy('day')
            ->orderBy('day')
            ->get();
        $salesCategories = [];
        $salesSeries = [];


        foreach ($dailySales as $item) {

            $salesCategories[] = verta($item->day)->format('d');

            $salesSeries[] = (int)$item->total;
        }


// وضعیت سفارشات
        $orderStatus = Order::query()
            ->select(
                'status',
                DB::raw('count(*) as total')
            )
            ->whereBetween('created_at', $range)
            ->groupBy('status')
            ->get();


        $orderStatusLabels = [];
        $orderStatusSeries = [];


        foreach ($orderStatus as $item) {

            $orderStatusLabels[] = $item->status;

            $orderStatusSeries[] = $item->total;
        }


        return view('admin.dashboard', compact(

            'ordersCount',
            'monthSales',
            'productsCount',
            'usersCount',

            'salesCategories',
            'salesSeries',

            'orderStatusLabels',
            'orderStatusSeries'

        ));

    }
}
