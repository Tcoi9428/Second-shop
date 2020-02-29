<?php


namespace App\Controller;


use App\Service\CategoryService;
use App\Service\ProductService;
use App\Service\RequestService;
use App\Model\Product as ProductModel;
use App\Service\VendorService;

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
    public  static function edit(){
        $product_id = RequestService::getIntFromGet('product_id');
        if ($product_id){
            $product = ProductService::getEditItem($product_id);
        }else{
            $product =new  ProductModel();
        }
        $categories = CategoryService::getList();
        $vendors = VendorService::getList();
        smarty()->assign_by_ref('categories',$categories);
        smarty()->assign_by_ref('vendors', $vendors);
        smarty()->assign_by_ref('product' ,$product);
        smarty()->display('product/edit.tpl');
    }

    public static function editing(){
        $product_id = RequestService::getIntFromGet('id');
        $name = RequestService::getStringFromPost('name');
        $price = RequestService::getFloatFromPost('price');
        $amount = RequestService::getIntFromPost('amount');
        $vendor_id = RequestService::getIntFromPost('vendor_id');
        $description = RequestService::getStringFromPost('description');

        $product = new ProductModel();
        $product->setId($product_id);
        $product->setName($name);
        $product->setPrice($price);
        $product->setAmount($amount);
        $product->setVendorId($vendor_id);
        $product->setDescription($description);

       ProductService::save($product);
        self::redirectToList();
    }
    public static function delete(){
        ProductService::delete();
        self::redirectToList();
    }
    private static function redirectToList() {
        RequestService::redirect('/');
    }
}