<?php

namespace Database\Seeders;

use App\Models\InvitationCardStyle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InvitationCardStyleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $media_id = 26;
        $style_names =['Vintage Elegance','Modern Minimalist','Rustic Charm','Watercolor Floral','Botanical Garden'];
        foreach($style_names as $style_name)
        {
            InvitationCardStyle::create([
                'media_id' => $media_id++,
                'style' => $style_name,
            ]);
        }
    }
}
