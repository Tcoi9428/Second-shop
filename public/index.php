<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/../App/bootstrap.php';

$query = "SELECT * FROM products";
$products = DataBase()->fetchAll($query);


$query = "SELECT * FROM vendors";
$vendors = DataBase()->fetchAll($query);

$query = "SELECT ct.id , pd.id , ct.name , pdct.product_id , pdct.category_id   FROM categories AS ct , products AS pd , products_categories AS pdct WHERE pd.id = pdct.product_id AND ct.id = pdct.category_id ";
$categories = DataBase()->fetchAll($query);



smarty()->assign_by_ref('products',$products);
smarty()->assign_by_ref('vendors',$vendors);
smarty()->assign_by_ref('categories',$categories);
smarty()->display('index.tpl');