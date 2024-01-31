<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\User;
use App\Models\Sponsorship;
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

        $users = User::all();
        $userIds = $users->pluck('id');

        for ($i = 0; $i < 11; $i++) {
    {   
        $sponsorships = Sponsorship::all();
        $sponsorships_id = $sponsorships->pluck('id');

        for($i = 0; $i < 11; $i++){
            $new_doctor = new Doctor();
            $new_doctor->curriculum = $faker->imageUrl(360, 360, 'animals', true, 'dogs', true);
            $new_doctor->photo = $faker->imageUrl(360, 360, 'animals', true, 'dogs', true);
            $new_doctor->address = $faker->address();
            $new_doctor->phone_number = $faker->phoneNumber();
            $new_doctor->medical_services = $faker->words(5, true);

            $new_doctor->user_id = $faker->unique()->randomElement($userIds);

            $new_doctor->save();

            $new_doctor->sponsorships()->attach($faker->randomElements($sponsorships_id, null));
        }
    }
}
