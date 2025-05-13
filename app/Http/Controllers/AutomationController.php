<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{AutomationCondition, UserAutomation, UserAutomationShortcut, Shortcut};
use Illuminate\Support\Facades\Auth;

class AutomationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $authUser = Auth::id();

            $automations = UserAutomation::where('user_id', operator: $authUser)
                ->with([
                    'userAutomationShortcut' => function ($query) {
                        $query->orderBy('order', 'asc')->with('shortcut:id,name');
                    },
                    'automationCondition:id,name,icon',
                ])
                ->get()
                ->map(function ($automation) {
                    $stepsWithActionNames = $automation->userAutomationShortcut->map(function ($step) {
                        return [
                            'id' => $step->id,
                            'order' => $step->order,
                            'shortcut_id' => $step->shortcut_id,
                            'shortcutName' => $step->shortcut?->name,
                        ];
                    });

                    return [
                        'id' => $automation->id,
                        'title' => $automation->title,
                        'icon' => $automation->icon,
                        'automation_condition_id' => $automation->automation_condition_id,
                        'steps' => $stepsWithActionNames,
                    ];
                })
                ->toArray();

            return response()->json([
                "automations" => $automations
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed fetching automations',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function create() {
        try{
            $authUser = Auth::id();

            $automationConditions = AutomationCondition::all();
            $userShortcuts = Shortcut::where('user_id', operator: $authUser)
                ->with([
                    'userAction' => function ($query) {
                        $query->orderBy('order', 'asc')->with('action:id,name');
                    }
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
                        'name' => $shortcut->name,
                        'icon' => $shortcut->icon,
                        'description' => $shortcut->description,
                        'gradient_start' => $shortcut->gradient_start,
                        'gradient_end' => $shortcut->gradient_end,
                        'steps' => $stepsWithActionNames,
                    ];
                })
                ->toArray();

                return response()->json([
                    'automationConditions' => $automationConditions,
                    'userShortcuts' => $userShortcuts,
                ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error fetching automation condition',
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
                'title' => 'required|string|max:255',
                'icon' => 'nullable|string|max:255',
                'automation_condition_id' => 'required|uuid',
                'shortcuts' => 'array',
                'shortcuts.*.id' => 'required|uuid',
                'shortcuts.*.order' => 'required|integer',
            ]);

            $userAutomation = UserAutomation::create([
                'title' => $request->title,
                'icon' => $request->icon,
                'user_id' => $userId,
                'automation_condition_id' => $request->automation_condition_id,
            ]);

            foreach($request->shortcuts as $shortcut) {
                UserAutomationShortcut::create([
                    'order' => $shortcut['order'],
                    'user_automation_id' => $userAutomation->id,
                    'shortcut_id' => $shortcut['id'],
                ]);
            }
            return response()->json([
                'message' => 'Automation created successfully',
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error creating automation',
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
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $userId = Auth::id();

        try {
            $automation = UserAutomation::where('user_id', operator: $userId)
                ->where('id', operator: $id)
                ->with([
                    'userAutomationShortcut' => function ($query) {
                        $query->orderBy('order', 'asc')->with('shortcut:id,name,icon,gradient_start,gradient_end');
                    },
                    'automationCondition:id,name,icon',
                ])
                ->firstOrFail();

            return response()->json($automation);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error fetching automation',
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
            $request->validate([
                'title' => 'required|string|max:255',
                'icon' => 'nullable|string|max:255',
                'userShortcuts' => 'array',
                'userShortcuts.*.id' => 'required|uuid',
                'userShortcuts.*.order' => 'required|integer',
            ]);

            $userAutomation = UserAutomation::where('user_id', operator: $userId)
                ->where('id', operator: $id)
                ->firstOrFail();

            $userAutomation->update([
                'title' => $request->title,
                'icon' => $request->icon,
            ]);

            // Update shortcuts
            foreach($request->shortcuts as $shortcut) {
                UserAutomationShortcut::updateOrCreate(
                    [
                        'user_automation_id' => $userAutomation->id,
                        'shortcut_id' => $shortcut['id'],
                    ],
                    [
                        'order' => $shortcut['order'],
                    ]
                );
            }

            return response()->json([
                'message' => 'Automation updated successfully',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error updating automation',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $userId = Auth::id();

        try {
            $userAutomation = UserAutomation::where('user_id', operator: $userId)
                ->where('id', operator: $id)
                ->firstOrFail();

            $userAutomation->delete();

            return response()->json([
                'message' => 'Automation deleted successfully',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error deleting automation',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
