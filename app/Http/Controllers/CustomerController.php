<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Transaction;
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
            return abort(403, 'Invalid token');
        }

        return response()->json($customer);
    }

    /*
     * Met à jour l'amount de l'utilisateur suite à une transaction ou un refund
     *
     * @ returns updated Customer amount
     */
    public function update($id)
    {
        $customer = Customer::findOrFail($id);
        $transactionAmount = request('transaction_amount');

        // On vérifie que le Customer a assez d'argent en cas de dépense
        if ($transactionAmount < 0 && $customer->amount < $transactionAmount * -1) {
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
