<?php

namespace App\Service;

use App\Model\Vendor;


class VendorService
{
    private function  __construct()
    {
    }
    public static function getList()
    {
        $query = "SELECT * FROM vendors";
        $vendors = DataBase()->fetchAll($query , Vendor::class);
        return $vendors;
    }

    /**
     * @param int $vendor_id
     * @return Vendor
     */
    public  static function getEditItem( int $vendor_id): Vendor
    {
        $vendor_id = $vendor_id;
        $query = " SELECT * FROM vendors WHERE id=$vendor_id";
        $vendor = DataBase()->fetchRow($query ,Vendor::class);
        return $vendor;
    }
    public static function save(Vendor $vendor)
    {
        $vendor_id = $vendor->getId();
        if($vendor_id > 0){
             $vendor = DataBase()->update('vendors', [
                 'name'=>$vendor->getName()
             ],'id=' . $vendor_id);
        }
        else{
            $vendor = DataBase()->insert('vendors',[
                'name'=> $vendor->getName()
            ]);
        }
        return $vendor;
    }
    public  static function delete()
    {
        $delete_id = RequestService::getIntFromPost('delete_id');
        if($delete_id){
            return DataBase()->deleteItem('vendors','id='. $delete_id);
        }
    }
    public static function getRandom()
    {
        $query = "SELECT * FROM vendors ORDER BY RAND() LIMIT 1";
        return DataBase()->fetchRow($query,Vendor::class);
    }
}