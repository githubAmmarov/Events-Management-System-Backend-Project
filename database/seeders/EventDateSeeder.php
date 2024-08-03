<?php

namespace Database\Seeders;

use App\Models\EventDate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventDateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        EventDate::factory()->count(500)->create();
    }
}
