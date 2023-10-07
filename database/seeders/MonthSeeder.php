<?php

namespace Database\Seeders;

use App\Models\Month;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MonthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $months = [
            ['month' => 'January'],
            ['month' => 'February'],
            ['month' => 'March'],
            ['month' => 'April'],
            ['month' => 'May'],
            ['month' => 'June'],
            ['month' => 'July'],
            ['month' => 'August'],
            ['month' => 'September'],
            ['month' => 'October'],
            ['month' => 'November'],
            ['month' => 'December'],
        ];

        foreach ($months as $month) {
            Month::create($month);
        }
    }
}
