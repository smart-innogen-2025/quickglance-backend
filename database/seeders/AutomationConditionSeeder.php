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
                'emoji' => '🔌',
                'name' => 'Battery full',
                'description' => 'More than 80%',
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
            AutomationCondition::create([
                'emoji' => $conditionData['emoji'],
                'name' => $conditionData['name'],
                'description' => $conditionData['description'],
                'type' => $conditionData['type'],
            ]);
        }
    }
}
