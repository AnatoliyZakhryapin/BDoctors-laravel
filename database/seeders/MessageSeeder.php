<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Message;
use Faker\Generator as Faker;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        //recuperiamo collezione di Doctor da DB
        $doctors = Doctor::all();
        // Creamo un array con solo id di ogni collezione per passare questo dato a randoElement() 
        $doctors_ids = $doctors->pluck('id');


        for ($i = 0; $i < 10; $i++) {
            $new_message = new Message();

            $new_message->name = $faker->name();
            $new_message->surname = $faker->lastName();
            $new_message->phone_number = $faker->unique()->randomNumber(9, true);
            $new_message->email = $faker->unique()->email();
            $new_message->message = $faker->paragraphs(1, true);
            $new_message->doctor_id = $faker->randomElement($doctors_ids);
            $new_message->save();
        }
    }
}