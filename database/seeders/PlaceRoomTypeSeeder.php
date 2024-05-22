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
            'Hotel',
            'Resturant',
            'Hall',
            'Center',
        ];
        foreach($types as $type)
        {
            PlaceRoomType::create(['name'=>$type]);
        }
    }
}
