<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMessageRequest;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = Message::all();

        return response()->json([
            'success' => true,
            'results' => $messages,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMessageRequest $request)
    {
        $message = Message::create($request->all());

        // $data_prova = [
        //     'name' => 'Prova name',
        //     'surname' => 'Prova Surname',
        //     'phone_number' => '123456789',
        //     'email' => 'prova@prova.com',
        //     'message' => 'blablabla',
        //     'doctor_id' => '22'
        // ];
        // $jsonString = '{
        //     "name": "Prova name",
        //     "surname": "Prova Surname",
        //     "phone_number": "123456789",
        //     "email": "prova@prova.com",
        //     "message": "blablabla",
        //     "doctor_id": 22
        // }';

        // $dataCollection = collect(json_decode($jsonString, true));
        // $request->validate([
        //     'name' => 'required|max:100',
        //     'surname' => 'required|max:100',
        //     'phone_number' => 'required|max:20',
        //     'email' => 'required|max:255',
        //     'message' => 'required',
        //     'doctor_id' => 'required'
        // ]);

        // $data = $request->all();
  
        // $data = $request->all();
        // $data = $dataCollection;

        return response()->json([
            'status' => true,
            'message' => "Message Created successfully!",
            'product' => $message
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
