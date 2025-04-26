<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $categories = Category::with('actions')->get();

            return response()->json([
                // Parse inputs fielf of actions key if it exists
                'categories' => $categories->map(function ($category) {
                    $categoryArray = $category->toArray();

                    $categoryArray['actions'] = $category->actions->map(function ($action) {
                        $actionArray = $action->toArray();
                        if (isset($actionArray['inputs'])) {
                            $actionArray['inputs'] = json_decode($actionArray['inputs'], true) ?: [];
                        }
                        return convertKeysToCamelCase($actionArray);
                    })->toArray();
                    
                    return convertKeysToCamelCase($categoryArray);
                })->toArray(),
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while fetching the categories.',
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
                'icon' => 'nullable|string',
                'imageKey' => 'nullable|string',
                'gradientStart' => 'nullable|string',
                'gradientEnd' => 'nullable|string',
            ]);

            $category = Category::create([
                'name' => $request->name,
                'icon' => $request->icon,
                'image_key' => $request->imageKey,
            ]);

            // Create the associated actions
            foreach ($request->actions as $actionData) {
                $category->actions()->create([
                    'name' => $actionData['name'],
                    'icon' => $actionData['icon'],
                    'gradient_start' => $actionData['gradientStart'],
                    'gradient_end' => $actionData['gradientEnd'],
                ]);
            }

            return response()->json([
                'message' => 'Category created successfully.',
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while creating the category.',
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
        try{
            $category = Category::find($id);

            if (!$category) {
                return response()->json([
                    'message' => 'Category not found.',
                ], 404);
            }

            $category->delete();

            return response()->json([
                'message' => 'Category deleted successfully.',
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while deleting the category.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
