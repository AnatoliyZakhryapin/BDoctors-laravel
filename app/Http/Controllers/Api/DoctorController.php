<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\APIStoreDoctorRequest;
use App\Models\Doctor;

class DoctorController extends Controller
{
    public function index(APIStoreDoctorRequest $request)
    {
        $doctors = Doctor::all();
        
        return response()->json([
	        'status' => true,
	        'doctors' => $doctors
        ]);
    }
   
}
