<?php

namespace Database\Seeders;

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
                'emoji' => 'icons/device.svg',
                'name' => 'Wifi',
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
            AutomationCondition::create([
                'emoji' => $conditionData['emoji'],
                'name' => $conditionData['name'],
                'description' => $conditionData['description'],
                'type' => $conditionData['type'],
            ]);
        }
    }
}
