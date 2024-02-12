<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\APIStoreDoctorRequest;
use App\Models\Doctor;
use Symfony\Component\HttpKernel\Profiler\Profile;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    public function index(APIStoreDoctorRequest $request)
    {   //Recuperiamo tutti dati dalla richiesta API
        $data = $request->all();

        //Prepariamo collection di dottori
        $doctors = Doctor::with('specializations', 'reviews')
            ->withCount('reviews');

        //Filtriamo il resultato dei dottori con ASC o DESC uttilizando il parametro arrivato da API
        if (isset($data['order'])) {
            $doctors->orderBy('reviews_count', $data['order']);
        };

        //Filtriamo il resultato dei dottori in base a specializzazione scelta
        if (isset($data['specialization_id'])) {
            //Assegnamo a una nuova variabile il valore della specializzazione da cercare
            $specialization_id = $data['specialization_id'];

            //Cerchiamo i dottori che hanno una specifica specializzazione 
            $doctors->whereHAs('specializations', function (Builder $query)  use ($specialization_id) {
                $query->where('specialization_id', $specialization_id);
            });
        };
    
        //Colleghiamo tabella doctors con review e raggruppiamo per id dottore 
        $doctors->select('doctors.*', DB::raw('IFNULL(CAST(AVG(reviews.vote_id) AS UNSIGNED), 0) as media_voti'))
            ->leftJoin('reviews', 'doctors.id', '=', 'reviews.doctor_id')
            ->groupBy('doctors.id')
            ->withCount('reviews');

        //Se non arriva da API un valore allore ti restitusce tutti dottori
        if (isset($data['avg_vote'])) {
            $doctors->havingRaw('CAST(IFNULL(AVG(reviews.vote_id), 0) AS UNSIGNED) = ?', [$data['avg_vote']]);
        };

        //Creamo la variabile per uttillizzarla nella risposta ad API
        $results = $doctors->get();

        return response()->json([
            'status' => true,
            'results' => $results
        ]);
    }
}
