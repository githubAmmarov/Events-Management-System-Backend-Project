<?php

namespace Database\Seeders;

use App\Models\PlaceRoomType;
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
            'Wedding Halls',
            'Hotels',
            'Resturants',
            'Natural Places',
            'Centers',
            'Farms',
            'Wedding Halls in Hotel',
            'Resturants in Hotel',
            'Centers in Hotel',
        ];
        foreach($types as $type)
        {
            PlaceRoomType::create(['name'=>$type]);
        }
    }
}
