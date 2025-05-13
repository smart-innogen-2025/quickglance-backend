<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;

use App\Models\{Shortcut, Action, UserAction, UserAutomation, UserAutomationShortcut};


class UserSeeder extends Seeder
{
    public function run()
{
    // Create Roles
    $superAdminRole = Role::create(['name' => 'super-admin']);
    $adminRole = Role::create(['name' => 'admin']);
    $userRole = Role::create(['name' => 'user']);
    $serviceRole = Role::create(['name' => 'service-admin']);

    // Create Permissions
    $approveChangesPermission = Permission::create(['name' => 'approve-changes']);
    $submitChangesPermission = Permission::create(['name' => 'submit-changes']);

    // Assign Permissions to Roles
    $superAdminRole->givePermissionTo([$approveChangesPermission, $submitChangesPermission]);
    $adminRole->givePermissionTo($submitChangesPermission);


    // Create Super-Admin User
    $superAdmin = User::create([
        'first_name' => 'Super Admin',
        'email' => 'superadmin@example.com',
        'password' => Hash::make('superdeveloper'), 
    ]);
    $superAdmin->assignRole($superAdminRole);

    // Create Admin Users
    $admin1 = User::create([
        'first_name' => 'Admin One',
        'email' => 'admin1@example.com',
        'password' => Hash::make('developer'),
    ]);
    $admin1->assignRole($adminRole);

    $admin2 = User::create([
        'first_name' => 'Admin Two',
        'email' => 'admin2@example.com',
        'password' => Hash::make('developer'),
    ]);
    $admin2->assignRole($adminRole);

    $serviceAdmin = User::create([
        'first_name' => 'Service Admin',
        'email' => 'service-admin@example.com',
        'password' => Hash::make('developer'),
    ]);
    $serviceAdmin->assignRole($serviceRole);


    $user1 = User::create([
        'first_name' => 'Mel Mathew',
        'last_name' => 'Palana',
        'email' => 'mel@gmail.com',
        'password' => Hash::make('password123'),
    ]);
    $user1->assignRole($userRole);
    $user1Shortcuts = [
        [
            'userId' => $user1->id,
            'name' => 'Call Emergency Services',
            'icon' => 'cross.case.fill',
            'androidIcon' => 'medkit',
            'description' => 'Quickly dial emergency services',
            'gradient_start' => '#FF2D55',
            'gradient_end' => '#991B33',
            'actions' => [
                [
                    'id' => '9ea3e8b8-2df3-493f-8edd-18f6eb2de8e6',
                    'inputs' => [
                        'phoneNumber' => '911',
                        'message' => 'Need immediate assistance!',
                    ],
                ],
                [
                    'id' => '9ea3e8b8-2ef4-44b1-a58e-60f8af05f473',
                    'inputs' => [
                        'recipient' => 'Emergency Contact',
                        'message' => 'I need help!',
                    ],
                ]
            ],
        ],
        [
            'userId'        => $user1->id,
            'name'           => 'Toggle Connectivity',
            'icon'           => 'wifi',
            'androidIcon'    => 'wifi',
            'description'    => 'Switch Wi-Fi and Bluetooth on/off',
            'gradient_start' => '#34AADC',
            'gradient_end'   => '#1F6583',
            'actions'        => [
                [
                    'id'     => '9ed7f012-a638-4b1e-94a1-7110195a5aa6',
                    'inputs' => [],
                ],
                [
                    'id'     => '9ed7f012-a6a4-417d-8056-cdd08e9cb9f7',
                    'inputs' => [],
                ],
            ],
        ],
        [
            'userId'        => $user1->id,
            'name'           => 'Audio Reminder & Record',
            'icon'           => 'speaker.wave.3.fill',
            'androidIcon'    => 'play-circle-sharp',
            'description'    => 'Play reminder and record a note',
            'gradient_start' => '#AF52DE',
            'gradient_end'   => '#683286',
            'actions'        => [
                [
                    'id'     => '9ed7f012-a7e0-4f4c-9d66-d69cfe3b86bd',
                    'inputs' => [
                        'soundFile' => 'reminder.mp3',
                    ],
                ],
                [
                    'id'     => '9ed7f012-a8e9-4ad2-b1ac-2e12cde0a10d',
                    'inputs' => [
                        'duration' => 15,
                    ],
                ],
            ],
        ],
        [
            'userId'        => $user1->id,
            'name'           => 'Find Home & My Location',
            'icon'           => 'location.fill',
            'androidIcon'    => 'location',
            'description'    => 'Shows your current location then navigates home',
            'gradient_start' => '#FF3B30',
            'gradient_end'   => '#992420',
            'actions'        => [
                [
                    'id'     => '9ed7f012-aa27-4170-9529-07e4ecb6db4e',
                    'inputs' => [],
                ],
                [
                    'id'     => '9ed7f012-aa94-47a1-871a-a7b41af5e450',
                    'inputs' => [
                        'location' => '123 Main St',
                    ],
                ],
            ],
        ],
        [
            'userId'        => $user1->id,
            'name'           => 'Copy Note & QR Code',
            'icon'           => 'clipboard.fill',
            'androidIcon'    => 'clipboard',
            'description'    => 'Copy last note and produce its QR code',
            'gradient_start' => '#FF9500',
            'gradient_end'   => '#995900',
            'actions'        => [
                [
                    'id'     => '9ed7f012-acc3-40ea-8a2d-19d724979b2a',
                    'inputs' => [
                        'text' => 'Meeting at 3 PM',
                    ],
                ],
                [
                    'id'     => '9ed7f012-ada1-48eb-a6ee-cff22ff5390b',
                    'inputs' => [
                        'content' => 'Meeting at 3 PM',
                    ],
                ],
            ],
        ],
        [
            'userId'        => $user1->id,
            'name'           => 'Quick AI Assist',
            'icon'           => 'text.bubble.fill',
            'androidIcon'    => 'chatbox',
            'description'    => 'Summarize text or generate completion',
            'gradient_start' => '#32D74B',
            'gradient_end'   => '#1E8A2D',
            'actions'        => [
                [
                    'id'     => '9ed7f012-b24d-4e8c-9e00-a69ec0001f2b',
                    'inputs' => [
                        'prompt' => 'Here is my message: …',
                    ],
                ],
                [
                    'id'     => '9ed7f012-b1dd-4c45-be0d-69e3e840a6fe',
                    'inputs' => [
                        'prompt' => 'Draft an email saying:',
                        'length' => 'Short',
                    ],
                ],
            ],
        ],
        [
            'userId'        => $user1->id,
            'name'           => 'Web Browse & Download',
            'icon'           => 'safari',
            'androidIcon'    => 'globe',
            'description'    => 'Open site then fetch its content',
            'gradient_start' => '#FF2D55',
            'gradient_end'   => '#991B33',
            'actions'        => [
                [
                    'id'     => '9ed7f012-b4de-4fbb-8de1-7b258fdc6688',
                    'inputs' => [
                        'url' => 'https://example.com',
                    ],
                ],
                [
                    'id'     => '9ed7f012-b571-4b41-8ab1-1a6d31a61aca',
                    'inputs' => [
                        'url' => 'https://example.com/data.json',
                    ],
                ],
            ],
        ],
    ];

    foreach ($user1Shortcuts as $shortcut) {
        $this->createShortcut($shortcut);
    }

    $user1Automation = [
        [
            'userId' => $user1->id,
            'title' => 'When the user feels happy 😀',
            'automationConditionId' => '9ee5da75-b09b-4f44-a356-71f4f6f1503a',
            'shortcuts' => [
                [
                    'order' => 1,
                    'shortcutName' => 'Quick AI Assist'
                ],
                [
                    'order' => 2,
                    'shortcutName' => 'Web Browse & Download'
                ]
            ]
        ],
        [
            'userId' => $user1->id,
            'title' => 'Afternoon Routine ☀️',
            'automationConditionId' => '9ee65ac7-fe7b-4e29-8c4b-2918e11c4533',
            'shortcuts' => [
                [
                    'order' => 1,
                    'shortcutName' => 'Find Home & My Location'
                ],
                [
                    'order' => 2,
                    'shortcutName' => 'Audio Reminder & Record'
                ]
            ]
        ],
        [
            'userId' => $user1->id,
            'title' => 'Browsing through the web 🌐',
            'automationConditionId' => '9ee65ac8-0008-4b79-ae25-1366f842d097',
            'shortcuts' => [
                [
                    'order' => 1,
                    'shortcutName' => 'Toggle Connectivity'
                ],
                [
                    'order' => 2,
                    'shortcutName' => 'Web Browse & Download'
                ]
            ]
        ]
    ];

    foreach ($user1Automation as $automation) {
        $this->createAutomation($automation);
    }

    $user2 = User::create([
        'first_name' => 'Alex',
        'middle_name' => 'M.',
        'last_name' => 'Camaddo',
        'email' => 'alex@gmail.com',
        'password' => Hash::make('password123'),
    ]);
    $user2->assignRole($userRole);
    $this->createShortcut([
        'userId' => $user2->id,
        'name' => 'Navigate to Doctor',
        'icon' => 'stethoscope',
        'androidIcon' => 'map',
        'description' => 'Get directions to the nearest doctor or medical facility in your area',
        'gradient_start' => '#19CCDF',
        'gradient_end' => '#0E6F79',
        'actions' => [
            [
                'id' => '9ea403bf-8810-4983-b96d-eb13d493c14d',
                'inputs' => [
                    'location' => 'Nearest doctor',
                    'mode' => 'driving',
                ],
            ],
        ],
    ]);
    
    $user3 = User::create([
        'first_name' => 'Robert',
        // 'middle_name' => 'M.',
        'last_name' => 'Chen',
        'email' => 'robert@gmail.com',
        'password' => Hash::make('password123'),
    ]);
    $user3->assignRole($userRole);
    $this->createShortcut([
        'userId' => $user3->id,
        'name' => 'Medication Reminder',
        'icon' => 'pills.fill',
        'androidIcon' => 'timer',
        'description' => 'Set up reminders for taking medications on time and track your medication schedule',
        'gradient_start' => '#E5BC09',
        'gradient_end' => '#7F6805',
        'actions' => [
            [
                'id' => '9ea403bf-878c-4470-b514-af22633a0ff4',
                'inputs' => [
                    'medicationName' => 'Aspirin',
                    'dosage' => '500mg',
                    'time' => '08:00 AM',
                ],
            ],
        ],
    ]);

    $user4 = User::create([
        'first_name' => 'Emily',
        // 'middle_name' => 'M.',
        'last_name' => 'Martinez',
        'email' => 'emily@gmail.com',
        'password' => Hash::make('password123'),
    ]);
    $user4->assignRole($userRole);
    $this->createShortcut([
        'userId' => $user4->id,
        'name' => 'Start voice-to-text message',
        'icon' => 'microphone.fill',
        'androidIcon' => 'mic',
        'description' => 'Convert your speech to text messages for easy communication when typing is difficult',
        'gradient_start' => '#0EABEF',
        'gradient_end' => '#086289',
        'actions' => [
            [
                'id' => '9ea403bf-8a90-4f15-baad-ae747d839c82',
                'inputs' => [
                    'message' => 'Hello, how are you?',
                    'recipient' => 'John Doe',
                ],
            ],
        ],
    ]);

    $user5 = User::create([
        'first_name' => 'James',
        // 'middle_name' => 'M.',
        'last_name' => 'Wilson',
        'email' => 'james@gmail.com',
        'password' => Hash::make('password123'),
    ]);
    $user5->assignRole($userRole);
    $this->createShortcut([
        'userId' => $user5->id,
        'name' => 'Order Groceries/Essentials',
        'icon' => 'cart.fill',
        'androidIcon' => 'cart',
        'description' => 'Quickly order essential items and groceries from nearby stores for home delivery',
        'gradient_start' => '#19CCDF',
        'gradient_end' => '#0E6F79',
        'actions' => [
            [
                'id' => '9ea403bf-888d-4205-85f3-578b7d30e218',
                'inputs' => [
                    'items' => ['Milk', 'Bread', 'Eggs'],
                    'deliveryAddress' => '123 Main St, Cityville',
                ],
            ],
        ],
    ]);

    $user6 = User::create([
        'first_name' => 'Maria',
        // 'middle_name' => 'M.',
        'last_name' => 'Garcia',
        'email' => 'maria@gmail.com',
        'password' => Hash::make('password123'),
    ]);
    $user6->assignRole($userRole);
    $this->createShortcut([
        'userId' => $user6->id,
        'name' => 'Call for Transportation',
        'icon' => 'car.fill',
        'androidIcon' => 'car',
        'description' => 'Request a ride or transportation service to help you get to your destination',
        'gradient_start' => '#37DF19',
        'gradient_end' => '#1E790E',
        'actions' => [
            [
                'id' => '9ea403bf-884f-4b96-8663-e6d860a0e337',
                'inputs' => [
                    'pickupLocation' => 'Current location',
                    'destination' => 'Airport',
                ],
            ],
        ],
    ]);
}

protected function createShortcut($data) {
    try {
        $shortcutMaxOrder = Shortcut::where('user_id', $data['userId'])->max('order') ?? 0;
        $shortcut = Shortcut::create([
            'user_id' => $data['userId'],
            'order' => $shortcutMaxOrder + 1,
            'name' => $data['name'],
            'icon' => $data['icon'],
            'android_icon' => $data['androidIcon'],
            'description' => $data['description'],
            'gradient_start' => $data['gradient_start'],
            'gradient_end' => $data['gradient_end'],
        ]);

        foreach($data['actions'] as $action) {
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
                'user_id' => $data['userId'],
                'action_id' => $actionData->id,
                'shortcut_id' => $shortcut->id,
                'inputs' => $validationResult['validated_inputs'],
            ]);
        }

        info("Shortcut created for user ID: " . $data['userId']);
       
    } catch (\Exception $e) {
        info("Error creating shortcut for user ID: " . $data['userId'] . " - " . $e->getMessage());
    }
}

protected function createAutomation($data) {
        try {

            $userAutomation = UserAutomation::create([
                'title' => $data['title'],
                'user_id' => $data['userId'],
                'automation_condition_id' => $data['automationConditionId'],
            ]);

            foreach($data['shortcuts'] as $shortcut) {
                $userShortcut = Shortcut::where('name', $shortcut['shortcutName'])
                ->where('user_id', $data['userId'])
                ->first();

                UserAutomationShortcut::create([
                    'order' => $shortcut['order'],
                    'user_automation_id' => $userAutomation->id,
                    'shortcut_id' => $userShortcut->id,
                ]);
            }

            info("User Automation created for user ID: " . $data['userId']);

        } catch (\Exception $e) {
            info("Error creating User Automation for user ID: " . $data['userId'] . " - " . $e->getMessage());
        }
}


}
