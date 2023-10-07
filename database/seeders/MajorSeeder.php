<?php

namespace Database\Seeders;

use App\Models\Major;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $major = [
            [
                'name' => 'Rekayasa Perangkat Lunak',
                'major_code' => 'RPL',
            ],
            [
                'name' => 'Akutansi',
                'major_code' => 'AK',
            ],
            [
                'name' => 'Teknik Kendaraan Ringan Otomotif',
                'major_code' => 'TKRO',
            ],
        ];

        foreach ($major as $major) {
            Major::create($major);
        }
    }
}
