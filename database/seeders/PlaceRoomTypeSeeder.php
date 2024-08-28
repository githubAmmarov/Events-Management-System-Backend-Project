<?php

namespace Database\Seeders;

use App\Models\PlaceRoomType;
use App\Models\PlaceType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlaceRoomTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $types=[
            'Hotels',
            'Wedding Halls',
            'Resturants',
            'Farms',
            'Centers',
            // 'Wedding Halls in Hotel',
            // 'Resturants in Hotel',
            // 'Centers in Hotel',
        ];
        foreach($types as $type)
        {
            PlaceType::create(['name'=>$type]);
        }
    }
}
