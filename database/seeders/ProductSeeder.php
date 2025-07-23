<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductFeature;
use App\Models\ProductImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener categorías y marcas
        $smartphoneCategory = Category::where('name', 'Smartphones')->first();
        $laptopCategory = Category::where('name', 'Laptops')->first();
        $tabletCategory = Category::where('name', 'Tablets')->first();

        $appleBrand = Brand::where('name', 'Apple')->first();
        $samsungBrand = Brand::where('name', 'Samsung')->first();
        $sonyBrand = Brand::where('name', 'Sony')->first();

        // Productos de ejemplo
        $products = [
            [
                'name' => 'iPhone 15 Pro',
                'description' => 'El último iPhone con tecnología avanzada y chip A17 Pro. Cuenta con triple cámara de 48MP, pantalla Super Retina XDR de 6.1" y construcción en titanio.',
                'sku' => 'IPHONE15PRO128',
                'price' => 999.99,
                'stock' => 50,
                'category_id' => $smartphoneCategory?->id,
                'brand_id' => $appleBrand?->id,
                'is_active' => true,
                'weight' => 0.187,
                'dimensions' => '146.6 x 70.6 x 7.65 mm',
            ],
            [
                'name' => 'Samsung Galaxy S24 Ultra',
                'description' => 'Smartphone Samsung con S Pen incluido, cámara de 200MP, pantalla Dynamic AMOLED 2X de 6.8" y procesador Snapdragon 8 Gen 3.',
                'sku' => 'GALAXYS24ULTRA256',
                'price' => 1199.99,
                'stock' => 30,
                'category_id' => $smartphoneCategory?->id,
                'brand_id' => $samsungBrand?->id,
                'is_active' => true,
                'weight' => 0.232,
                'dimensions' => '162.3 x 79.0 x 8.6 mm',
            ],
            [
                'name' => 'MacBook Pro 14"',
                'description' => 'Laptop profesional con chip M3 Pro, 18GB de RAM, 512GB SSD, pantalla Liquid Retina XDR de 14.2" y hasta 18 horas de batería.',
                'sku' => 'MBP14M3PRO512',
                'price' => 1999.99,
                'stock' => 25,
                'category_id' => $laptopCategory?->id,
                'brand_id' => $appleBrand?->id,
                'is_active' => true,
                'weight' => 1.6,
                'dimensions' => '31.26 x 22.12 x 1.55 cm',
            ],
            [
                'name' => 'iPad Air 5ta Gen',
                'description' => 'Tablet iPad Air con chip M1, pantalla Liquid Retina de 10.9", compatible con Apple Pencil y Magic Keyboard.',
                'sku' => 'IPADAIR5M1256',
                'price' => 599.99,
                'stock' => 40,
                'category_id' => $tabletCategory?->id,
                'brand_id' => $appleBrand?->id,
                'is_active' => true,
                'weight' => 0.461,
                'dimensions' => '24.76 x 17.85 x 0.61 cm',
            ],
            [
                'name' => 'Sony WH-1000XM5',
                'description' => 'Auriculares inalámbricos con cancelación de ruido líder en la industria, hasta 30 horas de batería y sonido Hi-Res Audio.',
                'sku' => 'SONYWH1000XM5',
                'price' => 399.99,
                'stock' => 60,
                'category_id' => Category::where('name', 'Accesorios')->first()?->id,
                'brand_id' => $sonyBrand?->id,
                'is_active' => true,
                'weight' => 0.250,
                'dimensions' => '26.4 x 19.4 x 8.0 cm',
            ],
        ];

        foreach ($products as $productData) {
            $product = Product::create($productData);

            // Agregar características para cada producto
            if ($product->name === 'iPhone 15 Pro') {
                ProductFeature::create([
                    'product_id' => $product->id,
                    'key' => 'processor',
                    'value' => 'A17 Pro',
                ]);
                ProductFeature::create([
                    'product_id' => $product->id,
                    'key' => 'storage',
                    'value' => '128GB',
                ]);
                ProductFeature::create([
                    'product_id' => $product->id,
                    'key' => 'camera',
                    'value' => 'Triple cámara 48MP',
                ]);
            }

            if ($product->name === 'MacBook Pro 14"') {
                ProductFeature::create([
                    'product_id' => $product->id,
                    'key' => 'processor',
                    'value' => 'Apple M3 Pro',
                ]);
                ProductFeature::create([
                    'product_id' => $product->id,
                    'key' => 'ram',
                    'value' => '18GB',
                ]);
                ProductFeature::create([
                    'product_id' => $product->id,
                    'key' => 'storage',
                    'value' => '512GB SSD',
                ]);
            }

            // Agregar imágenes de ejemplo
            ProductImage::create([
                'product_id' => $product->id,
                'url' => 'products/' . strtolower(str_replace(' ', '-', $product->name)) . '-1.jpg',
                'alt_text' => $product->name . ' - Imagen principal',
                'is_primary' => true,
                'sort_order' => 1,
            ]);

            ProductImage::create([
                'product_id' => $product->id,
                'url' => 'products/' . strtolower(str_replace(' ', '-', $product->name)) . '-2.jpg',
                'alt_text' => $product->name . ' - Vista lateral',
                'is_primary' => false,
                'sort_order' => 2,
            ]);
        }
    }
}
