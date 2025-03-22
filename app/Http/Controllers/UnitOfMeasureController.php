<?php

namespace App\Http\Controllers;

use App\Models\UnitOfMeasure;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UnitOfMeasureController extends Controller
{
    public function index(Request $request){
        $query = UnitOfMeasure::with('status'); // Eager load 'status' relationship

        // Search functionality
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'LIKE', "%{$search}%");
        }

        // Pagination
        $perPage = $request->input('per_page', 10); // Default 10 items per page
        $units = $query->paginate($perPage);

        return response()->json($units, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:unit_of_measures,name',
            'status_id' => 'required|integer',
            'price' => 'required|numeric|min:0',
            'set_as_default' => 'required|boolean',
            'created_user' => 'required|integer',
            'updated_user' => 'required|integer',
        ]);

        $unit = UnitOfMeasure::create($request->all());

        return response()->json([
            'message' => 'Unit of Measure created successfully!',
            'unit' => $unit
        ], 201);
    }

    /**
     * Update an existing Unit of Measure
     */
    public function update(Request $request, $id)
    {
        $unit = UnitOfMeasure::find($id);

        if (!$unit) {
            return response()->json(['message' => 'Unit not found'], 404);
        }

        $request->validate([
            'name' => 'required|string|unique:unit_of_measures,name,' . $id,
            'status_id' => 'required|integer',
            'price' => 'required|numeric|min:0',
            'set_as_default' => 'required|boolean',
            'updated_user' => 'required|integer',
        ]);

        $unit->update($request->all());

        return response()->json([
            'message' => 'Unit of Measure updated successfully!',
            'unit' => $unit
        ], 200);
    }
}