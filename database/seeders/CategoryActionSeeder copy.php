<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
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
                'id' => '9ea3e8b8-2cf7-4a9d-bc4e-18405615c0f9',
                'name' => 'Device',
                'icon' => 'icons/device.svg',
                'image' => 'category-bg/device.jpg',
                'actions' => [
                    [
                        'id' => '9ea3e8b8-2df3-493f-8edd-18f6eb2de8e6',
                        'name' => 'Call Number',
                        'icon' => 'phone.fill',
                    ],
                    [
                        'id' => '9ea3e8b8-2e6c-4cce-8fc8-580cffdcf013',
                        'name' => 'Lock Phone',
                        'icon' => 'test/test-icon.svg',
                    ],
                    [
                        // 'id' => '9ea3e8b8-2e6c-4cce-8fc8-580cffdcf013',
                        'name' => 'Set Brightness',
                        'icon' => 'sun.max.fill',
                    ],
                    [
                        'id' => '9ea3e8b8-2eb1-4f52-ab16-f5c863a459ee',
                        'name' => 'Open App',
                        'icon' => 'app.fill',
                    ],
                    [
                        'id' => '9ea3e8b8-2ef4-44b1-a58e-60f8af05f473',
                        'name' => 'Send Message',
                        'icon' => 'message.fill',
                    ],
                    [
                        'id' => '9ea3e8b8-2f35-48f1-9006-e20576a2a460',
                        'name' => 'Check Reminders',
                        'icon' => 'test/test-icon.svg',
                    ],
                    [
                        // 'id' => '9ea3e8b8-2f35-48f1-9006-e20576a2a460',
                        'name' => 'Copy to Clipboard',
                        'icon' => 'doc.on.doc',
                    ],
                    [
                        'id' => '9ea403bf-878c-4470-b514-af22633a0ff4',
                        'name' => 'Medication Reminder',
                        'icon' => 'test/test-icon.svg',
                    ],
                    [
                        'id' => '9ea3e8b8-2f78-4d6a-94e7-daa94dc556b4',
                        'name' => 'Check Heart Rate',
                        'icon' => 'test/test-icon.svg',
                    ],
                    [
                        'id' => '9ea403bf-8810-4983-b96d-eb13d493c14d',
                        'name' => 'Navigate to Location',
                        'icon' => 'test/test-icon.svg',
                    ],
                    [
                        'id' => '9ea403bf-884f-4b96-8663-e6d860a0e337',
                        'name' => 'Call Transportation',
                        'icon' => 'test/test-icon.svg',
                    ],
                    [
                        'id' => '9ea403bf-888d-4205-85f3-578b7d30e218',
                        'name' => 'Order Essentials',
                        'icon' => 'test/test-icon.svg',
                    ],
                ],
            ],
            [
                'id' => '9ea3e8b8-2fb8-4143-a217-3a98b15de4aa',
                'name' => 'AI Assistant',
                'icon' => 'icons/ai.svg',
                'image' => 'category-bg/ai.jpg',
                'actions' => [
                    [
                        'id' => '9ea3e8b8-2ff6-4438-af78-06fbdbf9eb9d',
                        'name' => 'Describe Surroundings',
                        'icon' => 'test/test-icon.svg',
                    ],
                    [
                        'id' => '9ea3e8b8-3034-4ad0-90c9-60006cfe4979',
                        'name' => 'Translate Sign Language',
                        'icon' => 'test/test-icon.svg',
                    ],
                    [
                        'id' => '9ea3e8b8-3071-410e-b77c-987612162a5b',
                        'name' => 'Generate Visual Instructions',
                        'icon' => 'test/test-icon.svg',
                    ],
                    [
                        'id' => '9ea3e8b8-30af-4397-a3bb-e2580b81fd96',
                        'name' => 'Predict Next Behavior',
                        'icon' => 'test/test-icon.svg',
                    ],
                    [
                        'id' => '9ea3e8b8-30ec-438e-9a8d-f964c7129ecc',
                        'name' => 'Simplify Complex Text',
                        'icon' => 'test/test-icon.svg',
                    ],
                    [
                        'id' => '9ea3e8b8-313b-4302-b31c-92e302c812f4',
                        'name' => 'Assist with Voice',
                        'icon' => 'test/test-icon.svg',
                    ],
                    [
                        'id' => '9ea403bf-8a90-4f15-baad-ae747d839c82',
                        'name' => 'Voice to Text Message',
                        'icon' => 'test/test-icon.svg',
                        'inputs' => [
                            'message' => 'Hello, how are you?',
                            'recipient' => 'John Doe',
                        ]
                    ],
                    [
                        // 'id' => '9ea403bf-8a90-4f15-baad-ae747d839c82',
                        'name' => 'Text Completion',
                        'icon' => 'text.bubble.fill',
                    ],
                ],
            ],
            [
                'name' => 'Connectivity',
                'icon' => 'icons/ai.svg',
                'image' => 'category-bg/ai.jpg',
                'actions' => [
                    [
                        'id' => '9ea3e8b8-2ff6-4438-af78-06fbdbf9eb9d',
                        'name' => 'Describe Surroundings',
                        'icon' => 'test/test-icon.svg',
                    ]
                ],
            ],
            [
                'name' => 'Connectivity',
                'icon' => 'icons/ai.svg',
                'bgImage' => 'category-bg/ai.jpg',
                'actions' => [
                    [
                        'id' => '9ea3e8b8-2ff6-4438-af78-06fbdbf9eb9d',
                        'name' => 'Describe Surroundings',
                        'icon' => 'test/test-icon.svg',
                    ]
                ],
            ],
            [
                'name' => 'Connectivity',
                'icon' => 'icons/ai.svg',
                'bgImage' => 'category-bg/ai.jpg',
                'actions' => [
                    [
                        'id' => '9ea3e8b8-2ff6-4438-af78-06fbdbf9eb9d',
                        'name' => 'Describe Surroundings',
                        'icon' => 'test/test-icon.svg',
                    ]
                ],
            ],
            [
                'name' => 'Connectivity',
                'icon' => 'icons/ai.svg',
                'bgImage' => 'category-bg/ai.jpg',
                'actions' => [
                    [
                        'id' => '9ea3e8b8-2ff6-4438-af78-06fbdbf9eb9d',
                        'name' => 'Describe Surroundings',
                        'icon' => 'test/test-icon.svg',
                    ]
                ],
            ],
            [
                'name' => 'Connectivity',
                'icon' => 'icons/ai.svg',
                'bgImage' => 'category-bg/ai.jpg',
                'actions' => [
                    [
                        'id' => '9ea3e8b8-2ff6-4438-af78-06fbdbf9eb9d',
                        'name' => 'Describe Surroundings',
                        'icon' => 'test/test-icon.svg',
                    ]
                ],
            ],
        ];

        // Iterate over categories and create them with their associated actions
        foreach ($categories as $categoryData) {
            // Create the category
            $category = Category::create([
                'id' => $categoryData['id'] ?? Str::orderedUuid()->toString(),
                'name' => $categoryData['name'],
                'icon' => $categoryData['icon'],
                'bgImage' => $categoryData['bgImage'],
            ]);

            // Create the associated actions
            foreach ($categoryData['actions'] as $actionData) {
                $category->actions()->create([
                    'id' => $actionData['id'] ?? Str::orderedUuid()->toString(),
                    'name' => $actionData['name'],
                    'icon' => $actionData['icon'],
                ]);
            }
        }
    }
}
