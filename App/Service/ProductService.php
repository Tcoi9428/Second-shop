<?php


namespace App\Service;


class ProductService
{

    private  function __construct()
    {
    }

    public static  function getList(){
        $query = "SELECT * FROM products";
        $products = DataBase()->fetchAll($query);

        $query = "SELECT * FROM vendors";
        $vendors = DataBase()->fetchAll($query);

        $query = "SELECT ct.id , pd.id , ct.name , pdct.product_id , pdct.category_id   FROM categories AS ct , products AS pd , products_categories AS pdct WHERE pd.id = pdct.product_id AND ct.id = pdct.category_id";
        $categories= DataBase()->fetchAll($query);

        return array($products,$vendors,$categories);
    }
    public  static  function create(){
        /*$name = RequestService::getStringFromPost('name');
        $price = RequestService::getFloatFromPost('price');
        $amount = RequestService::getIntFromPost('amount');
        $description =RequestService::getStringFromPost('description');
        $vendor_id = RequestService::getIntFromPost('vendor_id');
        $categories_ids =RequestService::getArrayFromPost('categories_ids');*/
        
        /*$value = "$name,$price,$amount,$description,$vendor_id";
        
        return $values = explode(',' ,$value);*/
        $values = $_POST;
        return $keys = array_keys($values);
    }
}