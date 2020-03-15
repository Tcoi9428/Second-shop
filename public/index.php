<?php
use App\Controller\Product;

require_once $_SERVER['DOCUMENT_ROOT'] . '/../App/bootstrap.php';
//require_once APP_DIR . 'scripts/product.generator.php';
Product::list(15);