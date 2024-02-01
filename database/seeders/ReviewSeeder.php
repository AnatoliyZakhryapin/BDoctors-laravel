<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Review;
use App\Models\Vote;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker)
    {
        // Recuperiamo tutti i dotori
        $doctors = Doctor::all();
        // Creamo un array con solo id di ogni collezione per passare questo dato a randoElement()
        $doctors_ids = $doctors->pluck('id');

        $votes = Vote::all();
        $votes_ids = $votes->pluck('id');

        for ($i = 0; $i < 20; $i++) {
            Review::create([
                'name' => $faker->name,
                'message' => $faker->text,
                'doctor_id' => $faker->randomElement($doctors_ids),
                'vote_id' => $faker->randomElement($votes_ids),
            ]);
        }
    }
}

