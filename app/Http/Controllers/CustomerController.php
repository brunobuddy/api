<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class CustomerController extends Controller
{
    public function show($id)
    {
        $customer = Customer::findOrFail($id);

        // token validation
        if ($customer->token != Input::get('token')) {
            return response()->json(false);
        }

        return response()->json($customer);
    }
}   
