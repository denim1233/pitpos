<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\UnitOfMeasureController;
use App\Http\Controllers\AuthController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Public API Routes

Route::post('/products', [ProductController::class, 'store']); // Insert new product
Route::put('/products/{id}', [ProductController::class, 'update']); // Update existing product

Route::get('/categories', [CategoryController::class, 'index']);  // Get all categories
Route::post('/categories', [CategoryController::class, 'store']); // Insert new category
Route::put('/categories/{id}', [CategoryController::class, 'update']); // Update category

Route::get('/statuses', [StatusController::class, 'index']);  // Get all statuses
Route::post('/statuses', [StatusController::class, 'store']); // Insert new status
Route::put('/statuses/{id}', [StatusController::class, 'update']); // Update status

Route::get('/units-of-measure', [UnitOfMeasureController::class, 'index']);  // Get all units of measure
Route::post('/units-of-measure', [UnitOfMeasureController::class, 'store']); // Insert new unit
Route::put('/units-of-measure/{id}', [UnitOfMeasureController::class, 'update']); // Update unit





Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

// Protected routes (only accessible with authentication)
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/products', [ProductController::class, 'index']);  // Get all products
});


