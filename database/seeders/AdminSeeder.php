<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nisn' => '192010213',
            'name' => 'Iksan Fauzi',
            'email' => 'iksan@gmail.com',
            'password' => Hash::make('password'),
            'position' => 'admin',
            'is_active' => true,
        ]);
    }
}
