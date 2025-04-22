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
    $authenticatedUserId = Auth::id();

    try {
        $shortcuts = Shortcut::where('user_id', '!=', $authenticatedUserId)
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

            foreach($request['actions'] as $action) {
                $actionData = Action::find($action['id']);
    
                if (!$actionData) {
                    info("Action not found: " . $action['id']);
                    continue;
                }
    
                // Validate inputs against action definition
                $validationResult = validateActionInputs(
                    $actionData->inputs, 
                    $action['inputs'] ?? []
                );
    
                if (!$validationResult['valid']) {
                    info("Invalid inputs for action {$actionData->id}: " . json_encode($validationResult['errors']));
                    continue;
                }
    
                $maxOrder = UserAction::where('shortcut_id', $shortcut->id)->max('order') ?? 0;
    
                UserAction::create([
                    'order' => $maxOrder + 1,
                    'user_id' => $userId,
                    'action_id' => $actionData->id,
                    'shortcut_id' => $shortcut->id,
                    'inputs' => $validationResult['validated_inputs'],
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
        $authenticatedUserId = Auth::id();

        try {
            $shortcuts = Shortcut::where('user_id', $authenticatedUserId)
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

    public function edit(string $id) {
        $userId = Auth::id();
        try{
            $shortcut = Shortcut::where('user_id', $userId)
                ->where('id', $id)
                ->with([
                    'userAction' => function ($query) {
                        $query->orderBy('order', 'asc')
                            ->select('id', 'order', 'action_id', 'inputs', 'shortcut_id');
                    },
                    'user:id,first_name,middle_name,last_name',
                ])
                ->first();

            $categoryId = Action::where('id', $shortcut->userAction[0]->action_id)
                                ->with('category:id')
                                ->first()
                                ->category
                                ->id;

            $categoryActions = Action::where('category_id', $categoryId)->get();

            $shortcutArray = $shortcut->toArray();
            $shortcutArray['categoryActions'] = $categoryActions;

            return response()->json([
                'shortcut' => convertKeysToCamelCase($shortcutArray)
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while fetching the shortcut.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $userId = Auth::id();
        try {
            UserAction::where('user_id', $userId)
                ->where('shortcut_id', $id)
                ->delete();

                $request->validate([
                    'actions' => 'required|array',
                    'actions.*.id' => 'required|string',
                    'actions.*.inputs' => 'required|string'
                ]);

                foreach($request['actions'] as $action) {
                    $actionData = Action::find($action['id']);
        
                    if (!$actionData) {
                        info("Action not found: " . $action['id']);
                        continue;
                    }
        
                    // Validate inputs against action definition
                    $validationResult = validateActionInputs(
                        $actionData->inputs, 
                        $action['inputs'] ?? []
                    );
        
                    if (!$validationResult['valid']) {
                        info("Invalid inputs for action {$actionData->id}: " . json_encode($validationResult['errors']));
                        continue;
                    }
        
                    $maxOrder = UserAction::where('shortcut_id', $id)->max('order') ?? 0;
        
                    UserAction::create([
                        'order' => $maxOrder + 1,
                        'user_id' => $userId,
                        'action_id' => $actionData->id,
                        'shortcut_id' => $id,
                        'inputs' => $validationResult['validated_inputs'],
                    ]);
                }

                return response()->json([
                    'message' => 'Shortcut updated successfully.',
                ], 200);
                
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while updating the shortcut.',
                'error' => $e->getMessage(),
            ], 500);
        }
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
