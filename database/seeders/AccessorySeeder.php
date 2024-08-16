<?php

namespace Database\Seeders;

use App\Models\Accessory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccessorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $media_id = 31;

        $flower_names =['Flower Crown','Corsage','Boutonniere','Flower Garland','Posy Bouquet','Flower Ring','Floral Headband','Floral Brooch'];
        $baloon_names =['Arch','Garland','Bouquet','Stand','Weights','Tassels'];
        $car_names =['Limozin','Volkswagen','Limozin2','Toyota','Limozin3','Mercedes','Lamborghini','audi'];
        $show_band_names =['Yaeal Band','lolo show','Saif Alharamain Band','Ameen sirk','Ezz Al_midan Band','Bab Alhara Band','Alturath Band'];
        $music_and_chanting_names =['Mohammad Burnia','Nassif Zaytoun','Abo Shaar','Mansour Zouayter'];
        $quran_names =['Ahmad Rateb Soubhi Allawi','Mahmoud Alhammoud'];

        foreach($flower_names as $flower_name)
        {
            Accessory::create([
                'accessory_type_id' => 1,
                'media_id' => $media_id++,
                'name' => $flower_name,
                'price' => 15,
            ]);
        }
        foreach($baloon_names as $baloon_name)
        {
            Accessory::create([
                'accessory_type_id' => 2,
                'media_id' => $media_id++,
                'name' => $baloon_name,
                'price' => 8,
            ]);
        }
        foreach($car_names as $car_name)
        {
            Accessory::create([
                'accessory_type_id' => 3,
                'media_id' => $media_id++,
                'name' => $car_name,
                'price' => 25,
            ]);
        }
        foreach($show_band_names as $show_band_name)
        {
            Accessory::create([
                'accessory_type_id' => 4,
                'media_id' => $media_id++,
                'name' => $show_band_name,
                'price' => 30,
            ]);
        }
        foreach($music_and_chanting_names as $music_and_chanting_name)
        {
            Accessory::create([
                'accessory_type_id' => 5,
                'media_id' => $media_id++,
                'name' => $music_and_chanting_name,
                'price' => 40,
            ]);
        }
        foreach($quran_names as $quran_name)
        {
            Accessory::create([
                'accessory_type_id' => 6,
                'media_id' => $media_id++,
                'name' => $quran_name,
                'price' => 35,
            ]);
        }
    }
}
