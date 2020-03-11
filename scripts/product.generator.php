<?php

use App\Model\Product;
use App\Service\CategoryService;
use App\Service\ProductService;
use App\Service\VendorService;

require_once __DIR__ . '/../App/bootstrap.php';

$faker = Faker\Factory::create();
for ($i = 0; $i < 100; $i++){
    $product = new Product();

    $product->setName($faker->name);
    $product->setPrice($faker->randomFloat( 3 ,1 ,550));
    $product->setAmount($faker->numberBetween(1,1000));
    $product->setDescription($faker->text(200));

    /**
     * @var $vendor \App\Model\Vendor
     */
    $vendor = VendorService::getRandom();
    $product->setVendorId($vendor->getId());

    for ($j = 0 ; $j < $faker->numberBetween(1,3); $j++){
        /**
         * @var $folder \App\Model\Category
         */
        $folder = CategoryService::getRandom();
        $product->addCategoryId($folder->getId());
    }
    ProductService::save($product);
}