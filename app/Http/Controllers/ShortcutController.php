<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request,
    Illuminate\Support\Facades\Auth;

use App\Models\Shortcut,
    App\Models\Action,
    App\Models\UserAction;

class ShortcutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function publicShortcuts()
{
    $authenticatedUser = Auth::user();

    try {
        $shortcuts = Shortcut::where('user_id', '!=', $authenticatedUser->id)
            ->with([
                'userAction' => function ($query) {
                    $query->orderBy('order', 'asc')->with('action:id,name');
                },
                'user:id,first_name,middle_name,last_name',
            ])
            ->get()
            ->map(function ($shortcut) {
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
            })
            ->toArray();

        // Add userName and remove user key from each shortcut
        $shortcuts = array_map(function($shortcut) {
            if (isset($shortcut['user'])) {
                // Create userName
                $shortcut['userName'] = $shortcut['user']['first_name'];

                // Add middle_name if present
                if (!empty($shortcut['user']['middle_name'])) {
                    $shortcut['userName'] .= ' ' . $shortcut['user']['middle_name'];
                }

                $shortcut['userName'] .= ' ' . $shortcut['user']['last_name'];

                // Remove the user key
                unset($shortcut['user']);
            }
            return $shortcut;
        }, $shortcuts);

        return response()->json([
            'shortcuts' => convertKeysToCamelCase($shortcuts),
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'message' => 'An error occurred while fetching the shortcuts.',
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
            $userId = Auth::id(); // Get the authenticated user's ID

            $request->validate([
                'name' => 'required|string',
                'actions' => 'required|array',
                'icon' => 'required|string',
                'description' => 'required|string',
                'gradient_start' => 'nullable|string',
                'gradient_end' => 'nullable|string',
            ]);

            $shortcut = Shortcut::create([
                'user_id' => $userId,
                'name' => $request->name,
                'icon' => $request->icon,
                'description' => $request->description,
                'gradient_start' => $request->gradientStart,
                'gradient_end' => $request->gradientEnd,
            ]);

            foreach($request->actions as $action) {
                $actionData = Action::find($action['id']);

                if (!$actionData) {
                    return response()->json([
                        'message' => 'Action not found.',
                    ], 404);
                }

                $maxOrder = UserAction::where('shortcut_id', $shortcut->id)->max('order') ?? 0;

                $action = UserAction::create([
                    'order' => $maxOrder + 1,
                    'user_id' => $userId,
                    'action_id' => $actionData->id,
                    'shortcut_id'=> $shortcut->id,
                    'inputs' => $action['inputs']
                ]);
            }

            return response()->json([
                'message' => 'Shortcut created successfully.',
            ], 201);
           
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while creating the shortcut.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function personalShortcuts()
    {
        $authenticatedUser = Auth::user();

        try {
            $shortcuts = Shortcut::where('user_id', $authenticatedUser->id)
                ->with([
                    'userAction' => function ($query) {
                        $query->orderBy('order', 'asc')->with('action:id,name');
                    },
                    'user:id,first_name,middle_name,last_name',
                ])
                ->get()
                ->map(function ($shortcut) {
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
                })
                ->toArray();

            // Add userName and remove user key from each shortcut
            $shortcuts = array_map(function($shortcut) {
                if (isset($shortcut['user'])) {
                    // Create userName
                    $shortcut['userName'] = $shortcut['user']['first_name'];

                    // Add middle_name if present
                    if (!empty($shortcut['user']['middle_name'])) {
                        $shortcut['userName'] .= ' ' . $shortcut['user']['middle_name'];
                    }

                    $shortcut['userName'] .= ' ' . $shortcut['user']['last_name'];

                    // Remove the user key
                    unset($shortcut['user']);
                }
                return $shortcut;
            }, $shortcuts);

            return response()->json([
                'shortcuts' => convertKeysToCamelCase($shortcuts),
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while fetching the shortcuts.',
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
        try{
            $shortcut = Shortcut::find($id);

            if (!$shortcut) {
                return response()->json([
                    'message' => 'Shortcut not found.',
                ], 404);
            }

            $shortcut->delete();

            return response()->json([
                'message' => 'Shortcut deleted successfully.',
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while deleting the shortcut.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
