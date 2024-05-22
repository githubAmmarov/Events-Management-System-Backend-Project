<?php

namespace Database\Seeders;

use App\Models\EventType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $Types=['wedding','funeral','birthday','feast','effectiveness','lecture'];
        foreach($Types as $Type)
        {
            EventType::create(['type'=>$Type]);
        }
    }
}
