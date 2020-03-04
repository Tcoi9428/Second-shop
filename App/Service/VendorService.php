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
        $id = $vendor->getId();
        $data = [
            'name'=>$vendor->getName()
        ];
        if($id > 0){
            return DataBase()->update('vendors', $data ,'id=' . $id);
        }
        else{
            return DataBase()->insert('vendors',$data);
        }
    }
    public  static function delete()
    {
        $delete_id = RequestService::getIntFromPost('delete_id');
        if($delete_id){
            return DataBase()->deleteItem('vendors','id='. $delete_id);
        }
    }
}