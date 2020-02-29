<?php

namespace App\Service;

use App\Model\Vendor;


class VendorService
{
    private function  __construct()
    {
    }
    public static function getList(){
        $query = "SELECT * FROM vendors";
        $vendors = DataBase()->fetchAll($query);
        return $vendors;
    }
    public static function save(){
        $id = RequestService::getIntFromPost('vendor_id');
        if($id > 0){
            self::update();
        }
        else{
            self::create();
        }
    }
    private function update(){
        $id = RequestService::getIntFromPost('vendor_id');
        $name = RequestService::getStringFromPost('name');
        $query = "UPDATE vendors SET name='$name' WHERE id=$id";
        return DataBase()->query($query);
    }
    private function create(){
        $name  = RequestService::getStringFromPost('name');
        $query = "INSERT INTO vendors (name) VALUES ('$name')";
        return DataBase()->query($query);
    }
    public  static function delete(){
        $delete_id = RequestService::getIntFromPost('delete_id');
        if($delete_id){
            $query = "DELETE FROM vendors WHERE id = '$delete_id'";
        }
        return DataBase()->query($query);
    }
}