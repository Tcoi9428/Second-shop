<?php


namespace App\Service;


use App\Model\Cart;
use App\Model\CartItem;
use App\Model\Product;

class CartService
{
    /**
     * @var string
     */
    private  static $session_key = 'cart';

    /**
     * @var Cart
     */
    private static $cart;

    public  static function getCart()
    {
        if(!(static::$cart instanceof Cart)){
            if (static::isCartExist()){
                $cart_data = $_SESSION[static::$session_key];
                static::$cart = unserialize($cart_data);
            }else{
                static::$cart = new Cart();
            }
        }
        return static::$cart;
    }
    private static function cartData()
    {
        $serialized_card = serialize(self::getCart());
        $_SESSION[static::$session_key] = $serialized_card;
    }
    public static function addProduct(Product $product)
    {
        $cart = static::getCart();
        $cart->add($product);

        static::cartData();
    }
    public static function clearCart() {
        unset($_SESSION[static::$session_key]);
    }
    private static function isCartExist() {
        return isset($_SESSION[static::$session_key]);
    }
}