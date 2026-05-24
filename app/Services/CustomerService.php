<?php

namespace App\Services;

use App\Repository\Interfaces\CustomerServiceInterface;

class CustomerService{

    public static function setCustomerDetails($request){
        $result = app()->make(CustomerServiceInterface::class)->setCustomerDetails($request);
        return $result;
    }

}
