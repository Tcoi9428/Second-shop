<?php


namespace App\Controller;


use App\Service\ProductService;

class Product
{
    public  static function list(){
        $products_arr = ProductService::getList();
        $products = $products_arr[0];
        $vendors = $products_arr[1];
        $categories = $products_arr[2];

        smarty()->assign_by_ref('categories',$categories);
        smarty()->assign_by_ref('vendors',$vendors);
        smarty()->assign_by_ref('products',$products);
        smarty()->display('index.tpl');
    }
    public static function create(){
        $values = ProductService::create();
        echo '<pre>'; var_dump($values); echo '</pre>';
    }
}