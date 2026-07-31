<?php

namespace App\Services;

use App\Enums\OrderStatus;
use App\Exceptions\CartItemNotFoundException;
use App\Models\Order;
use App\Models\OrderItem;
use Auth;
use Exception;
use Illuminate\Support\Str;

class OrderService
{
    public static function register(array $checkData): void
    {
        $cartItems = CartService::getItemsWithDetails();
        $cartTotalPrices = CartService::getTotalPrices();

        if (count($cartItems) == 0) {
            throw new CartItemNotFoundException('موردی در سبد خرید شما یافت نشد');
        }

        //check product qty
        foreach ($cartItems as $cartItem) {

            if ($cartItem['qty'] > $cartItem['product']->qty) {
                throw new Exception('یکی از محصولات موجودی ندارند');
            }
        }

        //dec product qty
        foreach ($cartItems as $cartItem) {
            $cartItem['product']->decrement('qty', $cartItem['qty']);
        }


        $orderData = [
            'user_id' => Auth::id(),

            // مبلغ کل قبل از تخفیف
            'final_price' => $cartTotalPrices['price'],

            // مجموع مبلغ تخفیف
            'final_discount' => $cartTotalPrices['discount'],

            'total_products' => CartService::getCount(),
            'tracking_code' => Str::random(12),
            'status' => OrderStatus::PROCESSING,
        ];

        $order = Order::create(array_merge($orderData, $checkData));

        //create order item
        foreach ($cartItems as $cartItem) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem['product_id'],
                'qty' => $cartItem['qty'],

                'unit_price' => $cartItem['product']->price,
                'total_price' => $cartItem['product']->price * $cartItem['qty'],

                'unit_discount' => $cartItem['product']->discount,
                'total_discount' => $cartItem['product']->discount * $cartItem['qty'],
            ]);

        }
    }


}
