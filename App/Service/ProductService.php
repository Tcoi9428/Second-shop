<?php


namespace App\Service;


use App\Model\Product;

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
    }
    public static function delete(){
        $delete_id = RequestService::getIntFromPost('product_id');
        if($delete_id){
            return DataBase()->deleteItem('products','id='."$delete_id");
        }
    }

}