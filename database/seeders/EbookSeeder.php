<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ebook;
use App\Models\Category;

class EbookSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $items = [
            [
                'title' => 'Introducción a Laravel',
                'author' => 'Equipo Laravel',
                'synopsis' => 'Guía básica para iniciar con Laravel y PHP moderno.',
                'isbn' => 'ISBN-0001',
                'format' => 'PDF',
                'file_path' => 'https://example.com/ebooks/laravel.pdf',
                'published_year' => 2024,
                'category' => 'Tecnología',
            ],
            [
                'title' => 'Cuentos Cortos',
                'author' => 'Varios',
                'synopsis' => 'Colección de relatos breves.',
                'isbn' => 'ISBN-0002',
                'format' => 'EPUB',
                'file_path' => 'https://example.com/ebooks/cuentos.epub',
                'published_year' => 2023,
                'category' => 'Ficción',
            ],
        ];

        foreach ($items as $item) {
            $category = Category::firstOrCreate(
                ['name' => $item['category']],
                ['description' => $item['category']]
            );

            Ebook::create([
                'category_id' => $category->id,
                'title' => $item['title'],
                'author' => $item['author'],
                'synopsis' => $item['synopsis'],
                'isbn' => $item['isbn'],
                'format' => $item['format'],
                'file_path' => $item['file_path'],
                'published_year' => $item['published_year'],
                'is_active' => true,
            ]);
        }

        $categoryIds = Category::pluck('id');

        Ebook::factory(25)->state(function () use ($categoryIds) {
            return [
                'category_id' => $categoryIds->isNotEmpty()
                    ? $categoryIds->random()
                    : Category::factory(),
            ];
        })->create();
    }
}
