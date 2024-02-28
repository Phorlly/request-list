<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Module::create(['name' => 'Home', 'icon' => 'fas fa-home', 'url' => 'home', 'roles' => json_encode([1, 2, 3, 4, 5])]);
        Module::create(['name' => 'User', 'icon' => 'fas fa-home', 'url' => 'home', 'roles' => json_encode([1, 2, 3, 4, 5])]);
        Module::create(['name' => 'Leave or Mission', 'icon' => 'fas fa-home', 'url' => 'home', 'roles' => json_encode([1, 2, 3, 4, 5])]);
        Module::create(['name' => 'Pending', 'icon' => 'fas fa-home', 'url' => 'home', 'roles' => json_encode([1, 2, 3, 4, 5])]);
        Module::create(['name' => 'Approved', 'icon' => 'fas fa-home', 'url' => 'home', 'roles' => json_encode([1, 2, 3, 4, 5])]);
        Module::create(['name' => 'Rejected', 'icon' => 'fas fa-home', 'url' => 'home', 'roles' => json_encode([1, 2, 3, 4, 5])]);
    }
}
