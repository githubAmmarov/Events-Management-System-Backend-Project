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
        
        // places directory
        $hotels_dir = public_path('storage/places/hotels');
        $wedding_halls_dir = public_path('storage/places/wedding_halls');
        $resturants_dir = public_path('storage/places/resturants');
        $farms_dir = public_path('storage/places/farms');
        $centers_dir = public_path('storage/places/centers');
        
        // subRooms directory
        $Four_Season_dir = public_path('storage/places/hotels/Four_Season');
        $sheraton_dir = public_path('storage/places/hotels/sheraton');
        $Albishr_dir = public_path('storage/places/wedding_halls/Albishr');
        $Elite_Plaza_dir = public_path('storage/places/wedding_halls/Elite_Plaza');
        $Naqaba_Hall_dir = public_path('storage/places/wedding_halls/Naqaba_Hall');
        $beit_al_mokhtar_dir = public_path('storage/places/resturants/beit_al_mokhtar');
        $mazaya_dir = public_path('storage/places/resturants/mazaya');
        $serjella_dir = public_path('storage/places/resturants/serjella');
        $farms_subrooms_dir = public_path('storage/places/farms/farms_subrooms');
        $centers_subrooms_dir = public_path('storage/places/centers/centers_subrooms');
        
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
        
        //places photos
        $places =
        [    
            File::files($hotels_dir),
            File::files($wedding_halls_dir),
            File::files($resturants_dir),
            File::files($farms_dir),
            File::files($centers_dir),
        ];
        $places_dir = ['hotels','wedding_halls','resturants','farms','centers'];
        

        //subRooms photos
        $subRooms =
        [    
            File::files($Four_Season_dir),
            File::files($sheraton_dir),
            File::files($Albishr_dir),
            File::files($Elite_Plaza_dir),
            File::files($Naqaba_Hall_dir),
            File::files($beit_al_mokhtar_dir),
            File::files($mazaya_dir),
            File::files($serjella_dir),
            File::files($farms_subrooms_dir),
            File::files($centers_subrooms_dir),
        ];
        $subrooms_dir = ['hotels/Four_Season','hotels/sheraton','wedding_halls/Albishr','wedding_halls/Elite_Plaza',
        'wedding_halls/Naqaba_Hall','resturants/beit_al_mokhtar','resturants/mazaya','resturants/serjella','farms/farms_subrooms','centers/centers_subrooms'];
        
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

        //places seed
        // =================================================================================
        $index = 0;
        foreach($places as $Place)
        {
            $dir = $places_dir[$index++];
            foreach($Place as $place)
            {
                Media::create([
                    'media_url' => "http://127.0.0.1:8000/storage/places/$dir/" . $place->getFilename(),
                ]);
            }
        }
        // =================================================================================

        //subRooms seed
        // =================================================================================
        $index = 0;
        foreach($subRooms as $subRoom)
        {
            $dir = $subrooms_dir[$index++];
            foreach($subRoom as $subroom)
            {
                Media::create([
                    'media_url' => "http://127.0.0.1:8000/storage/places/$dir/" . $subroom->getFilename(),
                ]);
            }
        }
        // =================================================================================


        Media::factory()->count(300)->create();
        
    }
}
