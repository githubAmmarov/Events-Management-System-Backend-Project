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
            FoodCategorySeeder::class,
            AccessoryTypeSeeder::class,
            PlaceRoomTypeSeeder::class,
            FoodSeeder::class,
            InvitationCardStyleSeeder::class,
            AccessorySeeder::class,
            PhotographyTeamSeeder::class,
            PlaceSeeder::class,
            SubRoomSeeder::class,
            RolesPermissionsSeeder::class,
            UserSeeder::class,
            PostSeeder::class,
            EventTypeSeeder::class,
            EventSeeder::class,
            EventDateSeeder::class,
            ReservationSeeder::class,
        ]);

        Artisan::call('passport:install --force');
    }
}
