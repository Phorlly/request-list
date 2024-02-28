<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        User::create([
            'name' => 'LANN Phorlly',
            'gender' => $faker->numberBetween(0, 1),
            'address' => $faker->address(),
            'dob' => $faker->date('Y-m-d'),
            'phone' => $faker->phoneNumber(),
            'photo' => 'avatar.png',
            'email' => 'admin@system.com',
            'role' => 1,
            'password' => Hash::make('Admin@123'),
        ]);
        User::create([
            'name' => 'THAI Ngounleng',
            'gender' => $faker->numberBetween(0, 1),
            'address' => $faker->address(),
            'dob' => $faker->date('Y-m-d'),
            'phone' => $faker->phoneNumber(),
            'photo' => 'avatar.png',
            'email' => 'ngounleng@user.com',
            'role' => 2,
            'password' => Hash::make('Ngounleng@123'),
        ]);
        User::create([
            'name' => 'SEAM Saron',
            'gender' => $faker->numberBetween(0, 1),
            'address' => $faker->address(),
            'dob' => $faker->date('Y-m-d'),
            'phone' => $faker->phoneNumber(),
            'photo' => 'avatar.png',
            'email' => 'saron@hr.com',
            'role' => 3,
            'password' => Hash::make('Saron@123'),
        ]);
    }
}
