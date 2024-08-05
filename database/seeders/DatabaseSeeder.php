<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Testing\Fakes\Fake;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            MediaSeeder::class,
            PlaceRoomTypeSeeder::class,
            AccessoryTypeSeeder::class,
            PlaceSeeder::class,
            SubRoomSeeder::class,
            RolesPermissionsSeeder::class,
            // FoodShopSeeder::class,
            FoodCategorySeeder::class,
            FoodSeeder::class,
            // AccessoryShopSeeder::class,
            AccessorySeeder::class,
            PhotographyTeamSeeder::class,
            UserSeeder::class,
            PostSeeder::class,
            EventTypeSeeder::class,
            EventSeeder::class,
            InvitationCardStyleSeeder::class,
            media_postSeeder::class,
            EventDateSeeder::class,
            ReservationSeeder::class,
        ]);

        Artisan::call('passport:install --force');
    }
}
