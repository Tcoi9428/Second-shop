<?php

namespace App\Controller;

use App\Service\CartService;
use App\Service\RequestService;

class Cart
{
    private function __construct()
    {
    }

    public static function clear()
    {
        CartService::clearCart();

        RequestService::redirect($_SERVER['HTTP_REFERER']);
    }
}