<?php

namespace Database\Seeders;

use App\Models\Media;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //food directory
        $appetizers_dir = public_path('storage/foods/appetizers');
        $cakes_dir = public_path('storage/foods/cakes');
        $desserts_dir = public_path('storage/foods/dessert');
        $drinks_dir = public_path('storage/foods/drinks');
        
        // accessories directory
        $flowers_dir = public_path('storage/accessories/flowers');
        $baloons_dir = public_path('storage/accessories/baloons');
        $cars_dir = public_path('storage/accessories/cars');
        $show_band_dir = public_path('storage/accessories/show_band');
        $music_and_chanting_dir = public_path('storage/accessories/music_and_chanting');
        $quran_dir = public_path('storage/accessories/quran');
        
        $invitationCards_dir = public_path('storage/InvitationCards');

        $PhotographTeams_dir = public_path('storage/PhotographTeams');
        
        //food photos
        $appetizers = File::files($appetizers_dir);
        $cakes = File::files($cakes_dir);
        $desserts = File::files($desserts_dir);
        $drinks = File::files($drinks_dir);
        
        //accessories photos
        $flowers = File::files($flowers_dir);
        $baloons = File::files($baloons_dir);
        $cars = File::files($cars_dir);
        $show_bands = File::files($show_band_dir);
        $music_and_chantings = File::files($music_and_chanting_dir);
        $Quran = File::files($quran_dir);
        
        $InvitationCards = File::files($invitationCards_dir);

        $PhotographTeams = File::files($PhotographTeams_dir);
        
        
        
        //food images seed
        // =============================================================================
        
        foreach($desserts as $dessert)
        {
            Media::create([
                'media_url' => 'http://127.0.0.1:8000/storage/foods/dessert/' . $dessert->getFilename(),
            ]);
        }
        foreach($appetizers as $appetizer)
        {
            Media::create([
                'media_url' => 'http://127.0.0.1:8000/storage/foods/appetizers/' . $appetizer->getFilename(),
            ]);
        }
        foreach($cakes as $cake)
        {
            Media::create([
                'media_url' => 'http://127.0.0.1:8000/storage/foods/cakes/' . $cake->getFilename(),
            ]);
        }
        foreach($drinks as $drink)
        {
            Media::create([
                'media_url' => 'http://127.0.0.1:8000/storage/foods/drinks/' . $drink->getFilename(),
            ]);
        }
        // =================================================================================
        
        
        //invitation card styles seed
        // =================================================================================
        foreach($InvitationCards as $InvitationCard)
        {
            Media::create([
                'media_url' => 'http://127.0.0.1:8000/storage/InvitationCards/' . $InvitationCard->getFilename(),
            ]);
        }
        // =================================================================================
       
        //accessories seed
        // =================================================================================
        foreach($flowers as $flower)
        {
            Media::create([
                'media_url' => 'http://127.0.0.1:8000/storage/accessories/flowers/' . $flower->getFilename(),
            ]);
        }
        foreach($baloons as $baloon)
        {
            Media::create([
                'media_url' => 'http://127.0.0.1:8000/storage/accessories/baloons/' . $baloon->getFilename(),
            ]);
        }
        foreach($cars as $car)
        {
            Media::create([
                'media_url' => 'http://127.0.0.1:8000/storage/accessories/cars/' . $car->getFilename(),
            ]);
        }
        foreach($show_bands as $show_band)
        {
            Media::create([
                'media_url' => 'http://127.0.0.1:8000/storage/accessories/show_band/' . $show_band->getFilename(),
             ]);
        }
        foreach($music_and_chantings as $music_and_chanting)
        {
            Media::create([
                'media_url' => 'http://127.0.0.1:8000/storage/accessories/music_and_chanting/' . $music_and_chanting->getFilename(),
            ]);
        }
        foreach($Quran as $quran)
        {
            Media::create([
                'media_url' => 'http://127.0.0.1:8000/storage/accessories/quran/' . $quran->getFilename(),
            ]);
        }
        // =================================================================================
        
        //Photography Teams seed
        // =================================================================================
        foreach($PhotographTeams as $PhotographTeam)
        {
            Media::create([
                'media_url' => 'http://127.0.0.1:8000/storage/PhotographTeams/' . $PhotographTeam->getFilename(),
            ]);
        }
        
        // =================================================================================
        
        Media::create([
            'media_url' => 'images/' . 'testImage.jpg',
        ]);
        Media::factory()->count(300)->create();
        
    }
}

