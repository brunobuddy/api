<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Transaction;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class CustomerController extends Controller
{
    public function show($token)
    {
        $customer = Customer::whereToken($token)->first();
        if (!$customer) {
            return abort(403, 'Invalid customer');
        }

        return response()->json($customer);
    }

    /*
     * Met à jour l'amount de l'utilisateur suite à une transaction ou un refund
     *
     * @ returns updated Customer amount
     */
    public function store()
    {

        $customer = Customer::whereToken(request('token'))->first();
        if (!$customer) {
            return abort(403, 'Invalid customer');
        }

        $transactionAmount = request('transaction_amount');

        // We ensure that Customer has enough money if it's an expense
        if ($transactionAmount < 0 && $customer->amount < abs($transactionAmount)) {
            return abort(403, 'Insufficient funds');
        }

        Transaction::create([
            'customer_id' => $customer->id,
            'amount' => $transactionAmount,
        ]);

        $customer->amount = $customer->amount + $transactionAmount;
        $customer->save();

        return response()->json($customer->amount);
    }
}   
