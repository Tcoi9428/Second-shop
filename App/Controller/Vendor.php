<?php

namespace App\Controller;

use App\Service\RequestService;
use App\Service\VendorService;



class Vendor
{
    public static function list(){
        $vendors = VendorService::getList();
        smarty()->assign_by_ref('vendors' , $vendors);
        smarty()->display('vendors/index.tpl');
    }
    public  static function edit(){
        $vendor_id = RequestService::getIntFromGet('vendor_id');
        $vendors = VendorService::getList();

        smarty()->assign_by_ref('vendors' , $vendors);
        smarty()->assign_by_ref('vendor_id',$vendor_id);
        smarty()->display('vendors/edit.tpl');
    }
    public static  function editing(){
        VendorService::save();
        self::redirectToList();
    }
    public  static  function delete(){
        VendorService::delete();
        self::redirectToList();
    }
    private static function redirectToList() {
        RequestService::redirect('/vendors/');
    }
}