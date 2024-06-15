<?php

namespace Database\Seeders;

use App\Models\AccessoryShop;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccessoryShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AccessoryShop::factory(10)->create();
    }
}
