<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatusController extends Controller
{
    public function index()
    {
        return response()->json(Status::all(), 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $status = Status::create($validatedData);

        return response()->json([
            'message' => 'Status created successfully!',
            'status' => $status
        ], 201);
    }

    /**
     * Update an existing status
     */
    public function update(Request $request, $id)
    {
        $status = Status::find($id);

        if (!$status) {
            return response()->json(['message' => 'Status not found'], 404);
        }

        $validatedData = $request->validate([
            'name' => 'sometimes|string|max:255',
        ]);

        $status->update($validatedData);

        return response()->json([
            'message' => 'Status updated successfully!',
            'status' => $status
        ], 200);
    }
}
