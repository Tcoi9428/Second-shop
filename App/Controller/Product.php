<?php


namespace App\Controller;


use App\Service\CartService;
use App\Service\CategoryService;
use App\Service\ProductService;
use App\Service\RequestService;
use App\Model\Product as ProductModel;
use App\Service\VendorService;

class Product
{
    public static function buy()
    {
        $product_id = RequestService::getIntFromGet('product_id');
        $product = ProductService::getEditItem($product_id);
        CartService::addProduct($product);


        RequestService::redirect($_SERVER['HTTP_REFERER']);
    }
    public  static function list($products_on_page)
    {
        $per_page = $products_on_page;
        $current_page = RequestService::getIntFromGet('page',1);
        $start = $per_page * ($current_page - 1);
        $products = [
          'count'=> ProductService::getCount(),
          'items'=> ProductService::getList($start , $per_page)
        ];
        $vendors = VendorService::getList();
        $categories = CategoryService::getList();

        $pagination = [
            'pages'=> ceil($products['count']/$per_page),
            'current'=> $current_page
        ];
        smarty()->assign_by_ref('categories',$categories);
        smarty()->assign_by_ref('vendors',$vendors);
        smarty()->assign_by_ref('products',$products);
        smarty()->assign_by_ref('pagination',$pagination);
        smarty()->display('index.tpl');
    }
    public  static function edit()
    {
        $product_id = RequestService::getIntFromGet('product_id');
        if ($product_id){
            $product = ProductService::getEditItem($product_id);
        }else{
            $product = new  ProductModel();
        }
        $categories = CategoryService::getList();
        $vendors = VendorService::getList();
        smarty()->assign_by_ref('categories',$categories);
        smarty()->assign_by_ref('vendors', $vendors);
        smarty()->assign_by_ref('product' ,$product);
        smarty()->display('product/edit.tpl');
    }

    public static function editing()
    {
        $product_id = RequestService::getIntFromPost('product_id');
        $name = RequestService::getStringFromPost('name');
        $price = RequestService::getFloatFromPost('price');
        $amount = RequestService::getIntFromPost('amount');
        $vendor_id = RequestService::getIntFromPost('vendor_id');
        $description = RequestService::getStringFromPost('description');
        $categories_ids = RequestService::getArrayFromPost('categories_ids');

        $product = new ProductModel();

        if($product_id){
            $product = ProductService::getEditItem($product_id);
        }
        $product->setName($name);
        $product->setPrice($price);
        $product->setAmount($amount);
        $product->setVendorId($vendor_id);
        $product->setDescription($description);
        $product->removeCategories();
        foreach ($categories_ids as $category_id){
            $product->addCategoryId($category_id);
        }
       ProductService::save($product);
       self::redirectToList();
    }
    public static function delete()
    {
        ProductService::delete();
        self::redirectToList();
    }
    private static function redirectToList()
    {
        RequestService::redirect('/');
    }
}