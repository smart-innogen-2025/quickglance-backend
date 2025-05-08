<?php

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
                    'mobileKey'    => 'd1',
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
                    'mobileKey'    => 'd2',
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
                    'mobileKey'    => 'd3',
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
                    'id' => '9ed7f012-9fd4-46cb-8079-a074e6faf680',
                    'mobileKey'    => 'd4',
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
                    'id' => '9ed7f012-a21b-4c9d-a056-fe6149c40c2a',
                    'mobileKey'    => 'd5',
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
            ]
        ],
        [
            // 'id' => 'connectivity',
            'name'    => 'Connectivity',
            'image'   => 'connectivity',
            'actions' => [
                [
                    'id'         => '9ed7f012-a638-4b1e-94a1-7110195a5aa6',
                    'mobileKey'    => 'c1',
                    'name'          => 'Toggle WiFi',
                    'icon'          => 'wifi',
                    'androidIcon'   => 'wifi',
                    'gradientStart' => '#34AADC',
                    'gradientEnd'   => '#1F6583',
                    'inputs'        => [],
                ],
                [
                    'id'         => '9ed7f012-a6a4-417d-8056-cdd08e9cb9f7',
                    'mobileKey'    => 'c2',
                    'name'          => 'Toggle Bluetooth',
                    'icon'          => 'antenna.radiowaves.left.and.right',
                    'androidIcon'   => 'bluetooth',
                    'gradientStart' => '#007AFF',
                    'gradientEnd'   => '#004999',
                    'inputs'        => [],
                ],
                [
                    'id'         => '9ed7f012-a710-45b4-9951-68829a51a14c',
                    'mobileKey'    => 'c3',
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
                    'id' => '9ed7f012-a7e0-4f4c-9d66-d69cfe3b86bd',
                    'mobileKey'    => 'm1',
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
                    'id' => '9ed7f012-a863-46f8-8f23-1018b900bae7',
                    'mobileKey'    => 'm2',
                    'name'          => 'Get Recent Photo',
                    'icon'          => 'photo.fill',
                    'androidIcon'   => 'camera',
                    'gradientStart' => '#64D2FF',
                    'gradientEnd'   => '#3C7E99',
                    'inputs'        => [],         // no inputs
                ],
                [
                    'id' => '9ed7f012-a8e9-4ad2-b1ac-2e12cde0a10d',
                    'mobileKey'    => 'm3',
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
                    'id' => '9ed7f012-a959-4871-b037-ba816446712a',
                    'mobileKey'    => 'm4',
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
                    'id' => '9ed7f012-aa27-4170-9529-07e4ecb6db4e',
                    'mobileKey'    => 'l1',
                    'name'          => 'Get Current Location',
                    'icon'          => 'location.fill',
                    'androidIcon'   => 'location',
                    'gradientStart' => '#4CD964',
                    'gradientEnd'   => '#2E823C',
                    'inputs'        => [],
                ],
                [
                    'id' => '9ed7f012-aa94-47a1-871a-a7b41af5e450',
                    'mobileKey'    => 'l2',
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
                    'id' => '9ed7f012-ab01-4c2e-bec9-8a5bfd9a3f15',
                    'mobileKey'    => 'l3',
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
                    'id' => '9ed7f012-ab82-4a70-ab70-85fca8dc2919',
                    'mobileKey'    => 'l4',
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
        ],[
            // 'id' => 'data',
            'name' => 'Data',
            'image' => 'data',
            'icon' => 'icons/data.svg',
            'actions' => [
                [
                    'id' => '9ed7f012-ac55-4a45-bf2e-fe17dd46aad3',
                    'mobileKey' => 'da1',
                    'name' => 'Get Clipboard',
                    'icon' => 'doc.on.clipboard',
                    'androidIcon' => 'document',
                    'gradientStart' => '#8E8E93',
                    'gradientEnd' => '#555558',
                    'inputs' => [],
                ],
                [
                    'id' => '9ed7f012-acc3-40ea-8a2d-19d724979b2a',
                    'mobileKey' => 'da2',
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
                    'id' => '9ed7f012-ad2f-4f43-85f6-101ba94c9132',
                    'mobileKey' => 'da3',
                    'name' => 'Get Battery Level',
                    'icon' => 'battery.100',
                    'androidIcon' => 'battery-full',
                    'gradientStart' => '#4CD964',
                    'gradientEnd' => '#2E823C',
                    'inputs' => [],
                ],
                [
                    'id' => '9ed7f012-ada1-48eb-a6ee-cff22ff5390b',
                    'mobileKey' => 'da4',
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
                    'id' => '9ed7f012-b1dd-4c45-be0d-69e3e840a6fe',
                    'mobileKey'    => 'ai1',
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
                    'id' => '9ed7f012-b24d-4e8c-9e00-a69ec0001f2b',
                    'mobileKey'    => 'ai2',
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
                    'id' => '9ed7f012-b2bc-4477-86bd-5cbe01149b4e',
                    'mobileKey' => 'ai3',
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
                    'id' => '9ed7f012-b32a-4538-af77-c908a7ba5beb',
                    'mobileKey' => 'ai4',
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
                    'id' => '9ed7f012-b397-45c3-a0f7-0d37cd5768e6',
                    'mobileKey' => 'ai5',
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
                    'id' => '9ed7f012-b405-4952-a757-7eb5980bab22',
                    'mobileKey' => 'ai6',
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
                    'id'            => '9ed7f012-b4de-4fbb-8de1-7b258fdc6688',
                    'mobileKey'    => 'w1',
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
                    'id'            => '9ed7f012-b571-4b41-8ab1-1a6d31a61aca',
                    'mobileKey'    => 'w2',
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
                    'id'            => '9ed7f012-b5fe-49b2-8c23-25e252d51f16',
                    'mobileKey'    => 'w3',
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
                    'id'            => '9ed7f012-b671-4993-a8ba-f0c58f86d648',
                    'mobileKey'    => 'w4',
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
    ];

    }
}