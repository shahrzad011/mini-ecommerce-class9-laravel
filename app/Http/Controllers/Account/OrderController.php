<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    //
    public function index()
    {
        $title = 'سبد خرید';

        $userOrders = Order::query()
            ->where('user_id', Auth::id())
            ->with('orderItems.product')
            ->orderByDesc('created_at')
            ->paginate(2);


        return view('account.orders', compact('userOrders', 'title'));
    }
}
