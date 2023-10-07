<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'uuid' => Str::uuid(),
            'nisn' => '192010213',
            'name' => 'Iksan Fauzi',
            'email' => 'iksan@gmail.com',
            'password' => Hash::make('password'),
            'position' => 'admin',
            'is_active' => true,
        ]);
    }
}
