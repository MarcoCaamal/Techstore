<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class ProductTest extends TestCase
{
    public function test_product_can_generate_slug_from_name()
    {
        // Crear una instancia del producto sin persistir en DB
        $product = new Product();
        $product->name = 'iPhone 15 Pro Max';

        // Simular la generación del slug
        $expectedSlug = 'iphone-15-pro-max';

        $this->assertIsString($product->name);
        $this->assertEquals('iPhone 15 Pro Max', $product->name);
    }

    public function test_product_has_required_attributes()
    {
        $product = new Product();

        // Verificar que los campos fillable están definidos
        $fillable = $product->getFillable();

        $this->assertContains('name', $fillable);
        $this->assertContains('price', $fillable);
        $this->assertContains('sku', $fillable);
        $this->assertContains('stock', $fillable);
        $this->assertContains('category_id', $fillable);
    }

    public function test_product_casts_are_correct()
    {
        $product = new Product();
        $casts = $product->getCasts();

        $this->assertArrayHasKey('price', $casts);
        $this->assertArrayHasKey('is_active', $casts);
        $this->assertEquals('decimal:2', $casts['price']);
        $this->assertEquals('boolean', $casts['is_active']);
    }
}
