<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Smartphones',
                'description' => 'Dispositivos móviles inteligentes',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Laptops',
                'description' => 'Computadoras portátiles',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Tablets',
                'description' => 'Tabletas digitales',
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Accesorios',
                'description' => 'Accesorios tecnológicos',
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'name' => 'Gaming',
                'description' => 'Productos para videojuegos',
                'is_active' => true,
                'sort_order' => 5,
            ],
            [
                'name' => 'Audio',
                'description' => 'Dispositivos de audio',
                'is_active' => true,
                'sort_order' => 6,
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        // Crear subcategorías
        $smartphones = Category::where('name', 'Smartphones')->first();
        if ($smartphones) {
            Category::create([
                'name' => 'iPhone',
                'description' => 'Smartphones Apple',
                'parent_id' => $smartphones->id,
                'is_active' => true,
                'sort_order' => 1,
            ]);

            Category::create([
                'name' => 'Samsung',
                'description' => 'Smartphones Samsung',
                'parent_id' => $smartphones->id,
                'is_active' => true,
                'sort_order' => 2,
            ]);
        }

        $laptops = Category::where('name', 'Laptops')->first();
        if ($laptops) {
            Category::create([
                'name' => 'MacBook',
                'description' => 'Laptops Apple',
                'parent_id' => $laptops->id,
                'is_active' => true,
                'sort_order' => 1,
            ]);

            Category::create([
                'name' => 'Gaming Laptops',
                'description' => 'Laptops para gaming',
                'parent_id' => $laptops->id,
                'is_active' => true,
                'sort_order' => 2,
            ]);
        }
    }
}
