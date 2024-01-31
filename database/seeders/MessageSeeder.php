<?php

namespace Database\Seeders;

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
        for ($i = 0; $i < 10; $i++) {
            $new_message = new Message();

            $new_message->name = $faker->name();
            $new_message->surname = $faker->lastName();
            $new_message->phone_number = $faker->unique()->randomNumber(9, true);
            $new_message->email = $faker->unique()->email();
            $new_message->message = $faker->paragraphs(1, true);

            $new_message->save();
        }
    }
}