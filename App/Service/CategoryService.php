<?php


namespace App\Service;

use App\Model\Category;

class CategoryService
{
    private function  __construct()
    {
    }
    public static function getList(){
        $query = "SELECT * FROM categories";
        $categories = DataBase()->fetchAll($query);
        return $categories;
    }
    public static function save(){
        $id = RequestService::getIntFromPost('category_id');
        if($id > 0){
            self::update();
        }
        else{
            self::create();
        }
    }
    private function update(){
        $id = RequestService::getIntFromPost('category_id');
        $name = RequestService::getStringFromPost('name');
        $query = "UPDATE categories SET name='$name' WHERE id=$id";
        return DataBase()->query($query);
    }

    private function create(){
        $name = RequestService::getStringFromPost('name');
        $query = "INSERT INTO categories (name) VALUES ('$name')";
        return DataBase()->query($query);
    }
    public  static function delete(){
        $delete_id = RequestService::getIntFromPost('delete_id');
        if($delete_id){
            $query = "DELETE FROM categories WHERE id = '$delete_id'";
        }
        return DataBase()->query($query);
    }
}