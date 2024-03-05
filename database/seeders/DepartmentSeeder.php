<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::create([
            'name' => 'Information Tecchnology',
            'short' => 'IT',
            'noted' => 'For develop a new Technology',
        ]);
        Department::create([
            'name' => 'Sale',
            'short' => 'S',
            'noted' => 'For sale product of Company',
        ]);
        Department::create([
            'name' => 'Accounting',
            'short' => 'A',
            'noted' => 'For calulate the income or expense',
        ]);
        Department::create([
            'name' => 'Receptionist',
            'short' => 'R',
            'noted' => 'For get the guest',
        ]);
        Department::create([
            'name' => 'Secuiry Guard',
            'short' => 'SG',
            'noted' => 'For protect security in Company',
        ]);
    }
}
