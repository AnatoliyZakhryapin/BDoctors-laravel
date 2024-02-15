<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Braintree;
use Illuminate\Http\Request;
use Braintree\Gateway;
class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $id = $request->input('id');

        $transaction = $request;

        if (isset($id)) {

            $gateway = new Braintree\Gateway([
                'environment' => config('services.braintree.environment'),
                'merchantId' => config('services.braintree.merchantId'),
                'publicKey' => config('services.braintree.publicKey'),
                'privateKey' => config('services.braintree.privateKey')
            ]);

            $transaction = $gateway->transaction()->find($id);
    
            $transactionSuccessStatuses = [
                Braintree\Transaction::AUTHORIZED,
                Braintree\Transaction::AUTHORIZING,
                Braintree\Transaction::SETTLED,
                Braintree\Transaction::SETTLING,
                Braintree\Transaction::SETTLEMENT_CONFIRMED,
                Braintree\Transaction::SETTLEMENT_PENDING,
                Braintree\Transaction::SUBMITTED_FOR_SETTLEMENT
            ];

            if (in_array($transaction->status, $transactionSuccessStatuses)) {
                $header = "Sweet Success!";
                $icon = "success";
                $message = "Your test transaction has been successfully processed. See the Braintree API response and try again.";
                
            } else {
                $header = "Transaction Failed";
                $icon = "fail";
                $message = "Your test transaction has a status of " . $transaction->status . ". See the Braintree API response and try again.";
            }
        }
       
        return view('admin.transaction', compact('header', 'icon', 'message', 'transaction'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
