<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Http\Requests\OrderUpdateRequest;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {

        $orders = Order::with('user')
            ->scopeSearch($request->search)
            ->scopeSort($request->sort)
            ->latest()
            ->paginate(20)
            ->withQueryString();

        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $order->load([
            'user',
            'orderItems.product'
        ]);


        return view('admin.orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        return view('admin.orders.edit', compact('order'));
    }

    public function update(OrderUpdateRequest $request, Order $order)
    {
        $order->update($request->validated());


        return redirect()
            ->route('admin.orders.show', $order)
            ->with('success', 'وضعیت سفارش با موفقیت تغییر کرد.');
    }

    public function destroy(Order $order)
    {
        $order->delete();


        return redirect()
            ->route('admin.orders.index')
            ->with('success', 'سفارش حذف شد.');
    }
}
