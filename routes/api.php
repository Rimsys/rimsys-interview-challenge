<?php

use App\Http\Controllers\DocumentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Document routes
Route::apiResource('documents', DocumentController::class);

// Product document routes
Route::get('/products/{product}/documents', [DocumentController::class, 'forProduct']);

// Intentionally missing route for GET /api/products/{product}/documents/download
