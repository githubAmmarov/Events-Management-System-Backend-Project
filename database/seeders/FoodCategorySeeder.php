<?php

namespace Database\Seeders;

use App\Models\FoodCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoodCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $categories=[
            'Dessert',
            'appetizers',
            'Eastern sweets',
            'drinks',
            ];
        foreach($categories as $category)
        {
            FoodCategory::create(['category'=>$category]);
        }
    }
}
