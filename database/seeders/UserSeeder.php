<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'LANN Phorlly',
            'gender' => 1,
            'address' => 'Mondulkiri, Cambodia',
            'phone' => '0973200826',
            'email' => 'admin@system.com',
            'role' => 1,
            'noted' => 'The system admin',
            'password' => Hash::make('Admin@123'),
        ]);
        User::create([
            'name' => 'THAI Ngounleng',
            'gender' => 1,
            'address' => 'Takeo, Cambodia',
            'phone' => '0973859847',
            'email' => 'ngounleng@user.com',
            'role' => 2,
            'noted' => 'The normal user',
            'password' => Hash::make('Ngounleng@123'),
        ]);
        User::create([
            'name' => 'SEAM Saron',
            'gender' => 1,
            'address' => 'Takeo, Cambodia',
            'phone' => '0964821415',
            'email' => 'saron@hr.com',
            'role' => 3,
            'noted' => 'The team leader',
            'password' => Hash::make('Saron@123'),
        ]);
    }
}
