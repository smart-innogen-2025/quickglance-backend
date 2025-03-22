<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Device',
                'icon' => 'icons/device.svg',
                'bgImage' => 'category-bg/device.jpg',
                'actions' => [
                    [
                        'name' => 'Call Number',
                        'icon' => 'test/test-icon.svg',
                    ],
                    [
                        'name' => 'Lock Phone',
                        'icon' => 'test/test-icon.svg',
                    ],
                    [
                        'name' => 'Open App',
                        'icon' => 'test/test-icon.svg',
                    ],
                    [
                        'name' => 'Send Message',
                        'icon' => 'test/test-icon.svg',
                    ],
                    [
                        'name' => 'Check Reminders',
                        'icon' => 'test/test-icon.svg',
                    ],
                    [
                        'name' => 'Check Heart Rate',
                        'icon' => 'test/test-icon.svg',
                    ],
                ],
            ],
            [
                'name' => 'Artificial Intelligence',
                'icon' => 'icons/ai.svg',
                'bgImage' => 'category-bg/ai.jpg',
                'actions' => [
                    [
                        'name' => 'Describe Surroundings',
                        'icon' => 'test/test-icon.svg',
                    ],
                    [
                        'name' => 'Translate Sign Language',
                        'icon' => 'test/test-icon.svg',
                    ],
                    [
                        'name' => 'Generate Visual Instructions',
                        'icon' => 'test/test-icon.svg',
                    ],
                    [
                        'name' => 'Predict Next Behavior',
                        'icon' => 'test/test-icon.svg',
                    ],
                    [
                        'name' => 'Simplify Complex Text',
                        'icon' => 'test/test-icon.svg',
                    ],
                    [
                        'name' => 'Assist with Voice',
                        'icon' => 'test/test-icon.svg',
                    ],
                ],
            ],
        ];

        // Iterate over categories and create them with their associated actions
        foreach ($categories as $categoryData) {
            // Create the category
            $category = Category::create([
                'name' => $categoryData['name'],
                'icon' => $categoryData['icon'],
                'bgImage' => $categoryData['bgImage'],
            ]);

            // Create the associated actions
            foreach ($categoryData['actions'] as $actionData) {
                $category->actions()->create([
                    'name' => $actionData['name'],
                    'icon' => $actionData['icon'],
                ]);
            }
        }
    }
}
