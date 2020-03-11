<?php

use App\Model\Category;
use App\Service\CategoryService;

require_once __DIR__ . '/../App/bootstrap.php';

$faker = Faker\Factory::create();

$company = new Faker\Provider\en_US\Company($faker);
for ($i = 0; $i < 10; $i++) {
    $category = new Category();
    $category->setName($company->jobTitle());
    CategoryService::save($category);
}