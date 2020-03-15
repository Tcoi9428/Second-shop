<?php


namespace App\Model;


class Cart
{
    /**
     * @var float
     */
    private $price = 0;

    /**
     * @var int
     */
    private $amount = 0;

    /**
     * @var CartItem[]
     */
    private $cart_items = [];

    /**
     * @return float
     */
    public function getPrice()
    {
        $price = 0;
        foreach ($this->getItems() as $item){
            $price+= $item->getPrice();
        }
        return $price;
    }

    /**
     * @return int
     */
    public function getAmount()
    {
        $amount = 0;
        foreach ($this->getItems() as $item){
            $amount += $item->getAmount();
        }
        return $amount;
    }

    public function add(Product $product) {

        $cart_item = $this->getItem($product);
        $cart_item->incrementAmount();
        $this->addCartItem($cart_item);
    }
     private function getItem(Product $product) {
        $product_id = $product->getId();

        return $this->cart_items[$product_id] ?? new CartItem($product);
    }

    private function addCartItem(CartItem $cart_item) {
        $product_id = $cart_item->getProduct()->getId();

        $this->cart_items[$product_id] = $cart_item;
    }
    public function getItems() {
        return $this->cart_items;
    }
}