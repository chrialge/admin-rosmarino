<?php

namespace Database\Seeders;

use App\Models\Dish;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menu = [
            [
                'name' => 'Gnocchi',
                'typology' => 'primo',
                'price' =>  '12.34'
            ],
            [
                'name' => 'Pizza',
                'typology' => 'secondo',
                'price' =>  '12.34'
            ],
            [
                'name' => 'Antipasto Freddo',
                'typology' => 'antipasto',
                'price' =>  '12.34'
            ],
            [
                'name' => 'Mascarpone',
                'typology' => 'dessert',
                'price' =>  '12.34'
            ],
            [
                'name' => 'tagliatelle',
                'typology' => 'primo',
                'price' =>  '12.34'
            ],
            [
                'name' => 'grigliata',
                'typology' => 'secondo',
                'price' =>  '12.34'
            ],
            [
                'name' => 'acqua',
                'typology' => 'bevande',
                'price' =>  '12.34'
            ],
        ];


        foreach ($menu as $dish) {
            $newDish = new Dish();
            $newDish->name = $dish['name'];
            $newDish->slug = Str::slug($dish['name'], '-');
            $newDish->typology = $dish['typology'];
            $newDish->price = $dish['price'];
            $newDish->save();
        }
    }
}
