<?php

namespace Database\Seeders;

use App\Models\InvitationCardStyle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InvitationCardStyleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        InvitationCardStyle::factory(10)->create();
    }
}
