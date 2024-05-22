<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        
        \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(EventTypeSeeder::class);
        $this->call(PlaceRoomTypeSeeder::class);
        $this->call(AccessoryTypeSeeder::class);
        $this->call(FoodCategorySeeder::class);
        $this->call(PlaceSeeder::class);
        $this->call(SubRoomSeeder::class);
    }
}
