<?php

namespace Database\Seeders;

use App\Models\Place;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $media_id = 69;

        $hotels =['Four Season','Sheraton'];
        $wedding_halls =['AlBishr','Elite Plaza','Naqaba Hall'];
        $resturants =['Beit AlMokhtar','Mazaya','Serjella'];
        $farms =['Majzoub Farms','Azmah Farms','Autrolla Farms','Vamos Farms'];
        $centers =['Cultural Adawi Center','Cultural Midan Center'];

        foreach($hotels as $hotel)
        {
            Place::create([
                'place_type_id' => 1,
                'name' => $hotel,
                'phone_number' => "0988762341",
                'address' => 'Syria\Damascus',
                'media_id' => $media_id++,
            ]);
        }
        foreach($wedding_halls as $wedding_hall)
        {
            Place::create([
                'place_type_id' => 2,
                'name' => $wedding_hall,
                'phone_number' => "0988762341",
                'address' => 'Syria\Damascus',
                'media_id' => $media_id++,
            ]);
        }
        foreach($resturants as $resturant)
        {
            Place::create([
                'place_type_id' => 3,
                'name' => $resturant,
                'phone_number' => "0988762341",
                'address' => 'Syria\Damascus',
                'media_id' => $media_id++,
            ]);
        }
        foreach($farms as $farm)
        {
            Place::create([
                'place_type_id' => 4,
                'name' => $farm,
                'phone_number' => "0988762341",
                'address' => 'Syria\Damascus',
                'media_id' => $media_id++,
            ]);
        }
        foreach($centers as $center)
        {
            Place::create([
                'place_type_id' => 5,
                'name' => $center,
                'phone_number' => "0988762341",
                'address' => 'Syria\Damascus',
                'media_id' => $media_id++,
            ]);
        }
        // Place::factory(100)->create();
    }
}
