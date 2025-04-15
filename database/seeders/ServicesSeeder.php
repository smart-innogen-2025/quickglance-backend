<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\Shortcut;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Models\{User, Action, UserAction};

class ServicesSeeder extends Seeder
{
    public function run()
    {
        $serviceUser = User::where('first_name', 'Service Admin')->first();

        $services = [
            [
                'name' => 'NCDA',
                'description' => 'The National Council on Disability Affairs (NCDA) is the government agency mandated to formulate policies and coordinate the activities of all agencies concerning disability issues and concerns.',
                'website_link' => 'https://www.ncda.gov.ph',
                'image' => 'services/NCDA.png',
                'shortcuts' => [
                    [
                        'name' => 'PWD ID Application',
                        'description' => 'Apply for Person with Disability Identification Card',
                        'icon' => 'person.crop.circle.badge.checkmark',
                        'gradient_start' => '#FF6B6B',
                        'gradient_end' => '#FF8E8E',
                        'actions' => [
                            [
                                'action_id' => '9eadbc35-412b-41a2-b2ff-7a53316a5119',
                                'inputs' => [
                                    'full_name' => 'Juan Dela Cruz',
                                    'disability_type' => 'Physical',
                                    'contact_number' => '09123456789'
                                ]
                            ]
                        ]
                    ],
                    [
                        'name' => 'Disability Certification',
                        'description' => 'Request for disability certification and assessment',
                        'icon' => 'doc.text.fill',
                        'gradient_start' => '#4ECDC4',
                        'gradient_end' => '#45B7AC',
                        'actions' => [
                            [
                                'action_id' => '9eadbc35-412b-41a2-b2ff-7a53316a5119',
                                'inputs' => [
                                    'full_name' => 'Maria Santos',
                                    'disability_type' => 'Visual',
                                    'contact_number' => '09223344556'
                                ]
                            ]
                        ]
                    ],
                    [
                        'name' => 'Assistive Device Support',
                        'description' => 'Apply for assistive technology devices',
                        'icon' => 'accessibility',
                        'gradient_start' => '#96CEB4',
                        'gradient_end' => '#7AB59B',
                        'actions' => [
                            [
                                'action_id' => '9eadbc35-42f2-4d7b-accd-02dadc242f4a',
                                'inputs' => [
                                    'device_type' => 'Wheelchair',
                                    'medical_certificate' => true
                                ]
                            ]
                        ]
                    ],
                    [
                        'name' => 'Employment Assistance',
                        'description' => 'Access employment opportunities for PWDs',
                        'icon' => 'briefcase.fill',
                        'gradient_start' => '#FF9F9F',
                        'gradient_end' => '#FF8787',
                        'actions' => [
                            [
                                'action_id' => '9eadbc35-420e-4bc5-ae05-86f182e10eca',
                                'inputs' => [
                                    'program_type' => 'Employment Assistance',
                                    'family_members' => 3,
                                    'monthly_income' => 8000
                                ]
                            ]
                        ]
                    ]
                ]
            ],
            [
                'name' => 'DOH',
                'description' => 'The Department of Health (DOH) is the principal health agency in the Philippines responsible for ensuring access to basic public health services by all Filipinos.',
                'website_link' => 'https://doh.gov.ph',
                'image' => 'services/DOH.png',
                'shortcuts' => [
                    [
                        'name' => 'Vaccination Schedule',
                        'description' => 'Check and schedule vaccination appointments',
                        'icon' => 'syringe',
                        'gradient_start' => '#6C63FF',
                        'gradient_end' => '#574FCC',
                        'actions' => [
                            [
                                'action_id' => '9eadbc35-419e-484e-ac77-aabff6734b60',
                                'inputs' => [
                                    'vaccine_type' => 'COVID-19',
                                    'preferred_date' => '2023-12-15',
                                    'health_condition' => 'None'
                                ]
                            ]
                        ]
                    ],
                    [
                        'name' => 'Medical Assistance',
                        'description' => 'Apply for medical financial assistance',
                        'icon' => 'cross.case.fill',
                        'gradient_start' => '#FF6B6B',
                        'gradient_end' => '#FF8E8E',
                        'actions' => [
                            [
                                'action_id' => '9eadbc35-435f-4b72-b52f-2abc5ee1c838',
                                'inputs' => [
                                    'assistance_type' => 'Hospital Bill',
                                    'amount_needed' => 15000
                                ]
                            ]
                        ]
                    ],
                    [
                        'name' => 'Health Facility Finder',
                        'description' => 'Locate nearest health facilities',
                        'icon' => 'building.2.fill',
                        'gradient_start' => '#4ECDC4',
                        'gradient_end' => '#45B7AC',
                        'actions' => [
                            [
                                'action_id' => '9eadbc35-43ca-403b-8ff6-75d4f6967017',
                                'inputs' => [
                                    'facility_type' => 'Hospital',
                                    'current_location' => 'Quezon City'
                                ]
                            ]
                        ]
                    ],
                    [
                        'name' => 'Drug Price Inquiry',
                        'description' => 'Check medication prices and availability',
                        'icon' => 'pills.fill',
                        'gradient_start' => '#FFD93D',
                        'gradient_end' => '#FFB302',
                        'actions' => [
                            [
                                'action_id' => '9eadbc35-4282-4b36-9380-1770d09a6b7e',
                                'inputs' => [
                                    'service_type' => 'Drug Price Check',
                                    'location' => 'Manila'
                                ]
                            ]
                        ]
                    ]
                ]
            ],
            [
                'name' => 'DSWD',
                'description' => 'The Department of Social Welfare and Development (DSWD) is the primary government agency mandated to develop, implement and coordinate social protection and poverty-reduction solutions for and with the poor, vulnerable and disadvantaged.',
                'website_link' => 'https://www.dswd.gov.ph',
                'image' => 'services/DSWD.png',
                'shortcuts' => [
                    [
                        'name' => '4Ps Registration',
                        'description' => 'Register for Pantawid Pamilyang Pilipino Program',
                        'icon' => 'person.3.fill',
                        'gradient_start' => '#6C63FF',
                        'gradient_end' => '#574FCC',
                        'actions' => [
                            [
                                'action_id' => '9eadbc35-420e-4bc5-ae05-86f182e10eca',
                                'inputs' => [
                                    'program_type' => '4Ps',
                                    'family_members' => 4,
                                    'monthly_income' => 5000
                                ]
                            ]
                        ]
                    ],
                    [
                        'name' => 'Food Aid',
                        'description' => 'Request food assistance program',
                        'icon' => 'cart.fill',
                        'gradient_start' => '#FFD93D',
                        'gradient_end' => '#FFB302',
                        'actions' => [
                            [
                                'action_id' => '9eadbc35-420e-4bc5-ae05-86f182e10eca',
                                'inputs' => [
                                    'program_type' => 'Food Aid',
                                    'family_members' => 3,
                                    'monthly_income' => 6000
                                ]
                            ]
                        ]
                    ],
                    [
                        'name' => 'Crisis Intervention',
                        'description' => 'Get help during crisis situations',
                        'icon' => 'exclamationmark.triangle.fill',
                        'gradient_start' => '#FF6B6B',
                        'gradient_end' => '#FF8E8E',
                        'actions' => [
                            [
                                'action_id' => '9eadbc35-4439-4465-921c-3ed2effa4607',
                                'inputs' => [
                                    'crisis_type' => 'Financial',
                                    'urgency_level' => 'High'
                                ]
                            ]
                        ]
                    ]
                ]
            ],
            [
                'name' => 'DICT',
                'description' => 'The Department of Information and Communications Technology (DICT) is the executive department responsible for the planning, development, and promotion of the country\'s ICT agenda.',
                'website_link' => 'https://dict.gov.ph',
                'image' => 'services/DICT.png',
                'shortcuts' => [
                    [
                        'name' => 'Free WiFi Access',
                        'description' => 'Register for free public WiFi service',
                        'icon' => 'wifi',
                        'gradient_start' => '#6C63FF',
                        'gradient_end' => '#574FCC',
                        'actions' => [
                            [
                                'action_id' => '9eadbc35-4282-4b36-9380-1770d09a6b7e',
                                'inputs' => [
                                    'service_type' => 'Free WiFi',
                                    'location' => 'Barangay Hall'
                                ]
                            ]
                        ]
                    ],
                    [
                        'name' => 'Digital Skills',
                        'description' => 'Access free digital literacy training',
                        'icon' => 'graduationcap.fill',
                        'gradient_start' => '#4ECDC4',
                        'gradient_end' => '#45B7AC',
                        'actions' => [
                            [
                                'action_id' => '9eadbc35-4282-4b36-9380-1770d09a6b7e',
                                'inputs' => [
                                    'service_type' => 'Digital Training',
                                    'location' => 'Community Center'
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ];
        

        foreach ($services as $serviceData) {
            $service = Service::create([
                'id' => Str::orderedUuid()->toString(),
                'name' => $serviceData['name'],
                'description' => $serviceData['description'],
                'website_link' => $serviceData['website_link'],
                'image' => $serviceData['image'],
            ]);

            foreach ($serviceData['shortcuts'] as $shortcutData) {
                $shortcut = Shortcut::create([
                    'id' => Str::orderedUuid()->toString(),
                    'user_id' => $serviceUser->id,
                    'service_id' => $service->id,
                    'name' => $shortcutData['name'],
                    'description' => $shortcutData['description'],
                    'icon' => $shortcutData['icon'],
                    'gradient_start' => $shortcutData['gradient_start'],
                    'gradient_end' => $shortcutData['gradient_end'],
                ]);

                foreach ($shortcutData['actions'] as $actionId) {
                    $action = Action::find($actionId['action_id']);

                    if (!$action) {
                        info("Action not found: " . $actionId['action_id']);
                        continue;
                    }

                    // Validate inputs against action definition
                    $validationResult = validateActionInputs(
                        $action->inputs, 
                        $actionId['inputs'] ?? []
                    );

                    if ($validationResult !== true) {
                        info("Validation failed for action: " . $actionId['action_id']);
                        continue;
                    }
                    
                    $order = UserAction::where('shortcut_id', $shortcut->id)->max('order') ?? 0;

                    // Create the user action
                    UserAction::create([
                        'order' => $order + 1,
                        'user_id' => $serviceUser->id,
                        'shortcut_id' => $shortcut->id,
                        'action_id' => $action->id,
                        'inputs' => json_encode($actionId['inputs']),
                    ]);
                }

                // Create the user action for the shortcut
                // Assuming you have a UserAction model and it has a relationship with Shortcut
                // You can adjust this part based on your actual implementation
                // UserAction::create([...]);
            }
        }
    }
}