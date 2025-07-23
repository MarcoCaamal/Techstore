<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Auth\Role;

class ProductCrudTest extends TestCase
{
    use RefreshDatabase;

    protected $adminUser;
    protected $category;
    protected $brand;

    protected function setUp(): void
    {
        parent::setUp();

        // Crear datos básicos manualmente
        $this->adminUser = User::create([
            'name' => 'Admin',
            'lastname' => 'Test',
            'username' => 'admintest',
            'email' => 'admin@test.com',
            'password' => bcrypt('password')
        ]);

        Role::create(['name' => 'admin']);
        $this->adminRole = Role::where('name', 'admin')->first();
        $this->adminUser->roles()->attach($this->adminRole->id);

        $this->category = Category::create([
            'name' => 'Test Category',
            'slug' => 'test-category'
        ]);

        $this->brand = Brand::create([
            'name' => 'Test Brand'
        ]);
    }

    public function test_admin_can_view_products_index()
    {
        $response = $this->actingAs($this->adminUser)
            ->get('/admin/products');

        $response->assertStatus(200);
        $response->assertSee('Lista de Productos');
    }

    public function test_admin_can_view_create_product_form()
    {
        $response = $this->actingAs($this->adminUser)
            ->get('/admin/products/create');

        $response->assertStatus(200);
        $response->assertSee('Crear Producto');
    }

    public function test_admin_can_create_product()
    {
        $productData = [
            'name' => 'iPhone 15 Test',
            'description' => 'Producto de prueba',
            'price' => 999.99,
            'sku' => 'TEST-001',
            'stock' => 10,
            'category_id' => $this->category->id,
            'brand_id' => $this->brand->id,
            'is_active' => true,
        ];

        $response = $this->actingAs($this->adminUser)
            ->post('/admin/products', $productData);

        $response->assertRedirect('/admin/products');
        $this->assertDatabaseHas('products', [
            'name' => 'iPhone 15 Test',
            'sku' => 'TEST-001',
        ]);
    }

    public function test_product_creation_requires_validation()
    {
        $response = $this->actingAs($this->adminUser)
            ->post('/admin/products', []);

        $response->assertSessionHasErrors(['name', 'price', 'sku', 'stock', 'category_id']);
    }

    public function test_admin_can_view_product_details()
    {
        $product = Product::create([
            'name' => 'Test Product',
            'description' => 'Test description',
            'price' => 99.99,
            'sku' => 'TEST-DETAIL-001',
            'stock' => 5,
            'category_id' => $this->category->id,
            'brand_id' => $this->brand->id,
            'is_active' => true,
            'slug' => 'test-product-detail'
        ]);

        $response = $this->actingAs($this->adminUser)
            ->get('/admin/products/' . $product->id);

        $response->assertStatus(200);
        $response->assertSee($product->name);
    }

    public function test_admin_can_delete_product()
    {
        $product = Product::create([
            'name' => 'Test Product Delete',
            'description' => 'Test description',
            'price' => 99.99,
            'sku' => 'TEST-DELETE-001',
            'stock' => 5,
            'category_id' => $this->category->id,
            'brand_id' => $this->brand->id,
            'is_active' => true,
            'slug' => 'test-product-delete'
        ]);

        $response = $this->actingAs($this->adminUser)
            ->delete('/admin/products/' . $product->id);

        $response->assertRedirect('/admin/products');
        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }

    public function test_guest_cannot_access_admin_products()
    {
        $response = $this->get('/admin/products');

        // Debería redirigir al login o mostrar 403
        $this->assertTrue(
            $response->status() === 302 || $response->status() === 403
        );
    }
}
