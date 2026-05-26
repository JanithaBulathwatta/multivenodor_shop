<?php

namespace App\Services;

use App\Repository\Interfaces\BuyItemServiceInterface;

class BuyItemService{

    public static function getOrderItemDetails($request){
        $result = app()->make(BuyItemServiceInterface::class)->getOrderItemDetails($request);
        return $result;
    }
}
