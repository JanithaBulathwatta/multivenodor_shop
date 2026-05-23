<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function loadCustomerDetails(){
        return view('pages.customer-details');
    }
}
