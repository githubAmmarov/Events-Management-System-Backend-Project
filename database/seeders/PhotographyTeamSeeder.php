<?php

namespace Database\Seeders;

use App\Models\PhotographyTeam;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhotographyTeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PhotographyTeam::factory()->count(6)->create();
    }
}
