<?php

namespace Database\Seeders;

use App\Models\Year;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class YearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $years = [
            [
                'year' => '2023',
            ],
            [
                'year' => '2022',
            ],
            [
                'year' => '2021',
            ]
        ];

        foreach ($years as $year) {
            Year::create($year);
        }
    }
}
