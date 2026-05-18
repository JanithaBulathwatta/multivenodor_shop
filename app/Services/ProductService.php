<?php

namespace App\Services;

use App\Repository\Interfaces\ProductServiceInterface;

class ProductService{

    public static function setProductCreate($request){
        $result = app()->make(ProductServiceInterface::class)->setProductCreate($request);
        return $result;
    }

}
