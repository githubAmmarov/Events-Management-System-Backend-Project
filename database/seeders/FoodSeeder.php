<?php

namespace Database\Seeders;

use App\Models\Food;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $media_id = 1;
        $dessert_names =['Tiramisu','Cheesecake','Crème Brûlée','Chocolate Mousse','Panna Cotta','Macarons'];
        $appetizer_names =['Bruschetta','Stuffed Mushrooms','Spring Rolls','Caprese Salad','Deviled Eggs'];
        $cake_names =['Red Velvet Cake','Black Forest Cake','Carrot Cake','Chocolate Lava Cake','Lemon Drizzle Cake','Cheesecake','Angel Food Cake','Pound Cake'];
        $drink_names =['Mojito','Margarita','Piña Colada','Iced Tea','Lemonade','Sangria'];

        foreach($dessert_names as $dessert_name)
        {
            Food::create([
                'food_category_id' => 1,
                'media_id' => $media_id++,
                'name' => $dessert_name,
                'price' => 15,
                'description' =>'delicious dessert'
            ]);
        }
        foreach($appetizer_names as $appetizer_name)
        {
            Food::create([
                'food_category_id' => 2,
                'media_id' => $media_id++,
                'name' => $appetizer_name,
                'price' => 20,
                'description' =>'delicious appetizer'
            ]);
        }
        foreach($cake_names as $cake_name)
        {
            Food::create([
                'food_category_id' => 3,
                'media_id' => $media_id++,
                'name' => $cake_name,
                'price' => 25,
                'description' =>'lovely cake'
            ]);
        }
        foreach($drink_names as $drink_name)
        {
            Food::create([
                'food_category_id' => 4,
                'media_id' => $media_id++,
                'name' => $drink_name,
                'price' => 7,
                'description' =>'fresh drink'
            ]);
        }
    }
}
