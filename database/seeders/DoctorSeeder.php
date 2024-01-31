<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for($i = 0; $i < 11; $i++){
            $new_doctor = new Doctor();
            $new_doctor->curriculm = $faker->image(null, 360, 360, 'animals', true, true, 'cats', true);
            $new_doctor->photo = $faker->image(null, 360, 360, 'animals', true, true, 'cats', true);
            $new_doctor->address = $faker->address();
            $new_doctor->phone_number = $faker->phoneNumber();
            $new_doctor->medical_services = $faker->words(5, true);
            $new_doctor->save();
        }
    }
}
