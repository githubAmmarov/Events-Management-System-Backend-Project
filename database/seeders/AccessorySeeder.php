<?php

namespace Database\Seeders;

use App\Models\Accessory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccessorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        


        Accessory::factory(10)->count(20)->create();
    }
}
