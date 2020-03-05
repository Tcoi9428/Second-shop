<?php

namespace App\Controller;

use App\Model\Vendor as VendorModel;
use App\Service\RequestService;
use App\Service\VendorService;



class Vendor
{
    public static function list()
    {
        $vendors = VendorService::getList();

        smarty()->assign_by_ref('vendors' , $vendors);
        smarty()->display('vendors/index.tpl');
    }
    public  static function edit()
    {
        $vendor_id = RequestService::getIntFromGet('vendor_id');
        if ($vendor_id){
            $vendor = VendorService::getEditItem($vendor_id);
        }else{
            $vendor = new VendorModel();
        }
        smarty()->assign_by_ref('vendor' , $vendor);
        smarty()->display('vendors/edit.tpl');
    }
    public static  function editing()
    {
        $vendor_id = RequestService::getIntFromPost('vendor_id');
        $name = RequestService::getStringFromPost('name');

        $vendor = new VendorModel();

        if ($vendor_id) {
            $vendor = VendorService::getEditItem($vendor_id);
        }
        $vendor->setId($vendor_id);
        $vendor->setName($name);

        VendorService::save($vendor);
        self::redirectToList();
    }
    public  static  function delete()
    {
        VendorService::delete();
        self::redirectToList();
    }
    private static function redirectToList()
    {
        RequestService::redirect('/vendors/');
    }
}