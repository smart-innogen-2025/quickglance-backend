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
                    'automationCondition:id,name,emoji',
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
                        'automation_condition_id' => $automation->automation_condition_id,
                        'steps' => $stepsWithActionNames,
                    ];
                })
                ->toArray();

            return response()->json([
                "automations" => convertKeysToCamelCase($automations),
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

            $userAutomationConditionIds = UserAutomation::where('user_id', $authUser)
                ->pluck('automation_condition_id')
                ->unique();

            $automationConditions = AutomationCondition::all()
                ->map(function ($condition) use ($userAutomationConditionIds) {
                    return [
                        'id' => $condition->id,
                        'emoji' => $condition->emoji,
                        'name' => $condition->name,
                        'description' => $condition->description,
                        'type' => $condition->type,
                        'is_active' => $userAutomationConditionIds->contains($condition->id),
                    ];
                });
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
                'automationConditionId' => 'required|uuid',
                'shortcuts' => 'array',
                'shortcuts.*.id' => 'required|uuid',
                'shortcuts.*.order' => 'required|integer',
            ]);

            $userAutomation = UserAutomation::create([
                'title' => $request->title,
                'user_id' => $userId,
                'automation_condition_id' => $request->automationConditionId,
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
     * Trigger shortcuts for an emotion-based automation.
     */
    public function triggerByEmotion(Request $request)
    {
        $userId = Auth::id();

        try {
            $request->validate([
                'emotion' => 'required|string',
            ]);

            $emotion = trim($request->emotion);

            $condition = AutomationCondition::where('type', 'emotion')
                ->where(function ($query) use ($emotion) {
                    $query->whereRaw('lower(name) = ?', [strtolower($emotion)])
                        ->orWhere('emoji', $emotion);
                })
                ->first();

            if (!$condition) {
                return response()->json([
                    'message' => 'Emotion condition not found.',
                ], 404);
            }

            $automations = UserAutomation::where('user_id', $userId)
                ->where('automation_condition_id', $condition->id)
                ->with([
                    'automationCondition:id,name,emoji,type',
                    'userAutomationShortcut' => function ($query) {
                        $query->orderBy('order', 'asc')
                            ->with([
                                'shortcut.userAction' => function ($subQuery) {
                                    $subQuery->orderBy('order', 'asc')
                                        ->with('action:id,name,mobile_key');
                                },
                            ]);
                    },
                ])
                ->get();

            if ($automations->isEmpty()) {
                return response()->json([
                    'message' => 'No automations found for this emotion.',
                ], 404);
            }

            $payload = $automations->map(function ($automation) {
                $shortcuts = $automation->userAutomationShortcut->map(function ($step) {
                    $shortcut = $step->shortcut;

                    $steps = $shortcut?->userAction?->map(function ($actionStep) {
                        return [
                            'id' => $actionStep->id,
                            'order' => $actionStep->order,
                            'inputs' => $actionStep->inputs,
                            'action_id' => $actionStep->action_id,
                            'mobile_key' => $actionStep->action?->mobile_key,
                            'actionName' => $actionStep->action?->name,
                        ];
                    }) ?? collect();

                    return [
                        'id' => $shortcut?->id,
                        'name' => $shortcut?->name,
                        'icon' => $shortcut?->icon,
                        'androidIcon' => $shortcut?->android_icon,
                        'description' => $shortcut?->description,
                        'gradientStart' => $shortcut?->gradient_start,
                        'gradientEnd' => $shortcut?->gradient_end,
                        'steps' => $steps,
                    ];
                })->values();

                return [
                    'id' => $automation->id,
                    'title' => $automation->title,
                    'automationCondition' => $automation->automationCondition,
                    'shortcuts' => $shortcuts,
                ];
            })->toArray();

            return response()->json([
                'automations' => convertKeysToCamelCase($payload),
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error triggering automation.',
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
                    'automationCondition:id,name,emoji',
                    'userAutomationShortcut' => function ($query) {
                        $query->orderBy('order', 'asc')->with(['shortcut:id,name,icon,gradient_start,gradient_end']);
                    },
                ])
                ->firstOrFail();

            return response()->json(convertKeysToCamelCase($automation->toArray()));
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
                'shortcuts' => 'nullable|array',
                'shortcuts.*' => 'required|uuid',
                'arrangement' => 'nullable|array',
                'arrangement.*.id' => 'required|uuid',
                'arrangement.*.order' => 'required|integer',
            ]);

            $userAutomation = UserAutomation::where('user_id', operator: $userId)
                ->where('id', operator: $id)
                ->firstOrFail();
            
            $userAutomation->update([
                'title' => $request->title,
            ]);
            $shortcuts = collect($request->input('shortcuts', []));
            $arrangement = collect($request->input('arrangement', []));
            if ($shortcuts->isEmpty() && $arrangement->isNotEmpty()) {
                $shortcuts = $arrangement->pluck('id')->unique()->values();
            }

            if ($arrangement->isEmpty() && $shortcuts->isNotEmpty()) {
                $arrangement = $shortcuts->values()->map(function ($id, $index) {
                    return ['id' => $id, 'order' => $index + 1];
                });
            }

            $shouldSyncShortcuts = $request->has('shortcuts') || $request->has('arrangement');

            if ($shouldSyncShortcuts) {
                $shortcutIds = $shortcuts->values();

                if ($shortcutIds->isEmpty()) {
                    UserAutomationShortcut::where('user_automation_id', $userAutomation->id)->delete();
                } else {
                    UserAutomationShortcut::where('user_automation_id', $userAutomation->id)
                        ->whereNotIn('shortcut_id', $shortcutIds)
                        ->delete();
                }

                foreach ($arrangement as $step) {
                    UserAutomationShortcut::updateOrCreate(
                        [
                            'user_automation_id' => $userAutomation->id,
                            'shortcut_id' => $step['id'],
                        ],
                        [
                            'order' => $step['order'],
                        ]
                    );
                }
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
