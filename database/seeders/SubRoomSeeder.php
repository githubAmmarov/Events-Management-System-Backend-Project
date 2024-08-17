<?php

namespace Database\Seeders;

use App\Models\SubRoom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $media_id = 83;

        $Four_Season =['Brite terrace cafe','XObar Resturant','Luxury lounge','Pool'];
        $sheraton =['Pool','Cafe','Resturant', 'Hall'];
        $Albishr =['Royal Hall','Lailaty Hall','Angle Hall'];
        $Elite_Plaza =['Malak Hall','Royal Sultan','Details'];
        $Naqaba_Hall =['Elite Plaza','AlBisr','Naqaba Hall'];
        $beit_al_mokhtar =['Midan Branch','Shahbandar Branch'];
        $mazaya =['Details'];
        $serjella =['Bab Touma Branch','Qimriya Branch'];
        
        foreach($Four_Season as $Four_Seaso)
        {
            SubRoom::create([
                'place_id' => 1,
                'media_id' => $media_id++,
                'capacity' => 250,
                'name' => $Four_Seaso,
                'cost' => 1000,
            ]);
        }
        foreach($sheraton as $sherato)
        {
            SubRoom::create([
                'place_id' => 2,
                'media_id' => $media_id++,
                'capacity' => 250,
                'name' => $sherato,
                'cost' => 1500,
            ]);
        }
        foreach($Albishr as $Albish)
        {
            SubRoom::create([
                'place_id' => 3,
                'media_id' => $media_id++,
                'capacity' => 150,
                'name' => $Albish,
                'cost' => 700,
            ]);
        }
        foreach($Elite_Plaza as $Elite_Plaz)
        {
            SubRoom::create([
                'place_id' => 4,
                'media_id' => $media_id++,
                'capacity' => 200,
                'name' => $Elite_Plaz,
                'cost' => 800,
            ]);
        }
        foreach($Naqaba_Hall as $Naqaba_Hal)
        {
            SubRoom::create([
                'place_id' => 5,
                'media_id' => $media_id++,
                'capacity' => 120,
                'name' => $Naqaba_Hal,
                'cost' => 600,
            ]);
        }
        foreach($beit_al_mokhtar as $beit_al_mokhta)
        {
            SubRoom::create([
                'place_id' => 6,
                'media_id' => $media_id++,
                'capacity' => 60,
                'name' => $beit_al_mokhta,
                'cost' => 300,
            ]);
        }
        foreach($mazaya as $mazay)
        {
            SubRoom::create([
                'place_id' => 7,
                'media_id' => $media_id++,
                'capacity' => 50,
                'name' => $mazay,
                'cost' => 100,
            ]);
        }
        foreach($serjella as $serjell)
        {
            SubRoom::create([
                'place_id' => 8,
                'media_id' => $media_id++,
                'capacity' => 50,
                'name' => $serjell,
                'cost' => 120,
            ]);
        }
        
            SubRoom::create([
                'place_id' => 9,
                'media_id' => $media_id++,
                'capacity' => 20,
                'name' => "Details",
                'cost' => 50,
            ]);
        
            SubRoom::create([
                'place_id' => 10,
                'media_id' => $media_id++,
                'capacity' => 25,
                'name' => 'Details',
                'cost' => 60,
            ]);
            SubRoom::create([
                'place_id' => 11,
                'media_id' => $media_id++,
                'capacity' => 15,
                'name' => 'Details',
                'cost' => 30,
            ]);
            SubRoom::create([
                'place_id' => 12,
                'media_id' => $media_id++,
                'capacity' => 30,
                'name' => 'Details',
                'cost' => 40,
            ]);
            SubRoom::create([
                'place_id' => 13,
                'media_id' => $media_id++,
                'capacity' => 40,
                'name' => 'Details',
                'cost' => 20,
            ]);
            SubRoom::create([
                'place_id' => 14,
                'media_id' => $media_id,
                'capacity' => 50,
                'name' => 'Details',
                'cost' => 20,
            ]);
        

        // SubRoom::factory(100)->create();
    }
}
