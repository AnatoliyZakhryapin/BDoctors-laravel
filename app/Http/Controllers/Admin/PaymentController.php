<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Braintree;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Sponsorship;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Braintree\Gateway;
use Carbon\Carbon;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sponsorship_id = $request->input('sponsorship_id');

        $sponsorship = Sponsorship::find($sponsorship_id);

        $price = $sponsorship->price;

        $logged_user = Auth::user();

        // Se utente logato ha il profilo 
        if ($logged_user->doctor) {
            // restituisce il dottore collegato allo user loggato 
            // resituisce array di lunghezza 1 (relazione one to one)
            $doctors = Doctor::where('user_id', '=', $logged_user->id)->get();
            $doctor = $doctors[0];

            $gateway = new Braintree\Gateway([
                'environment' => config('services.braintree.environment'),
                'merchantId' => config('services.braintree.merchantId'),
                'publicKey' => config('services.braintree.publicKey'),
                'privateKey' => config('services.braintree.privateKey')
            ]);

            $token = $gateway->ClientToken()->generate();

            return view('admin.payments', compact('token', 'doctor', 'sponsorship', 'price'));
        }
        // Altrimenti ti riporta sul Dashboard
        else {
            return redirect()->route('admin.dashboard.index');
        }
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
        $current_time = Carbon::now();

        $doctor_id =  $request->input('doctor_id');

        $sponsorship =  $request->input('sponsorship');

        $sponsorship = Sponsorship::find($sponsorship);

        // recupero durata da sposorship
        $duration = $sponsorship->duration;

        $price = $sponsorship->price;

        $sponsorship_id = $sponsorship->id;

        $doctor = Doctor::with('sponsorships', 'user')->find($doctor_id);

        $gateway = new Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);

        $amount = $request->amount;
        $nonce = $request->payment_method_nonce;


        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'customer' => [
                'firstName' => $doctor->user->name,
                'lastName' => $doctor->user->surname,
                'email' => $doctor->user->email,
            ],
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if ($result->success) {
            $transaction = $result->transaction;
            // header("Location: " . $baseUrl . "transaction.php?id=" . $transaction->id);
            // return back()->with('success_message', 'Transaction successful. The ID is:'. $transaction->id);

            // $transactionArray = $transaction->toArray();

            // dd($transactionArray);
            // dd($result);


            // calcola end_date tramite start_date e durata 
            $end_date = $current_time->copy()->addHours($duration);

            $data = [
                $sponsorship_id => [
                    'start_date' => $current_time,
                    'end_date' => $end_date,
                    'total' => $price,
                ],
            ];

            $doctor->sponsorships()->attach($data);

            return redirect()->route('admin.transaction.index', ['id' => $transaction->id]);
        } else {
            $errorString = "";

            foreach ($result->errors->deepAll() as $error) {
                $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
            }

            // $_SESSION["errors"] = $errorString;
            // header("Location: " . $baseUrl . "index.php");
            return back()->withErrors('An error occurred with the message: ' . $result->message);
        }
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
