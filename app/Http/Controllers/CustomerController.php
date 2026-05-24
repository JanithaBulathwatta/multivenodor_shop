<?php

namespace App\Http\Controllers;

use App\Services\CustomerService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function loadCustomerDetails(){
        return view('pages.customer-details');
    }

    public function setCustomerDetails(Request $request){
        $response = CustomerService::setCustomerDetails($request);
        return response()->json($response);
    }
}
