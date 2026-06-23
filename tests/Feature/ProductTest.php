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

test('can retrieve active documents for a product', function () {
    $product = Product::factory()->create();

    $activeDocument = Document::factory()->create(['is_active' => true]);
    $inactiveDocument = Document::factory()->create(['is_active' => false]);

    $product->documents()->attach($activeDocument);
    $product->documents()->attach($inactiveDocument);

    $response = $this->getJson("/api/products/{$product->id}/documents");

    $response->assertStatus(200)
        ->assertJsonCount(1)
        ->assertJsonFragment(['id' => $activeDocument->id])
        ->assertJsonMissing(['id' => $inactiveDocument->id]);
});

test('can filter product documents by document type', function () {
    $product = Product::factory()->create();

    $regulatoryDocument = Document::factory()->create([
        'document_type' => 'REGULATORY',
        'is_active' => true,
    ]);
    $technicalDocument = Document::factory()->create([
        'document_type' => 'TECHNICAL',
        'is_active' => true,
    ]);

    $product->documents()->attach([$regulatoryDocument->id, $technicalDocument->id]);

    $response = $this->getJson("/api/products/{$product->id}/documents?document_type=REGULATORY");

    $response->assertStatus(200)
        ->assertJsonCount(1)
        ->assertJsonFragment(['id' => $regulatoryDocument->id])
        ->assertJsonMissing(['id' => $technicalDocument->id]);
});
