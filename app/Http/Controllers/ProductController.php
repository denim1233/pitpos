<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return response()->json($products, 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status_id' => 'required|integer|exists:statuses,id',
            'category_id' => 'required|integer|exists:categories,id',
            'created_user' => 'required|integer',
            'updated_user' => 'required|integer',
        ]);

        $product = Product::create($validatedData);

        return response()->json([
            'message' => 'Product created successfully!',
            'product' => $product
        ], 201);
    }

    /**
     * Update an existing product
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $validatedData = $request->validate([
            'name' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
            'status_id' => 'sometimes|integer|exists:statuses,id',
            'category_id' => 'sometimes|integer|exists:categories,id',
            'updated_user' => 'required|integer',
        ]);

        $product->update($validatedData);

        return response()->json([
            'message' => 'Product updated successfully!',
            'product' => $product
        ], 200);
    }
}