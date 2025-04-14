<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;

use App\Models\Shortcut,
    App\Models\Action,
    App\Models\UserAction;


class UserSeeder extends Seeder
{
    public function run()
{
    // Create Roles
    $superAdminRole = Role::create(['name' => 'super-admin']);
    $adminRole = Role::create(['name' => 'admin']);
    $userRole = Role::create(['name' => 'user']);

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

    $user1 = User::create([
        'first_name' => 'Mel Mathew',
        'last_name' => 'Palana',
        'email' => 'mel@gmail.com',
        'password' => Hash::make('password123'),
    ]);
    $user1->assignRole($userRole);
    $this->createShortcut([
        'user_id' => $user1->id,
        'name' => 'Call Emergency Services',
        'icon' => 'cross.case.fill',
        'description' => 'Quickly dial emergency services for immediate assistance in case of medical emergencies',
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
        ],
    ]);

    $user2 = User::create([
        'first_name' => 'Alex',
        'middle_name' => 'M.',
        'last_name' => 'Camaddo',
        'email' => 'alex@gmail.com',
        'password' => Hash::make('password123'),
    ]);
    $user2->assignRole($userRole);
    $this->createShortcut([
        'user_id' => $user2->id,
        'name' => 'Navigate to Doctor',
        'icon' => 'stethoscope',
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
        'user_id' => $user3->id,
        'name' => 'Medication Reminder',
        'icon' => 'pills.fill',
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
        'user_id' => $user4->id,
        'name' => 'Start voice-to-text message',
        'icon' => 'microphone.fill',
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
        'user_id' => $user5->id,
        'name' => 'Order Groceries/Essentials',
        'icon' => 'cart.fill',
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
        'user_id' => $user6->id,
        'name' => 'Call for Transportation',
        'icon' => 'car.fill',
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
        $shortcut = Shortcut::create([
            'user_id' => $data['user_id'],
            'name' => $data['name'],
            'icon' => $data['icon'],
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
                'user_id' => $data['user_id'],
                'action_id' => $actionData->id,
                'shortcut_id' => $shortcut->id,
                'inputs' => $validationResult['validated_inputs'],
            ]);
        }

        info("Shortcut created for user ID: " . $data['user_id']);
       
    } catch (\Exception $e) {
        info("Error creating shortcut for user ID: " . $data['user_id'] . " - " . $e->getMessage());
    }
}

}
