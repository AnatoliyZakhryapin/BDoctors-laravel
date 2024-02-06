<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\APIStoreDoctorRequest;
use App\Models\Doctor;
use Symfony\Component\HttpKernel\Profiler\Profile;
use Illuminate\Contracts\Database\Eloquent\Builder;

class DoctorController extends Controller
{
    public function index(APIStoreDoctorRequest $request)
    {
        $data = $request->all();

        $doctors = Doctor::all();
        
        if(isset($data['specialization_ids'])) {
            
            $specialization_ids = $data['specialization_ids'];
            $doctors = Doctor::whereHAs('specializations', function (Builder $query)  use ($specialization_ids) {
                $query->whereIn('specialization_id', $specialization_ids);
            })->with('specializations')->get();
        }

        $results = $doctors;

        return response()->json([
	        'status' => true,
	        'results' => $results
        ]);
    }
   
}
