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
        $media_id = 66;
        
        $photogrphy_names =['Al-Ameer','Media962','Opri'];
        foreach($photogrphy_names as $photogrphy_name)
        {
            PhotographyTeam::create([
                'media_id' => $media_id++,
                'name' => $photogrphy_name,
                'address' => 'Syria\Damascus',
                'cost' => 25,
                'phone_number' => "0988762341",
            ]);
        }
        // PhotographyTeam::factory()->count(6)->create();
    }
}
