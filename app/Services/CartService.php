<?php

namespace App\Services;

class CartService
{

    private static function getItems()
    {
    }
    public static function getCartProductQty(int $productId): int
    {
        $userCart = self::getItems();
        return $userCart[$productId]['qty'] ?? 0;
    }


}
