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
            $services = Service::all()->toArray();

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
                'imageKey' => 'nullable|string|max:255',
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
                'image_key' => $request->imageKey,
            ]);

            if ($request->has('shortcuts')) {
                foreach ($request->shortcuts as $shortcutData) {
                    $shortcutMaxOrder = Shortcut::where('user_id', $userId)
                        ->where('service_id', $service->id)
                        ->max('order');
                    Shortcut::create([
                        'user_id' => $userId,
                        'service_id' => $service->id,
                        'order' => $shortcutMaxOrder + 1,
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
        try {
            $service = Service::findOrFail($id);
            $shortcuts = Shortcut::where('service_id', $id)->with(['userAction' => function ($query) {
                $query->orderBy('order', 'asc')->with('action:id,name');
            }])->get()
            ->map(function ($shortcut) {
                $stepsWithActionNames = $shortcut->userAction->map(function ($step) {
                    return [
                        'id' => $step->id,
                        'order' => $step->order,
                        'inputs' => $step->inputs,
                        'action_id' => $step->action_id,
                        'mobile_key' => $step->action?->mobile_key,
                        'actionName' => $step->action?->name,
                    ];
                });

                $installedShortcutIds = Shortcut::where('user_id', Auth::id())
                ->whereNotNull('original_shortcut_id')
                ->pluck('original_shortcut_id')
                ->toArray();

                if (in_array($shortcut->id, $installedShortcutIds)) {
                    $isInstalled = true;
                } else {
                    $isInstalled = false;
                }
                
                return [
                    'id' => $shortcut->id,
                    'name' => $shortcut->name,
                    'icon' => $shortcut->icon,
                    'description' => $shortcut->description,
                    'gradientStart' => $shortcut->gradient_start,
                    'gradientEnd' => $shortcut->gradient_end,
                    'steps' => $stepsWithActionNames,
                    'isInstalled' => $isInstalled,
                ];
            });

            if ($shortcuts->isEmpty()) {
                return response()->json([
                    'message' => 'No shortcuts found for this service category',
                ], 404);
            }

            

            return response()->json([
                "service" => [
                    ...convertKeysToCamelCase($service->toArray()),
                    "shortcuts" => convertKeysToCamelCase($shortcuts->toArray()),
                ]
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error fetching service',
                'error' => $e->getMessage(),
            ], 500);
        }
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
