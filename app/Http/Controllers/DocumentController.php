<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the documents.
     */
    public function index(): JsonResponse
    {
        $documents = Document::all();

        return response()->json($documents);
    }

    /**
     * Display a listing of the documents for a specific product.
     */
    public function forProduct(Product $product): JsonResponse
    {
        $documents = $product->documents;

        return response()->json($documents);
    }

    /**
     * Store a newly created document in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'file_path' => 'required|string|max:255',
            'is_active' => 'boolean',
        ]);

        $document = Document::create($validated);

        return response()->json($document, 201);
    }

    /**
     * Display the specified document.
     */
    public function show(Document $document): JsonResponse
    {
        return response()->json($document);
    }

    /**
     * Update the specified document in storage.
     */
    public function update(Request $request, Document $document): JsonResponse
    {
        $validated = $request->validate([
            'title' => 'string|max:255',
            'file_path' => 'string|max:255',
            'is_active' => 'boolean',
        ]);

        $document->update($validated);

        return response()->json($document);
    }

    /**
     * Remove the specified document from storage.
     */
    public function destroy(Document $document): JsonResponse
    {
        $document->delete();

        return response()->json(null, 204);
    }
}
