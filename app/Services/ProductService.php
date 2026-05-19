<?php

namespace App\Services;

use App\Repository\Interfaces\ProductServiceInterface;

class ProductService{

    public static function setProductCreate($request){
        $result = app()->make(ProductServiceInterface::class)->setProductCreate($request);
        return $result;
    }
    public static function getProductDetails($request){
        $result = app()->make(ProductServiceInterface::class)->getProductDetails($request);
        return $result;
    }

    public static function setProductDelete($request){
        $result = app()->make(ProductServiceInterface::class)->setProductDelete($request);
        return $result;
    }

}
