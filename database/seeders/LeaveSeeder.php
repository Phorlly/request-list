<?php

namespace Database\Seeders;

use App\Models\Leave;
use Illuminate\Database\Seeder;

class LeaveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Leave::create([
            'name' => 'Annual Leave / Vacation Leave',
            'duration' => "3-7 days",
            'noted' => 'This type of leave is granted to employees for taking time off from work for personal reasons, such as holidays, vacations, or leisure',
        ]);
        Leave::create([
            'name' => 'Sick Leave',
            'duration' => '1-3 days',
            'noted' => 'Sick leave is provided to employees who are unable to work due to illness, injury, or medical appointments',
        ]);
        Leave::create([
            'name' => 'Maternity Leave',
            'duration' => "1-3 months",
            'noted' => 'Maternity leave is granted to female employees for childbirth, prenatal care, and recovery following childbirth',
        ]);
        Leave::create([
            'name' => 'Study / Educational Leave',
            'duration' => '3-7 days',
            'noted' => 'Study or educational leave allows employees to take time off work to pursue further education or training relevant to their job',
        ]);
    }
}
