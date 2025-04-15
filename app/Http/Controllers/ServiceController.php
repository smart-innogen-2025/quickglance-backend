<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\{Service, Shortcut};

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $services = Service::with(['shortcuts' => function ($query) {
                $query->with(['userAction' => function ($query) {
                    $query->orderBy('order', 'asc')->with('action:id,name');
                }]);
            }])->get()
            ->map(function ($service) {
                $shortcuts = $service->shortcuts->map(function ($shortcut) {
                    $stepsWithActionNames = $shortcut->userAction->map(function ($step) {
                        return [
                            'id' => $step->id,
                            'order' => $step->order,
                            'inputs' => $step->inputs,
                            'action_id' => $step->action_id,
                            'actionName' => $step->action?->name,
                        ];
                    });

                    return [
                        'id' => $shortcut->id,
                        'user' => $shortcut->user,
                        'name' => $shortcut->name,
                        'icon' => $shortcut->icon,
                        'description' => $shortcut->description,
                        'gradient_start' => $shortcut->gradient_start,
                        'gradient_end' => $shortcut->gradient_end,
                        'steps' => $stepsWithActionNames,
                    ];
                });

                return [
                    'id' => $service->id,
                    'name' => $service->name,
                    'description' => $service->description,
                    'website_link' => $service->website_link,
                    'image' => $service->image,
                    'shortcuts' => $shortcuts,
                ];
            })->toArray();

            return response()->json([
                'message' => 'Services fetched successfully',
                'services' => convertKeysToCamelCase($services),
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error fetching services',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userId = Auth::id();
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string|max:255',
                'websiteLink' => 'nullable|url|max:255',
                'image' => 'nullable|string|max:255',
                'shortcuts' => 'array',
                'shortcuts.*.name' => 'required|string|max:255',
                'shortcuts.*.icon' => 'required|string|max:255',
                'shortcuts.*.description' => 'nullable|string|max:255',
                'shortcuts.*.gradientStart' => 'required|string|max:255',
                'shortcuts.*.gradientEnd' => 'required|string|max:255',
            ]);

            $service = Service::create([
                'name' => $request->name,
                'description' => $request->description,
                'website_link' => $request->websiteLink,
                'image' => $request->image,
            ]);

            if ($request->has('shortcuts')) {
                foreach ($request->shortcuts as $shortcutData) {
                    Shortcut::create([
                        'user_id' => $userId,
                        'service_id' => $service->id,
                        'name' => $shortcutData['name'],
                        'icon' => $shortcutData['icon'],
                        'description' => $shortcutData['description'],
                        'gradient_start' => $shortcutData['gradientStart'],
                        'gradient_end' => $shortcutData['gradientEnd'],
                    ]);
                }
            }
            return response()->json([
                'message' => 'Service created successfully'
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error creating service',
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
