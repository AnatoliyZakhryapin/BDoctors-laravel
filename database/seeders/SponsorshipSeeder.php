<?php

namespace Database\Seeders;

use App\Models\Sponsorship;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class SponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            Sponsorship::create([
                'type' => $faker->randomElement(['un giorno', 'due giorni', 'una settimana']),
                'price' => $faker->randomElement([2.99, 5.99, 9.99]),
                'duration' => $faker->randomElement([24, 72, 144]),
            ]);
        }
    }
}