<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $group = [
            [
                'name' => 'X RPL 1',
            ],
            [
                'name' => 'XI RPL 2',
            ],
            [
                'name' => 'XII AK',
            ],
            [
                'name' => 'X BPD 1',
            ],
            [
                'name' => 'X RPL 2',
            ],
            [
                'name' => 'X TKRO'
            ],
        ];

        foreach($group as $group) {
            Group::create($group);
        };
    }
}
