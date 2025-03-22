<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class CategoryController extends Controller
{
    public function index()
    {
        return response()->json(Category::with('status')->get(), 200);
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255|unique:categories,name',
                'status_id' => 'required|integer|exists:statuses,id',
            ]);

            $category = Category::create($validatedData);

            return response()->json([
                'message' => 'Category created successfully!',
                'category' => $category
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);
        }
    }

    /**
     * Update an existing category
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        try {
            $validatedData = $request->validate([
                'name' => 'sometimes|string|max:255|unique:categories,name,' . $id,
                'status_id' => 'sometimes|integer|exists:statuses,id',
            ]);

            $category->update($validatedData);

            return response()->json([
                'message' => 'Category updated successfully!',
                'category' => $category
            ], 200);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);
        }
    }
}
