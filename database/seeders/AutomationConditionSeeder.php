<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AutomationCondition;

class AutomationConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $conditions = [
            // Emotion
            [
                'id' => '9ee5da75-b09b-4f44-a356-71f4f6f1503a',
                'emoji' => '😄',
                'name' => 'Happy',
                'description' => 'Smiling, etc.',
                'type' => 'emotion',
            ],
            [
                'emoji' => '😢',
                'name' => 'Sad',
                'description' => 'Frowning, etc.',
                'type' => 'emotion',
            ],
            [
                'emoji' => '😱',
                'name' => 'Scared',
                'description' => 'Trembled, etc.',
                'type' => 'emotion',
            ],
            [
                'emoji' => '😲',
                'name' => 'Surprised',
                'description' => 'Eyes wide open, etc.',
                'type' => 'emotion',
            ],

            // Time
            [
                'emoji' => '🌅',
                'name' => 'Morning',
                'description' => '6 AM - 12 PM',
                'type' => 'time',
            ],
            [
                'id' => '9ee65ac7-fe7b-4e29-8c4b-2918e11c4533',
                'emoji' => '🌞',
                'name' => 'Afternoon',
                'description' => '12 PM - 6 PM',
                'type' => 'time',
            ],
            [
                'emoji' => '🌇',
                'name' => 'Evening',
                'description' => '6 PM - 12 AM',
                'type' => 'time',
            ],
            [
                'emoji' => '🌙',
                'name' => 'Night',
                'description' => '12 AM - 6 AM',
                'type' => 'time',
            ],

            // Device
            [
                'emoji' => '🔋',
                'name' => 'Battery low',
                'description' => 'Less than 20%',
                'type' => 'device',
            ],
            [
                'id' => '9ee65ac8-0008-4b79-ae25-1366f842d097',
                'emoji' => '📶',
                'name' => 'Wifi & Browse',
                'description' => 'Triggers based on device status',
                'type' => 'device',
            ],
            [
                'emoji' => '⚡',
                'name' => 'Charging',
                'description' => 'Device is charging',
                'type' => 'device',
            ],
            [
                'emoji' => '❌',
                'name' => 'Not charging',
                'description' => 'Device is not charging',
                'type' => 'device',
            ],
            
            // Location
            [
                'emoji' => '🏠',
                'name' => 'Home',
                'description' => 'At home',
                'type' => 'location',
            ],
            [
                'emoji' => '💼',
                'name' => 'Work',
                'description' => 'At work',
                'type' => 'location',
            ],
            [
                'emoji' => '🏋️',
                'name' => 'Gym',
                'description' => 'At the gym',
                'type' => 'location',
            ],
            [
                'emoji' => '🌳',
                'name' => 'Park',
                'description' => 'At the park',
                'type' => 'location',
            ],
        ];

        // Iterate over categories and create them with their associated actions
        foreach ($conditions as $conditionData) {
            // Create the automation condition
            $automationConditionId = $conditionData['id'] ?? Str::orderedUuid()->toString();

            AutomationCondition::updateOrCreate(
                ['id' => $automationConditionId],
                [
                'emoji' => $conditionData['emoji'],
                'name' => $conditionData['name'],
                'description' => $conditionData['description'],
                'type' => $conditionData['type'],
            ]);
        }
    }
}
