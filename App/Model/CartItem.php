<?php


namespace App\Model;


class CartItem
{
    /**
     * @var Product
     */
    public $product;

    /**
     * @var float
     */
    private $price;

    /**
     * @var int
     */
    private $amount;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * @return Product
     */
    public function getProduct() :Product
    {
        return $this->product;
    }
    public function getAmount()
    {
        return $this->amount;
    }
    /**
     * @param int $amount
     */
    public function setAmount(int $amount)
    {
    }

    public function getPrice()
    {
        $price = $this->getProduct()->getPrice();
        return $price;
    }

    public function incrementAmount(int $amount = 1){
        $this->amount += $amount;
    }

    public function decrementAmount(){
        $this->amount--;
    }
}