<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryActionSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'id'         => '9ea3e8b8-2cf7-4a9d-bc4e-18405615c0f9',
                'name'       => 'Device Actions',
                'image'      => 'device',
                'icon'       => 'icons/device.svg',
                'actions'    => [
                    [
                        'id'            => '9ea3e8b8-2df3-493f-8edd-18f6eb2de8e6',
                        'name'          => 'Call Number',
                        'icon'          => 'phone.fill',
                        'androidIcon'   => 'call',
                        'gradientStart' => '#B874E3',
                        'gradientEnd'   => '#65407D',
                        'inputs'        => [
                            [
                                'key'      => 'phoneNumber',
                                'label'    => 'Phone Number',
                                'type'     => 'text',
                                'default'  => '911',
                                'required' => true,
                            ],
                            [
                                'key'      => 'message',
                                'label'    => 'Message',
                                'type'     => 'text',
                                'default'  => 'Need immediate assistance!',
                                'required' => false,
                            ],
                        ],
                    ],
                    [
                        'id'            => '9ea3e8b8-2ef4-44b1-a58e-60f8af05f473',
                        'name'          => 'Send Message',
                        'icon'          => 'message.fill',
                        'androidIcon'   => 'chatbubble-ellipses',
                        'gradientStart' => '#0EABEF',
                        'gradientEnd'   => '#086289',
                        'inputs'        => [
                            [
                                'key'   => 'recipient',
                                'label' => 'Recipient',
                                'type'  => 'text',
                            ],
                            [
                                'key'   => 'message',
                                'label' => 'Message',
                                'type'  => 'text',
                            ],
                        ],
                    ],
                    [
                        'id'            => '9ea3e8b8-2eb1-4f52-ab16-f5c863a459ee',
                        'name'          => 'Open App',
                        'icon'          => 'app.fill',
                        'androidIcon'   => 'apps',
                        'gradientStart' => '#53D769',
                        'gradientEnd'   => '#2F7A3B',
                        'inputs'        => [
                            [
                                'key'   => 'appName',
                                'label' => 'App Name',
                                'type'  => 'text',
                            ],
                        ],
                    ],
                    [
                        // 'id' => 'd4',
                        'name'          => 'Set Brightness',
                        'icon'          => 'sun.max.fill',
                        'androidIcon'   => 'sunny',
                        'gradientStart' => '#FFCC00',
                        'gradientEnd'   => '#997A00',
                        'inputs'        => [[
                            'key'     => 'brightnessLevel',
                            'label'   => 'Brightness Level',
                            'type'    => 'slider',
                            'min'     => 0,
                            'max'     => 100,
                            'default' => 50,
                        ]],
                    ],
                    [
                        // 'id' => 'd5',
                        'key'           => 'toggleFlashlight',
                        'name'          => 'Copy to Clipboard',
                        'icon'          => 'doc.on.doc',
                        'androidIcon'   => 'documents-sharp',
                        'gradientStart' => '#FF3B30',
                        'gradientEnd'   => '#992420',
                        'inputs'        => [[
                            'key'     => 'text',
                            'label'   => 'Text',
                            'type'    => 'text',
                            'default' => '',
                        ]],
                    ],
                    // Existing unique device actions
                    [
                        'id'            => '9ea3e8b8-2e6c-4cce-8fc8-580cffdcf013',
                        'name'          => 'Lock Phone',
                        'icon'          => 'test/test-icon.svg',
                        'androidIcon'   => null,
                        'gradientStart' => '#8E8E93',
                        'gradientEnd'   => '#555558',
                        'inputs'        => [],
                    ],
                    [
                        'id'            => '9ea3e8b8-2f35-48f1-9006-e20576a2a460',
                        'name'          => 'Check Reminders',
                        'icon'          => 'test/test-icon.svg',
                        'androidIcon'   => null,
                        'gradientStart' => '#FFCC00',
                        'gradientEnd'   => '#997A00',
                        'inputs'        => [[
                            'key'     => 'timeRange',
                            'label'   => 'Time Range',
                            'type'    => 'select',
                            'options' => ['Today', 'This Week', 'All'],
                        ]],
                    ],
                    [
                        'id'            => '9ea403bf-878c-4470-b514-af22633a0ff4',
                        'name'          => 'Medication Reminder',
                        'icon'          => 'test/test-icon.svg',
                        'androidIcon'   => null,
                        'gradientStart' => '#FF2D55',
                        'gradientEnd'   => '#991B33',
                        'inputs'        => [
                            [
                                'key'      => 'medicationName',
                                'label'    => 'Medication Name',
                                'type'     => 'text',
                                'default'  => '',
                                'required' => true,
                            ],
                            [
                                'key'      => 'dosage',
                                'label'    => 'Dosage',
                                'type'     => 'text',
                                'default'  => '',
                                'required' => true,
                            ],
                            [
                                'key'      => 'time',
                                'label'    => 'Time',
                                'type'     => 'text',  // changed from 'time'
                                'default'  => '08:00',
                                'required' => true,
                            ],
                        ],
                    ],
                    [
                        'id'            => '9ea3e8b8-2f78-4d6a-94e7-daa94dc556b4',
                        'name'          => 'Check Heart Rate',
                        'icon'          => 'test/test-icon.svg',
                        'androidIcon'   => null,
                        'gradientStart' => '#FF3B30',
                        'gradientEnd'   => '#992420',
                        'inputs'        => [],
                    ],
                    [
                        'id'            => '9ea403bf-8810-4983-b96d-eb13d493c14d',
                        'name'          => 'Navigate to Location',
                        'icon'          => 'test/test-icon.svg',
                        'androidIcon'   => null,
                        'gradientStart' => '#5AC8FA',
                        'gradientEnd'   => '#367896',
                        'inputs'        => [
                            [
                                'key'      => 'location',
                                'label'    => 'Location',
                                'type'     => 'text',
                                'default'  => 'Nearest doctor',
                                'required' => true,
                            ],
                            [
                                'key'      => 'mode',
                                'label'    => 'Mode',
                                'type'     => 'select',
                                'options'  => ['driving', 'walking', 'transit'],
                                'default'  => 'driving',
                                'required' => false,
                            ],
                        ],
                    ],
                    [
                        'id'            => '9ea403bf-884f-4b96-8663-e6d860a0e337',
                        'name'          => 'Call Transportation',
                        'icon'          => 'test/test-icon.svg',
                        'androidIcon'   => null,
                        'gradientStart' => '#007AFF',
                        'gradientEnd'   => '#004999',
                        'inputs'        => [
                            [
                                'key'      => 'pickupLocation',
                                'label'    => 'Pickup Location',
                                'type'     => 'text',
                                'default'  => 'Current location',
                                'required' => true,
                            ],
                            [
                                'key'      => 'destination',
                                'label'    => 'Destination',
                                'type'     => 'text',
                                'default'  => '',
                                'required' => true,
                            ],
                        ],
                    ],
                    [
                        'id'            => '9ea403bf-888d-4205-85f3-578b7d30e218',
                        'name'          => 'Order Essentials',
                        'icon'          => 'test/test-icon.svg',
                        'androidIcon'   => null,
                        'gradientStart' => '#4CD964',
                        'gradientEnd'   => '#2E823C',
                        'inputs'        => [
                            [
                                'key'      => 'items',
                                'label'    => 'Items',
                                'type'     => 'text',  // changed from 'array'
                                'default'  => [],
                                'required' => true,
                            ],
                            [
                                'key'      => 'deliveryAddress',
                                'label'    => 'Delivery Address',
                                'type'     => 'text',
                                'default'  => '',
                                'required' => true,
                            ],
                        ],
                    ],
                ],
            ],
            [
                // 'id' => 'connectivity',
                'name'    => 'Connectivity',
                'image'   => 'connectivity',
                'actions' => [
                    [
                        // 'id'            => 'c1',
                        'name'          => 'Toggle WiFi',
                        'icon'          => 'wifi',
                        'androidIcon'   => 'wifi',
                        'gradientStart' => '#34AADC',
                        'gradientEnd'   => '#1F6583',
                        'inputs'        => [],
                    ],
                    [
                        // 'id'            => 'c2',
                        'name'          => 'Toggle Bluetooth',
                        'icon'          => 'antenna.radiowaves.left.and.right',
                        'androidIcon'   => 'bluetooth',
                        'gradientStart' => '#007AFF',
                        'gradientEnd'   => '#004999',
                        'inputs'        => [],
                    ],
                    [
                        // 'id'            => 'c3',
                        'name'          => 'Toggle Airplane Mode',
                        'icon'          => 'airplane',
                        'androidIcon'   => 'airplane',
                        'gradientStart' => '#FF9500',
                        'gradientEnd'   => '#995900',
                        'inputs'        => [],
                    ],
                ],
            ],            
            [
                // 'id' => 'media',
                'name'        => 'Media',
                'image'       => 'media',
                'actions'     => [
                    [
                        // 'id' => 'm1',
                        'name'          => 'Play Sound',
                        'icon'          => 'speaker.wave.3.fill',
                        'androidIcon'   => 'play-circle-sharp',
                        'gradientStart' => '#AF52DE',
                        'gradientEnd'   => '#683286',
                        'inputs'        => [
                            [
                                'key'       => 'soundFile',
                                'label'     => 'Sound File',
                                'type'      => 'file',       // allowed
                                'fileTypes' => ['mp3', 'wav'],
                            ],
                        ],
                    ],
                    [
                        // 'id' => 'm2',
                        'name'          => 'Get Recent Photo',
                        'icon'          => 'photo.fill',
                        'androidIcon'   => 'camera',
                        'gradientStart' => '#64D2FF',
                        'gradientEnd'   => '#3C7E99',
                        'inputs'        => [],         // no inputs
                    ],
                    [
                        // 'id' => 'm3',
                        'name'          => 'Record Audio',
                        'icon'          => 'mic.fill',
                        'androidIcon'   => 'mic',
                        'gradientStart' => '#FF2D55',
                        'gradientEnd'   => '#991B33',
                        'inputs'        => [
                            [
                                'key'     => 'duration',
                                'label'   => 'Duration (seconds)',
                                'type'    => 'number',     // allowed
                                'default' => 10,
                            ],
                        ],
                    ],
                    [
                        // 'id' => 'm4',
                        'name'          => 'Set Volume',
                        'icon'          => 'speaker.wave.2.fill',
                        'androidIcon'   => 'volume-high',
                        'gradientStart' => '#FF9500',
                        'gradientEnd'   => '#995900',
                        'inputs'        => [
                            [
                                'key'     => 'volumeLevel',
                                'label'   => 'Volume Level',
                                'type'    => 'slider',     // allowed
                                'min'     => 0,
                                'max'     => 100,
                                'default' => 50,
                            ],
                        ],
                    ],
                ],
            ],            
            [
                // 'id' => 'location',
                'name'        => 'Location',
                'image'       => 'location',
                'actions'     => [
                    [
                        // 'id' => 'l1',
                        'name'          => 'Get Current Location',
                        'icon'          => 'location.fill',
                        'androidIcon'   => 'location',
                        'gradientStart' => '#4CD964',
                        'gradientEnd'   => '#2E823C',
                        'inputs'        => [],
                    ],
                    [
                        // 'id' => 'l2',
                        'name'          => 'Open Maps',
                        'icon'          => 'map.fill',
                        'androidIcon'   => 'map',
                        'gradientStart' => '#FF3B30',
                        'gradientEnd'   => '#992420',
                        'inputs'        => [
                            [
                                'key'   => 'location',
                                'label' => 'Location',
                                'type'  => 'text',
                            ],
                        ],
                    ],
                    [
                        // 'id' => 'l3',
                        'name'          => 'Get Distance Between',
                        'icon'          => 'arrow.triangle.swap',
                        'androidIcon'   => 'git-compare-sharp',
                        'gradientStart' => '#5AC8FA',
                        'gradientEnd'   => '#367896',
                        'inputs'        => [
                            [
                                'key'   => 'startLocation',
                                'label' => 'Start Location',
                                'type'  => 'text',
                            ],
                            [
                                'key'   => 'endLocation',
                                'label' => 'End Location',
                                'type'  => 'text',
                            ],
                        ],
                    ],
                    [
                        // 'id' => 'l4',
                        'name'          => 'Get Weather',
                        'icon'          => 'cloud.sun.fill',
                        'androidIcon'   => 'cloudy-night',
                        'gradientStart' => '#007AFF',
                        'gradientEnd'   => '#004999',
                        'inputs'        => [
                            [
                                'key'     => 'location',
                                'label'   => 'Location',
                                'type'    => 'text',   // added to conform
                                'default' => 'Current',
                            ],
                        ],
                    ],
                ],
            ],
            [
                // 'id' => 'data',
                'name' => 'Data',
                'image' => 'category-bg/data.jpg',
                'icon' => 'icons/data.svg',
                'actions' => [
                    [
                        // 'id' => 'da1',
                        'name' => 'Get Clipboard',
                        'icon' => 'doc.on.clipboard',
                        'androidIcon' => 'document',
                        'gradientStart' => '#8E8E93',
                        'gradientEnd' => '#555558',
                        'inputs' => [],
                    ],
                    [
                        // 'id' => 'da2',
                        'name' => 'Set Clipboard',
                        'icon' => 'clipboard.fill',
                        'androidIcon' => 'clipboard',
                        'gradientStart' => '#FF9500',
                        'gradientEnd' => '#995900',
                        'inputs' => [
                            ['name' => 'Text'],
                        ],
                    ],
                    [
                        // 'id' => 'da3',
                        'name' => 'Get Battery Level',
                        'icon' => 'battery.100',
                        'androidIcon' => 'battery-full',
                        'gradientStart' => '#4CD964',
                        'gradientEnd' => '#2E823C',
                        'inputs' => [],
                    ],
                    [
                        // 'id' => 'da4',
                        'name' => 'Generate QR Code',
                        'icon' => 'qrcode',
                        'androidIcon' => 'qr-code',
                        'gradientStart' => '#5856D6',
                        'gradientEnd' => '#353480',
                        'inputs' => [
                            ['name' => 'Content'],
                        ],
                    ],
                ],
            ],                           
            [
                'id'    => '9ea3e8b8-2fb8-4143-a217-3a98b15de4aa',
                'name'  => 'AI Assistant',
                'image' => 'ai',
                'actions' => [
                    [
                        'id'            => '9ea3e8b8-2ff6-4438-af78-06fbdbf9eb9d',
                        'name'          => 'Describe Surroundings',
                        'icon'          => 'test/test-icon.svg',
                        'androidIcon'   => null,
                        'gradientStart' => '#32D74B',
                        'gradientEnd'   => '#1E8A2D',
                        'inputs'        => [[
                            'key'     => 'detailLevel',
                            'label'   => 'Detail Level',
                            'type'    => 'select',
                            'options' => ['Basic', 'Detailed'],
                        ]],
                    ],
                    [
                        'id'            => '9ea3e8b8-3034-4ad0-90c9-60006cfe4979',
                        'name'          => 'Translate Sign Language',
                        'icon'          => 'test/test-icon.svg',
                        'androidIcon'   => null,
                        'gradientStart' => '#BF5AF2',
                        'gradientEnd'   => '#733291',
                        'inputs'        => [[
                            'key'       => 'videoInput',
                            'label'     => 'Video Input',
                            'type'      => 'file',
                            'fileTypes' => ['mp4', 'mov'],
                        ]],
                    ],
                    [
                        'id'            => '9ea3e8b8-3071-410e-b77c-987612162a5b',
                        'name'          => 'Generate Visual Instructions',
                        'icon'          => 'test/test-icon.svg',
                        'androidIcon'   => null,
                        'gradientStart' => '#0A84FF',
                        'gradientEnd'   => '#064F99',
                        'inputs'        => [[
                            'key'       => 'taskDescription',
                            'label'     => 'Task Description',
                            'type'      => 'text',
                            'multiline' => true,
                        ]],
                    ],
                    [
                        'id'            => '9ea3e8b8-30af-4397-a3bb-e2580b81fd96',
                        'name'          => 'Predict Next Behavior',
                        'icon'          => 'test/test-icon.svg',
                        'androidIcon'   => null,
                        'gradientStart' => '#FF9F0A',
                        'gradientEnd'   => '#995F06',
                        'inputs'        => [[
                            'key'       => 'context',
                            'label'     => 'Context',
                            'type'      => 'text',
                            'multiline' => true,
                        ]],
                    ],
                    [
                        'id'            => '9ea3e8b8-30ec-438e-9a8d-f964c7129ecc',
                        'name'          => 'Simplify Complex Text',
                        'icon'          => 'test/test-icon.svg',
                        'androidIcon'   => null,
                        'gradientStart' => '#30B0C7',
                        'gradientEnd'   => '#1D6B77',
                        'inputs'        => [[
                            'key'       => 'textInput',
                            'label'     => 'Text Input',
                            'type'      => 'text',
                            'multiline' => true,
                        ]],
                    ],
                    [
                        'id'            => '9ea3e8b8-313b-4302-b31c-92e302c812f4',
                        'name'          => 'Assist with Voice',
                        'icon'          => 'test/test-icon.svg',
                        'androidIcon'   => null,
                        'gradientStart' => '#FF9500',
                        'gradientEnd'   => '#995900',
                        'inputs'        => [[
                            'key'       => 'voiceCommand',
                            'label'     => 'Voice Command',
                            'type'      => 'file',        // changed from 'audio'
                            'fileTypes' => ['wav', 'm4a'],
                        ]],
                    ],
                    [
                        'id'            => '9ea403bf-8a90-4f15-baad-ae747d839c82',
                        'name'          => 'Voice to Text Message',
                        'icon'          => 'test/test-icon.svg',
                        'androidIcon'   => null,
                        'gradientStart' => '#5856D6',
                        'gradientEnd'   => '#AF52DE',
                        'inputs'        => [
                            [
                                'key'      => 'recipient',
                                'label'    => 'Recipient',
                                'type'     => 'text',
                                'default'  => '',
                                'required' => true,
                            ],
                            [
                                'key'       => 'message',
                                'label'     => 'Message',
                                'type'      => 'text',
                                'default'   => 'Hello, how are you?',
                                'required'  => false,
                                'multiline' => true,
                            ],
                        ],
                    ],
                    [
                        // 'id' => 'ai1',
                        'name'          => 'Text Completion',
                        'icon'          => 'text.bubble.fill',
                        'androidIcon'   => 'chatbox',
                        'gradientStart' => '#32D74B',
                        'gradientEnd'   => '#1E8A2D',
                        'inputs'        => [
                            [
                                'key'       => 'prompt',
                                'label'     => 'Prompt',
                                'type'      => 'text',
                                'multiline' => true,
                            ],
                            [
                                'key'     => 'length',
                                'label'   => 'Length',
                                'type'    => 'select',
                                'options' => ['Short', 'Medium', 'Long'],
                            ],
                        ],
                    ],
                    [
                        // 'id' => 'ai2',
                        'name'          => 'Summarize Text',
                        'icon'          => 'doc.text.magnifyingglass',
                        'androidIcon'   => 'file-tray-full',
                        'gradientStart' => '#0A84FF',
                        'gradientEnd'   => '#064F99',
                        'inputs'        => [
                            [
                                'key'       => 'prompt',
                                'label'     => 'Prompt',
                                'type'      => 'text',
                                'multiline' => true,
                            ],
                            [
                                'key'     => 'length',
                                'label'   => 'Length',
                                'type'    => 'select',
                                'options' => ['Short', 'Medium', 'Long'],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Summarize Text',
                        'icon' => 'doc.text.magnifyingglass',
                        'androidIcon' => 'file-tray-full',
                        'gradientStart' => '#0A84FF',
                        'gradientEnd' => '#064F99',
                        'inputs' => [
                            [
                                'key' => 'text',
                                'label' => 'Text',
                                'type' => 'text',
                                'multiline' => true,
                            ],
                        ],
                    ],
                    [
                        'name' => 'Image Description',
                        'icon' => 'photo.fill.on.rectangle.fill',
                        'androidIcon' => 'reader',
                        'gradientStart' => '#BF5AF2',
                        'gradientEnd' => '#733291',
                        'inputs' => [
                            [
                                'key' => 'image',
                                'label' => 'Image',
                                'type' => 'file',
                                'fileTypes' => ['jpg', 'png', 'heic'],
                            ],
                        ]
                    ],
                    [
                        'name' => 'Sentiment Analysis',
                        'icon' => 'face.smiling',
                        'androidIcon' => 'happy',
                        'gradientStart' => '#FF375F',
                        'gradientEnd' => '#992139',
                        'inputs' => [
                            [
                                'key' => 'text',
                                'label' => 'Text',
                                'type' => 'text',
                                'multiline' => true,
                            ],
                        ]
                    ],
                    [
                        'name' => 'Language Translation',
                        'icon' => 'globe',
                        'androidIcon' => 'language',
                        'gradientStart' => '#30B0C7',
                        'gradientEnd' => '#1D6B77',
                        'inputs' => [
                            [
                                'key' => 'text',
                                'label' => 'Text',
                                'type' => 'text',
                                'multiline' => true,
                            ],
                            [
                                'key' => 'targetLanguage',
                                'label' => 'Target Language',
                                'type' => 'select',
                                'options' => [
                                    'English',
                                    'Spanish',
                                    'French',
                                    'German',
                                    'Japanese',
                                    'Chinese',
                                    ],
                            ]
                        ]
                    ],
                    [
                        'name' => 'Voice Recognition',
                        'icon' => 'waveform',
                        'androidIcon' => 'mic-circle',
                        'gradientStart' => '#FF9F0A',
                        'gradientEnd' => '#995F06',
                        'inputs' => [
                            [
                                'key' => 'audio',
                                'label' => 'Audio',
                                'type' => 'file',
                                'fileTypes' => ['mp3', 'wav', 'm4a'],
                            ]
                        ]
                    ]
                ],
            ],            
            [
                // 'id'   => 'web',
                'name'       => 'Web & Sharing',
                'image'      => 'web',
                'actions'    => [
                    [
                        // 'id'            => 'w1',
                        'name'          => 'Open URL',
                        'icon'          => 'safari',
                        'androidIcon'   => 'globe',
                        'gradientStart' => '#FF2D55',
                        'gradientEnd'   => '#991B33',
                        'inputs'        => [
                            [
                                'key'   => 'url',
                                'label' => 'URL',
                                'type'  => 'text',
                            ],
                        ],
                    ],
                    [
                        // 'id'            => 'w2',
                        'name'          => 'Fetch Web Content',
                        'icon'          => 'arrow.down.doc',
                        'androidIcon'   => 'download',
                        'gradientStart' => '#007AFF',
                        'gradientEnd'   => '#004999',
                        'inputs'        => [
                            [
                                'key'   => 'url',
                                'label' => 'URL',
                                'type'  => 'text',
                            ],
                        ],
                    ],
                    [
                        // 'id'            => 'w3',
                        'name'          => 'Share via',
                        'icon'          => 'square.and.arrow.up',
                        'androidIcon'   => 'share',
                        'gradientStart' => '#5AC8FA',
                        'gradientEnd'   => '#367896',
                        'inputs'        => [
                            [
                                'key'   => 'content',
                                'label' => 'Content',
                                'type'  => 'text',
                            ],
                            [
                                'key'     => 'app',
                                'label'   => 'App',
                                'type'    => 'select',
                                'options' => ['System Share', 'Messages', 'Mail', 'Twitter', 'Facebook'],
                            ],
                        ],
                    ],
                    [
                        // 'id'            => 'w4',
                        'name'          => 'Post to Social Media',
                        'icon'          => 'network',
                        'androidIcon'   => 'share-social',
                        'gradientStart' => '#FF9500',
                        'gradientEnd'   => '#995900',
                        'inputs'        => [
                            [
                                'key'     => 'platform',
                                'label'   => 'Platform',
                                'type'    => 'select',
                                'options' => ['Twitter', 'Facebook', 'Instagram'],
                            ],
                            [
                                'key'       => 'content',
                                'label'     => 'Content',
                                'type'      => 'text',
                                'multiline' => true,
                            ],
                            [
                                'key'       => 'media',
                                'label'     => 'Media (Optional)',
                                'type'      => 'file',
                                'fileTypes' => ['jpg', 'png', 'mp4'],
                                'required'  => false,
                            ],
                        ],
                    ],
                ],
            ],            
            [
                'id'    => '9eadbc35-40c6-4356-989d-5ec15fa9890f',
                'name'  => 'Government Services',
                'image' => 'government',
                'icon'  => 'icons/government.svg',
                'actions' => [
                    [
                        'id'            => '9eadbc35-412b-41a2-b2ff-7a53316a5119',
                        'name'          => 'PWD ID Application',
                        'icon'          => 'person.crop.circle.badge.checkmark',
                        'gradientStart' => '#FF6B6B',
                        'gradientEnd'   => '#FF8E8E',
                        'inputs'        => [
                            [
                                'key'      => 'full_name',
                                'label'    => 'Full Name',
                                'type'     => 'text',
                                'required' => true,
                            ],
                            [
                                'key'      => 'disability_type',
                                'label'    => 'Disability Type',
                                'type'     => 'select',
                                'options'  => ['Physical', 'Visual', 'Hearing', 'Intellectual', 'Psychosocial'],
                                'required' => true,
                            ],
                            [
                                'key'      => 'contact_number',
                                'label'    => 'Contact Number',
                                'type'     => 'text',
                                'required' => true,
                            ],
                        ],
                    ],
                    [
                        'id'            => '9eadbc35-419e-484e-ac77-aabff6734b60',
                        'name'          => 'Vaccination Scheduling',
                        'icon'          => 'syringe',
                        'gradientStart' => '#6C63FF',
                        'gradientEnd'   => '#574FCC',
                        'inputs'        => [
                            [
                                'key'      => 'vaccine_type',
                                'label'    => 'Vaccine Type',
                                'type'     => 'select',
                                'options'  => ['COVID-19', 'Flu', 'Hepatitis B', 'MMR'],
                                'required' => true,
                            ],
                            [
                                'key'      => 'preferred_date',
                                'label'    => 'Preferred Date',
                                'type'     => 'text',  // changed from 'date'
                                'required' => true,
                            ],
                            [
                                'key'      => 'health_condition',
                                'label'    => 'Health Condition',
                                'type'     => 'text',
                                'required' => false,
                            ],
                        ],
                    ],
                    [
                        'id'            => '9eadbc35-420e-4bc5-ae05-86f182e10eca',
                        'name'          => 'Social Program Registration',
                        'icon'          => 'person.3.fill',
                        'gradientStart' => '#6C63FF',
                        'gradientEnd'   => '#574FCC',
                        'inputs'        => [
                            [
                                'key'      => 'program_type',
                                'label'    => 'Program Type',
                                'type'     => 'select',
                                'options'  => ['4Ps', 'Social Pension', 'Food Aid', 'Crisis Assistance', 'Employment Assistance'],
                                'required' => true,
                            ],
                            [
                                'key'      => 'family_members',
                                'label'    => 'Family Members',
                                'type'     => 'number',
                                'min'      => 1,
                                'max'      => 10,
                                'required' => true,
                            ],
                            [
                                'key'      => 'monthly_income',
                                'label'    => 'Monthly Income',
                                'type'     => 'number',
                                'required' => true,
                            ],
                        ],
                    ],
                    [
                        'id'            => '9eadbc35-4282-4b36-9380-1770d09a6b7e',
                        'name'          => 'Digital Service Request',
                        'icon'          => 'wifi',
                        'gradientStart' => '#6C63FF',
                        'gradientEnd'   => '#574FCC',
                        'inputs'        => [
                            [
                                'key'      => 'service_type',
                                'label'    => 'Service Type',
                                'type'     => 'select',
                                'options'  => ['Free WiFi', 'Digital Training', 'E-Government', 'Tech Support', 'Drug Price Check'],
                                'required' => true,
                            ],
                            [
                                'key'      => 'location',
                                'label'    => 'Location',
                                'type'     => 'text',
                                'required' => true,
                            ],
                        ],
                    ],
                    [
                        'id'            => '9eadbc35-42f2-4d7b-accd-02dadc242f4a',
                        'name'          => 'Assistive Device Application',
                        'icon'          => 'accessibility',
                        'gradientStart' => '#96CEB4',
                        'gradientEnd'   => '#7AB59B',
                        'inputs'        => [
                            [
                                'key'      => 'device_type',
                                'label'    => 'Device Needed',
                                'type'     => 'select',
                                'options'  => ['Wheelchair', 'Hearing Aid', 'Visual Aid', 'Prosthetic'],
                                'required' => true,
                            ],
                            [
                                'key'      => 'medical_certificate',
                                'label'    => 'Medical Certificate Required',
                                'type'     => 'select',  // changed from 'checkbox'
                                'options'  => [true, false],
                                'required' => true,
                            ],
                        ],
                    ],
                    [
                        'id'            => '9eadbc35-435f-4b72-b52f-2abc5ee1c838',
                        'name'          => 'Medical Assistance Request',
                        'icon'          => 'cross.case.fill',
                        'gradientStart' => '#FF6B6B',
                        'gradientEnd'   => '#FF8E8E',
                        'inputs'        => [
                            [
                                'key'      => 'assistance_type',
                                'label'    => 'Assistance Type',
                                'type'     => 'select',
                                'options'  => ['Financial Aid', 'Medication', 'Hospital Bill', 'Checkup'],
                                'required' => true,
                            ],
                            [
                                'key'      => 'amount_needed',
                                'label'    => 'Estimated Amount',
                                'type'     => 'number',
                                'required' => false,
                            ],
                        ],
                    ],
                    [
                        'id'            => '9eadbc35-43ca-403b-8ff6-75d4f6967017',
                        'name'          => 'Health Facility Locator',
                        'icon'          => 'building.2.fill',
                        'gradientStart' => '#4ECDC4',
                        'gradientEnd'   => '#45B7AC',
                        'inputs'        => [
                            [
                                'key'      => 'facility_type',
                                'label'    => 'Facility Type',
                                'type'     => 'select',
                                'options'  => ['Hospital', 'Clinic', 'Health Center', 'Specialist'],
                                'required' => true,
                            ],
                            [
                                'key'      => 'current_location',
                                'label'    => 'Current Location',
                                'type'     => 'text',
                                'required' => false,
                            ],
                        ],
                    ],
                    [
                        'id'            => '9eadbc35-4439-4465-921c-3ed2effa4607',
                        'name'          => 'Crisis Assistance',
                        'icon'          => 'exclamationmark.triangle.fill',
                        'gradientStart' => '#FF6B6B',
                        'gradientEnd'   => '#FF8E8E',
                        'inputs'        => [
                            [
                                'key'      => 'crisis_type',
                                'label'    => 'Crisis Type',
                                'type'     => 'select',
                                'options'  => ['Domestic', 'Financial', 'Health', 'Natural Disaster'],
                                'required' => true,
                            ],
                            [
                                'key'      => 'urgency_level',
                                'label'    => 'Urgency Level',
                                'type'     => 'select',
                                'options'  => ['Low', 'Medium', 'High', 'Emergency'],
                                'required' => true,
                            ],
                        ],
                    ],
                ],
            ],
            
        ];

        foreach ($categories as $categoryData) {
            // Handle category ID
            $categoryId = $categoryData['id'] ?? Str::orderedUuid()->toString();
            
            $category = Category::updateOrCreate(
                ['id' => $categoryId], 
                [
                    'name' => $categoryData['name'],
                    'image_key' => $categoryData['image'],
                    'icon' => $categoryData['icon'] ?? null
                ]
            );
        
            foreach ($categoryData['actions'] as $actionData) {
                // Handle action ID
                $actionId = $actionData['id'] ?? Str::orderedUuid()->toString();
                
                $category->actions()->updateOrCreate(
                    ['id' => $actionId], 
                    [
                        'name' => $actionData['name'],
                        'icon' => $actionData['icon'],
                        'android_icon' => $actionData['androidIcon'] ?? null,
                        'gradient_start' => $actionData['gradientStart'] ?? null,
                        'gradient_end' => $actionData['gradientEnd'] ?? null,
                        'inputs' => isset($actionData['inputs']) ? json_encode($actionData['inputs']) : null
                    ]
                );
            }
        }
    }
}