<?php


namespace App\Controller;


use App\Service\RequestService;
use App\Service\CategoryService;

class Category
{
    public static function list(){
        $categories = CategoryService::getList();
        smarty()->assign_by_ref('categories' , $categories);
        smarty()->display('categories/index.tpl');
    }
    public  static function edit(){
        $category_id = RequestService::getIntFromGet('category_id');
        $categories = CategoryService::getList();

        smarty()->assign_by_ref('categories' , $categories);
        smarty()->assign_by_ref('category_id',$category_id);
        smarty()->display('categories/edit.tpl');
    }
    public static  function editing(){
        CategoryService::save();
        self::redirectToList();
    }
    public  static  function delete(){
        CategoryService::delete();
        self::redirectToList();
    }
    private static function redirectToList() {
        RequestService::redirect('/categories/');
    }
}
