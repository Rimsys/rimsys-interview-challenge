<?php

use App\Models\Document;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

uses(RefreshDatabase::class);

test('can download all documents for a product as zip', function () {
    Storage::fake('public');

    $product = Product::factory()->create();

    // Create test files
    $file1 = UploadedFile::fake()->create('document1.pdf', 100);
    $file2 = UploadedFile::fake()->create('document2.pdf', 200);

    // Store files
    $path1 = Storage::putFile('documents', $file1);
    $path2 = Storage::putFile('documents', $file2);

    // Create documents
    $document1 = Document::factory()->create(['file_path' => $path1]);
    $document2 = Document::factory()->create(['file_path' => $path2]);

    // This will fail because the relationship is missing
    $product->documents()->attach([$document1->id, $document2->id]);

    // This will fail because the route and controller method are missing
    $response = $this->getJson("/api/products/{$product->id}/documents/download");

    $response->assertStatus(200)
        ->assertHeader('Content-Type', 'application/zip')
        ->assertHeader('Content-Disposition', "attachment; filename=\"{$product->name}-documents.zip\"");
});

test('returns 404 when trying to download documents for non-existent product', function () {
    // This will fail because the route and controller method are missing
    $response = $this->getJson("/api/products/999/documents/download");

    $response->assertStatus(404);
});

test('returns empty zip when product has no documents', function () {
    $product = Product::factory()->create();

    // This will fail because the route and controller method are missing
    $response = $this->getJson("/api/products/{$product->id}/documents/download");

    $response->assertStatus(200)
        ->assertHeader('Content-Type', 'application/zip')
        ->assertHeader('Content-Disposition', "attachment; filename=\"{$product->name}-documents.zip\"");
});
