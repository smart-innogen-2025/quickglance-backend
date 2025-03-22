<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category,
    App\Models\Action;

class ActionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $actions = Action::all();

            return response()->json([
                'actions' => $actions,
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while fetching the actions.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string',
                'categoryId' => 'required|exists:categories,id',
                'icon' => 'required|string',
            ]);

            $category = Category::find($request->categoryId);

            if (!$category) {
                return response()->json([
                    'message' => 'Category not found.',
                ], 404);
            }

            $category->actions()->create([
                'name' => $request->name,
                'icon' => $request->icon,
            ]);

            return response()->json([
                'message' => 'Action created successfully.',
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while creating the action.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
