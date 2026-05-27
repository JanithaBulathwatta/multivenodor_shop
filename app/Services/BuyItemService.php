<?php

namespace App\Services;

use App\Repository\Interfaces\BuyItemServiceInterface;

class BuyItemService{

    public static function getOrderItemDetails($request){
        $result = app()->make(BuyItemServiceInterface::class)->getOrderItemDetails($request);
        return $result;
    }

    public static function setOrderDetails($request){
        $result = app()->make(BuyItemServiceInterface::class)->setOrderDetails($request);
        return $result;
    }
}
