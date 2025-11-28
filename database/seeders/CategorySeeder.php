<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $categories = [
            ['name' => 'Ficción', 'description' => 'Narrativa, novelas y cuentos'],
            ['name' => 'No ficción', 'description' => 'Ensayos, biografías, divulgación'],
            ['name' => 'Tecnología', 'description' => 'Programación, software, hardware'],
            ['name' => 'Educación', 'description' => 'Material académico y de estudio'],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(['name' => $category['name']], $category);
        }
    }
}
