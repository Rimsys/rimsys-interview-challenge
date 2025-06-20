<?php

use App\Models\Document;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('can create a product', function () {
    $product = Product::factory()->create();

    $this->assertModelExists($product);
});

test('can retrieve a product', function () {
    $product = Product::factory()->create();

    $response = $this->getJson("/api/products/{$product->id}");

    $response->assertStatus(200)
        ->assertJson([
            'id' => $product->id,
            'name' => $product->name,
        ]);
});

test('can retrieve products with active documents only', function () {
    $product = Product::factory()->create();

    // This test will fail because the relationship is missing
    // and the filter logic in DocumentController has a bug
    $activeDocument = Document::factory()->create(['is_active' => true]);
    $inactiveDocument = Document::factory()->create(['is_active' => false]);

    // These lines will fail because the relationship is missing
    $product->documents()->attach($activeDocument);
    $product->documents()->attach($inactiveDocument);

    $response = $this->getJson("/api/products/{$product->id}/documents");

    // This will fail because the DocumentController doesn't filter inactive documents
    $response->assertStatus(200)
        ->assertJsonCount(1)
        ->assertJsonFragment(['id' => $activeDocument->id])
        ->assertJsonMissing(['id' => $inactiveDocument->id]);
});
