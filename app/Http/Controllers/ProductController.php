<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index(Request $request){
        $query = Product::query();

        // Search functionality
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'LIKE', "%{$search}%")
                ->orWhere('description', 'LIKE', "%{$search}%");
        }

        // Pagination
        $perPage = $request->input('per_page', 10); // Default to 10 items per page
        $products = $query->paginate($perPage);

        return response()->json($products, 200);
    }

    public function store(Request $request){
        try{
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:products,name',
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
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);
        }
    }

    /**
     * Update an existing product
     */
    public function update(Request $request, $id){
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        try{
        $validatedData = $request->validate([
            'name' => 'sometimes|string|max:255|unique:products,name,' . $id,
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
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);
        }
    }
}