<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            [
                'name' => 'Apple',
                'description' => 'Tecnología innovadora de Apple Inc.',
                'logo_url' => 'brands/apple-logo.png',
            ],
            [
                'name' => 'Samsung',
                'description' => 'Electrónicos Samsung',
                'logo_url' => 'brands/samsung-logo.png',
            ],
            [
                'name' => 'Sony',
                'description' => 'Entretenimiento y tecnología Sony',
                'logo_url' => 'brands/sony-logo.png',
            ],
            [
                'name' => 'Microsoft',
                'description' => 'Tecnología Microsoft',
                'logo_url' => 'brands/microsoft-logo.png',
            ],
            [
                'name' => 'Google',
                'description' => 'Productos Google',
                'logo_url' => 'brands/google-logo.png',
            ],
            [
                'name' => 'HP',
                'description' => 'Hewlett-Packard',
                'logo_url' => 'brands/hp-logo.png',
            ],
            [
                'name' => 'Dell',
                'description' => 'Computadoras Dell',
                'logo_url' => 'brands/dell-logo.png',
            ],
            [
                'name' => 'Lenovo',
                'description' => 'Tecnología Lenovo',
                'logo_url' => 'brands/lenovo-logo.png',
            ],
        ];

        foreach ($brands as $brand) {
            Brand::create($brand);
        }
    }
}
