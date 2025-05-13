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
                'emoji' => 'icons/emotion.svg',
                'name' => 'Happy',
                'description' => 'Smiling, etc.',
                'type' => 'emotion',
            ],
            [
                'emoji' => 'icons/emotion.svg',
                'name' => 'Sad',
                'description' => 'Frowning, etc.',
                'type' => 'emotion',
            ],
            [
                'emoji' => 'icons/emotion.svg',
                'name' => 'Scared',
                'description' => 'Trembling, etc.',
                'type' => 'emotion',
            ],
            [
                'emoji' => 'icons/emotion.svg',
                'name' => 'Surprised',
                'description' => 'In Shock, etc.',
                'type' => 'emotion',
            ],

            // Time
            [
                'emoji' => 'icons/time.svg',
                'name' => 'Morning',
                'description' => 'Triggers based on time of day',
                'type' => 'time',
            ],
            [
                'id' => '9ee65ac7-fe7b-4e29-8c4b-2918e11c4533',
                'emoji' => 'icons/time.svg',
                'name' => 'Afternoon',
                'description' => 'Triggers based on time of day',
                'type' => 'time',
            ],
            [
                'emoji' => 'icons/time.svg',
                'name' => 'Evening',
                'description' => 'Triggers based on time of day',
                'type' => 'time',
            ],
            [
                'emoji' => 'icons/time.svg',
                'name' => 'Custom',
                'description' => 'Triggers based on time of day',
                'type' => 'time',
            ],

            // Device
            [
                'emoji' => 'icons/device.svg',
                'name' => 'Battery Low',
                'description' => 'Triggers based on device status',
                'type' => 'device',
            ],
            [
                'id' => '9ee65ac8-0008-4b79-ae25-1366f842d097',
                'emoji' => 'icons/device.svg',
                'name' => 'Wifi & Browse',
                'description' => 'Triggers based on device status',
                'type' => 'device',
            ],
            [
                'emoji' => 'icons/device.svg',
                'name' => 'Bluetooth',
                'description' => 'Triggers based on device status',
                'type' => 'device',
            ],
            [
                'emoji' => 'icons/device.svg',
                'name' => 'Smart Watch',
                'description' => 'Triggers based on device status',
                'type' => 'device',
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
