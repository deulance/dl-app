<?php

namespace Database\Seeders;

use App\Models\Deulance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeulanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Deulance::factory()->count(100)->create();
    }
}
