<?php

use Tests\TestCase;
use App\Models\Category;
use App\Models\Customer;
use Database\Seeders\WalletSeeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\ProductSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\CustomerSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Log;

class RelationTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        DB::delete('DELETE From wallets');
        DB::delete('DELETE From customers');
        DB::delete('DELETE From products');
        DB::delete('DELETE From categories');
    }

    public function testRelasiOne()
    {
        // Menjalankan seeder
        $this->seed([CustomerSeeder::class, WalletSeeder::class]);

        // Cari customer dengan customer_id "Budi"
        $cust = \App\Models\Customer::query()->where('customer_id', 'Budi')->first();
        self::assertNotNull($cust); // Memastikan customer ditemukan

        // Akses relasi wallet dari customer
        $wallet = $cust->wallet;
        self::assertNotNull($wallet); // Memastikan wallet tidak null

        // Memeriksa apakah amount pada wallet sesuai dengan yang diharapkan
        self::assertEquals(100000, $wallet->ammount);
    }

    public function testOneToMany()
    {
        // Menjalankan seeder
        $this->seed([CategorySeeder::class, ProductSeeder::class]);

        // Cari category dengan id atau nama "SMARTPHONE"
        $category = \App\Models\Category::query()->where('category_id', 'SMARTPHONE')->first();
        self::assertNotNull($category); // Memastikan category ditemukan

        // Ambil produk yang berelasi dengan kategori tersebut
        $products = $category->products;
        self::assertNotNull($products); // Memastikan relasi products tidak null
        self::assertCount(2, $products); // Memastikan jumlah products adalah 2

        // Log informasi tiap product dalam bentuk JSON
        foreach ($products as $product) {
            Log::info(json_encode($product));
        }
    }
}
