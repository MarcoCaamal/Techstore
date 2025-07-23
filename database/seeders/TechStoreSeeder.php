<?php

namespace Database\Seeders;

use App\Models\Auth\Permission;
use App\Models\Auth\Role;
use App\Models\User;
use App\Models\Category;
use App\Models\Address;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TechStoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create sample users first
        $users = [
            [
                'name' => 'Customer',
                'lastname' => 'Test',
                'username' => 'customer1',
                'email' => 'customer1@techstore.com',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
                'phone' => '+52-555-1234567',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Customer',
                'lastname' => 'Two',
                'username' => 'customer2',
                'email' => 'customer2@techstore.com',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
                'phone' => '+52-555-7654321',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($users as $user) {
            DB::table('users')->insert($user);
        }

        // Create addresses
        $addresses = [
            [
                'street' => '123 Main St',
                'city' => 'Mexico City',
                'state' => 'CDMX',
                'postal_code' => '01000',
                'country' => 'Mexico',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'street' => '456 Tech Ave',
                'city' => 'Guadalajara',
                'state' => 'Jalisco',
                'postal_code' => '44100',
                'country' => 'Mexico',
                'user_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('addresses')->insert($addresses);

        // Create brands
        $brands = [
            ['name' => 'Intel', 'description' => 'Processor and technology manufacturer'],
            ['name' => 'AMD', 'description' => 'Advanced Micro Devices'],
            ['name' => 'NVIDIA', 'description' => 'Graphics processing units'],
            ['name' => 'ASUS', 'description' => 'Computer hardware and electronics'],
            ['name' => 'MSI', 'description' => 'Micro-Star International'],
            ['name' => 'Corsair', 'description' => 'Gaming peripherals and components'],
            ['name' => 'Kingston', 'description' => 'Memory and storage solutions'],
            ['name' => 'Seagate', 'description' => 'Data storage solutions'],
            ['name' => 'Western Digital', 'description' => 'Data storage company'],
            ['name' => 'Logitech', 'description' => 'Computer peripherals'],
        ];

        foreach ($brands as $brand) {
            DB::table('brands')->insert(array_merge($brand, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }

        // Update categories with better descriptions
        $categories = [
            ['name' => 'Processors', 'slug' => 'processors', 'description' => 'CPUs and processors'],
            ['name' => 'Graphics Cards', 'slug' => 'graphics-cards', 'description' => 'GPUs and video cards'],
            ['name' => 'Memory', 'slug' => 'memory', 'description' => 'RAM and memory modules'],
            ['name' => 'Storage', 'slug' => 'storage', 'description' => 'SSDs, HDDs, and storage devices'],
            ['name' => 'Motherboards', 'slug' => 'motherboards', 'description' => 'Motherboards and mainboards'],
            ['name' => 'Power Supplies', 'slug' => 'power-supplies', 'description' => 'PSUs and power units'],
            ['name' => 'Cases', 'slug' => 'cases', 'description' => 'PC cases and enclosures'],
            ['name' => 'Cooling', 'slug' => 'cooling', 'description' => 'Fans, coolers, and thermal solutions'],
            ['name' => 'Peripherals', 'slug' => 'peripherals', 'description' => 'Keyboards, mice, and accessories'],
            ['name' => 'Laptops', 'slug' => 'laptops', 'description' => 'Gaming and professional laptops'],
        ];

        // Clear existing categories and insert new ones
        DB::table('categories')->truncate();
        foreach ($categories as $category) {
            DB::table('categories')->insert(array_merge($category, [
                'is_active' => true,
                'sort_order' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }

        // Create sample products
        $products = [
            [
                'name' => 'Intel Core i7-13700K',
                'description' => 'High-performance desktop processor with 16 cores',
                'price' => 12999.99,
                'stock' => 25,
                'brand_id' => 1, // Intel
                'category_id' => 1, // Processors
                'sku' => 'INT-I7-13700K',
                'weight' => 0.2,
                'dimensions' => '45mm x 45mm x 7mm',
            ],
            [
                'name' => 'AMD Ryzen 7 7700X',
                'description' => '8-core, 16-thread desktop processor',
                'price' => 10999.99,
                'stock' => 30,
                'brand_id' => 2, // AMD
                'category_id' => 1, // Processors
                'sku' => 'AMD-R7-7700X',
                'weight' => 0.15,
                'dimensions' => '40mm x 40mm x 7mm',
            ],
            [
                'name' => 'NVIDIA GeForce RTX 4070',
                'description' => 'High-performance graphics card for gaming and content creation',
                'price' => 25999.99,
                'stock' => 15,
                'brand_id' => 3, // NVIDIA
                'category_id' => 2, // Graphics Cards
                'sku' => 'NV-RTX-4070',
                'weight' => 1.5,
                'dimensions' => '304mm x 137mm x 61mm',
            ],
            [
                'name' => 'Corsair Vengeance LPX 32GB DDR4',
                'description' => '32GB (2x16GB) DDR4-3200 Memory Kit',
                'price' => 3999.99,
                'stock' => 50,
                'brand_id' => 6, // Corsair
                'category_id' => 3, // Memory
                'sku' => 'COR-VEN-32GB',
                'weight' => 0.3,
                'dimensions' => '133.35mm x 31mm x 6.2mm',
            ],
            [
                'name' => 'Samsung 980 PRO 1TB NVMe SSD',
                'description' => '1TB NVMe M.2 Internal SSD with excellent performance',
                'price' => 4999.99,
                'stock' => 40,
                'brand_id' => 7, // Using Kingston ID for Samsung
                'category_id' => 4, // Storage
                'sku' => 'SAM-980-1TB',
                'weight' => 0.008,
                'dimensions' => '80mm x 22mm x 2.38mm',
            ],
        ];

        foreach ($products as $product) {
            DB::table('products')->insert(array_merge($product, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }

        // Create product features
        $productFeatures = [
            // Intel i7-13700K features
            ['product_id' => 1, 'key' => 'cores', 'value' => '16'],
            ['product_id' => 1, 'key' => 'threads', 'value' => '24'],
            ['product_id' => 1, 'key' => 'base_clock', 'value' => '3.4 GHz'],
            ['product_id' => 1, 'key' => 'boost_clock', 'value' => '5.4 GHz'],
            ['product_id' => 1, 'key' => 'socket', 'value' => 'LGA1700'],

            // AMD Ryzen 7 7700X features
            ['product_id' => 2, 'key' => 'cores', 'value' => '8'],
            ['product_id' => 2, 'key' => 'threads', 'value' => '16'],
            ['product_id' => 2, 'key' => 'base_clock', 'value' => '4.5 GHz'],
            ['product_id' => 2, 'key' => 'boost_clock', 'value' => '5.4 GHz'],
            ['product_id' => 2, 'key' => 'socket', 'value' => 'AM5'],

            // RTX 4070 features
            ['product_id' => 3, 'key' => 'memory', 'value' => '12GB GDDR6X'],
            ['product_id' => 3, 'key' => 'memory_bus', 'value' => '192-bit'],
            ['product_id' => 3, 'key' => 'base_clock', 'value' => '1920 MHz'],
            ['product_id' => 3, 'key' => 'boost_clock', 'value' => '2475 MHz'],
            ['product_id' => 3, 'key' => 'interface', 'value' => 'PCIe 4.0 x16'],

            // Corsair Memory features
            ['product_id' => 4, 'key' => 'capacity', 'value' => '32GB'],
            ['product_id' => 4, 'key' => 'speed', 'value' => 'DDR4-3200'],
            ['product_id' => 4, 'key' => 'modules', 'value' => '2x16GB'],
            ['product_id' => 4, 'key' => 'latency', 'value' => 'CL16'],

            // Samsung SSD features
            ['product_id' => 5, 'key' => 'capacity', 'value' => '1TB'],
            ['product_id' => 5, 'key' => 'interface', 'value' => 'NVMe M.2'],
            ['product_id' => 5, 'key' => 'read_speed', 'value' => '7000 MB/s'],
            ['product_id' => 5, 'key' => 'write_speed', 'value' => '5000 MB/s'],
        ];

        foreach ($productFeatures as $feature) {
            DB::table('product_features')->insert(array_merge($feature, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }

        // Create coupons
        $coupons = [
            [
                'code' => 'WELCOME10',
                'name' => 'Welcome Discount',
                'description' => '10% off for new customers',
                'type' => 'percentage',
                'value' => 10.00,
                'minimum_amount' => 1000.00,
                'usage_limit' => 100,
                'is_active' => true,
                'starts_at' => now(),
                'expires_at' => now()->addMonths(3),
            ],
            [
                'code' => 'SAVE500',
                'name' => 'Fixed Discount',
                'description' => '$500 off orders over $5000',
                'type' => 'fixed_amount',
                'value' => 500.00,
                'minimum_amount' => 5000.00,
                'usage_limit' => 50,
                'is_active' => true,
                'starts_at' => now(),
                'expires_at' => now()->addMonths(1),
            ],
        ];

        foreach ($coupons as $coupon) {
            DB::table('coupons')->insert(array_merge($coupon, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }

        $this->command->info('TechStore sample data seeded successfully!');
    }
}
