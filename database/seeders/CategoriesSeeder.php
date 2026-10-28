<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    public $categories = [
        'Elettronica',
        'Abbigliamento',
        'Salute e bellezza',
        'Casa e Giardinaggio',
        'Giocattoli',
        'Sport',
        'Animali domestici',
        'Libri e Riviste',
        'Accessori',
        'Motori e Veicoli',
    ];

    public function run(): void
    {
        foreach ($this->categories as $category) {
            Category::firstOrCreate(['name' => $category]);
        }
    }
}
