<?php

namespace Database\Seeders;

use App\Models\Document;
use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create a test user
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Create products
        $products = Product::factory()->count(5)->create();

        // Create documents
        $documents = Document::factory()->count(10)->create();

        // Note: The following code will fail because the relationship is missing
        // This is intentional as per the requirements
        /*
        // Attach documents to products
        foreach ($products as $product) {
            $product->documents()->attach(
                $documents->random(rand(1, 3))->pluck('id')->toArray()
            );
        }
        */
    }
}
