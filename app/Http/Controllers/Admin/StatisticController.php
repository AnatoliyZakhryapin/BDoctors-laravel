<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Message;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class StatisticController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ottieni l'utente attualmente loggato
        $logged_user = Auth::user();
        // Recupera il dottore associato all'utente loggato.
        // Restituisce un array di lunghezza 1 (relazione one-to-one)
        $doctors = Doctor::where('user_id', '=', $logged_user->id)->get();
        $doctor = $doctors[0];
        // Recupera i messaggi associati al dottore loggato
        $messages = Message::where('doctor_id', '=', $doctor->id)->get();
        //Recupera le recensioni associate al dottore loggato
        $reviews = Review::where('doctor_id', '=', $doctor->id)->get();
        //Contiamo il numero di recensioni associate al dottore
        $reviews_n = count($reviews);
        $reviews_total_votes = 0;
        // Cicliamo le reviews associate al dottore per sommare il totale dei voti
        foreach ($reviews as $review) {
            $reviews_total_votes += $review->vote->value;
        }
        ;
        // Calcoliamo la media
        $reviews_average = $reviews_total_votes / $reviews_n;
        // Restituisce la vista dell'elenco dei messaggi per l'amministratore,
        // passando l'array di messaggi come variabile compatta
        return view('admin.statistics.index', compact('doctor', 'reviews_average'));
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
