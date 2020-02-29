<?php


namespace App\Model;


class Product
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var float
     */
    protected $price;

    /**
     * @var int
     */
    protected $amount;

    /**
     * @var int
     */
    protected $vendor_id;

    /**
     * @var array
     */
    protected $categories_ids;

    /**
     * @var string
     */
    protected $description;


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return int
     */
    public function getVendorId()
    {
        return $this->vendor_id;
    }

    /**
     * @param int $vendor_id
     */
    public function setVendorId($vendor_id)
    {
        $this->vendor_id = $vendor_id;
    }

    /**
     * @return array
     */
    public function getCategoriesId()
    {
        return $this->categories_id;
    }

    /**
     * @param array $categories_ids
     */
    public function setCategoriesIds($categories_ids)
    {
        $this->categories_ids = $categories_ids;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }
}