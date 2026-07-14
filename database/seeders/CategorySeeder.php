<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $categories = [
            'Informatica e Telefonia',
            'Abbigliamento e Accessori',
            'Libri, Fumetti e Riviste',
            'Strumenti Musicali',
            'Sport e Tempo Libero',
            'Biciclette e Monopattini',
            'Arredamento e Casa',
            'Elettrodomestici e Cucina',
            'Cinema e Musica',
            'Collezionismo e Antiquariato'
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category
            ]);
        }
    }
}
