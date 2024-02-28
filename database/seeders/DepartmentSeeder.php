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
        Department::create(['name' => 'IT']);
        Department::create(['name' => 'Sale']);
        Department::create(['name' => 'Accounting']);
        Department::create(['name' => 'Receptionist']);
        Department::create(['name' => 'Secuiry Guard']);
    }
}
