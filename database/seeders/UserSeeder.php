<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Faker\Generator as Faker;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for($i = 0; $i < 10; $i++){
            $new_user = new User();
            $new_user->name = $faker->name();
            $new_user->surname = $faker->lastName();
            $new_user->email = $faker->email();
            $new_user->password = Hash::make($faker->password());
            $new_user->save();
        }
        
        $user = User::create([
            'name' => 'admin',
            'surname' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin123'),
        ]);
    }
}
