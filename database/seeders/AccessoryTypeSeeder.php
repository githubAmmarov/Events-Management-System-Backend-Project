<?php

namespace Database\Seeders;

use App\Models\AccessoryType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccessoryTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $types=[
            'Flowers',
            'Baloones',
            'Lights',
        ];
        foreach($types as $type)
        {
            AccessoryType::create(['type'=>$type]);
        }
    }
}
