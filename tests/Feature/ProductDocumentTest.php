<?php

use App\Models\Document;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('product can have many documents', function () {
    $product = Product::factory()->create();
    $documents = Document::factory()->count(3)->create();

    $product->documents()->attach($documents);

    $this->assertCount(3, $product->documents);
});

test('document can belong to many products', function () {
    $products = Product::factory()->count(3)->create();
    $document = Document::factory()->create();

    foreach ($products as $product) {
        $product->documents()->attach($document);
    }

    $this->assertCount(3, $document->products);
});

test('can attach and detach documents to products', function () {
    $product = Product::factory()->create();
    $document = Document::factory()->create();

    $product->documents()->attach($document);
    $this->assertCount(1, $product->documents);

    $product->documents()->detach($document);
    $this->assertCount(0, $product->fresh()->documents);
});

test('can filter documents by type', function () {
    $product = Product::factory()->create();

    $regulatoryDoc = Document::factory()->create(['document_type' => 'REGULATORY']);
    $technicalDoc = Document::factory()->create(['document_type' => 'TECHNICAL']);

    $product->documents()->attach([$regulatoryDoc->id, $technicalDoc->id]);

    $regulatoryDocs = $product->documents()->where('document_type', 'REGULATORY')->get();
    $technicalDocs = $product->documents()->where('document_type', 'TECHNICAL')->get();

    $this->assertCount(1, $regulatoryDocs);
    $this->assertCount(1, $technicalDocs);
});
