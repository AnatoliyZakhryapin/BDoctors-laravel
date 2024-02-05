<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ottieni l'utente attualmente loggato
        $logged_user = Auth::user();

        if (!$logged_user->doctor) {
            return view('admin/dashboard', compact('logged_user'));
        } else {
            // Recupera il dottore associato all'utente loggato.
            // Restituisce un array di lunghezza 1 (relazione one-to-one)
            $doctors = Doctor::where('user_id', '=', $logged_user->id)->get();
            $doctor = $doctors[0];

            // Recupera i messaggi associati al dottore loggato
            $messages = Message::where('doctor_id', '=', $doctor->id)->get();
            // Restituisce la vista dell'elenco dei messaggi per l'amministratore,
            // passando l'array di messaggi come variabile compatta
            return view('admin/dashboard', compact('doctor', 'messages'));
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
