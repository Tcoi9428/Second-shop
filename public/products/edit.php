<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/../App/bootstrap.php';

$product_id = (int) $_GET['product_id'];

$query = " SELECT * FROM products JOIN products_categories WHERE products.id=products_categories.product_id AND products.id=$product_id";
$product = DataBase()->fetchAll($query);

$query = "SELECT * FROM vendors";
$vendors = DataBase()->fetchAll($query);

$query = "SELECT * FROM categories";
$categories = DataBase()->fetchAll($query);


smarty()->assign_by_ref('categories',$categories);
/*smarty()->assign_by_ref('product_categories',$product_categories);*/
smarty()->assign_by_ref('vendors', $vendors);
smarty()->assign_by_ref('product', $product);
smarty()->assign_by_ref('product_id' , $product_id);
smarty()->display('product/edit.tpl');
