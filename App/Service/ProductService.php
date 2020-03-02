<?php


namespace App\Service;


use App\Model\Category;
use App\Model\Product;
use App\Model\Vendor;

class ProductService
{

    private  function __construct()
    {
    }

    public static  function getList(){
        $query = "SELECT * FROM products";
        $products = DataBase()->fetchAll($query , Product::class);
        return $products;
    }

    /**
     * @param int $product_id
     * @return Product
     */
    public static function getEditItem( int $product_id) : Product{
        $product_id = $product_id;
        $query = " SELECT * FROM products WHERE id=$product_id";
        $product = DataBase()->fetchRow($query ,Product::class);
        return $product;
    }
    public static function save(Product $product){
        $data = [
          'name'=> $product->getName(),
          'price'=> $product->getPrice(),
          'amount'=> $product->getAmount(),
          'vendor_id'=> $product->getVendorId(),
          'description' => $product->getDescription()
        ];
        $product_id = $product->getId();
        if ($product_id > 0){
            DataBase()->update('products' , $data , 'id='.$product_id);
        }
        else{
            DataBase()->insert('products',$data);
        }
        self::insertCategories($product_id , $product->getCategoriesIds());

        return self::getEditItem($product_id);
    }
    public static function delete(){
        $delete_id = RequestService::getIntFromPost('product_id');
        if($delete_id){
            return DataBase()->deleteItem('products','id='."$delete_id");
        }
    }

    private static function insertCategories(int $product_id , array $category_ids){
        $category_ids = array_unique($category_ids);
        foreach ($category_ids as $category_id){
            DataBase()->insert('products_categories',[
               'product_id'=>$product_id,
               'category_id'=>$category_id
            ]);
        }
    }
}