# Services Routes

## Index Endpoint

```typescript
{{base_url}}/service | Method: GET
```

### Sample Response

```typescript
{
    "message": "Services fetched successfully",
    "services": [
        {
            "id": "9eb97eca-27e8-49db-81e3-ee6becdd88a6",
            "name": "NCDA",
            "description": "The National Council on Disability Affairs (NCDA) is the government agency mandated to formulate policies and coordinate the activities of all agencies concerning disability issues and concerns.",
            "websiteLink": "https://www.ncda.gov.ph",
            "image": "services/NCDA.png",
            "shortcuts": [
                {
                    "id": "9eb97eca-2a5a-48b6-806d-4214292ecfdf",
                    "user": {
                        "id": "9eb97ec8-1033-450d-ad08-6b31a069fb1d",
                        "first_name": "Service Admin",
                        "middle_name": null,
                        "last_name": null,
                        "email": "service-admin@example.com",
                        "email_verified_at": null,
                        "created_at": "2025-04-21T00:28:51.000000Z",
                        "updated_at": "2025-04-21T00:28:51.000000Z"
                    },
                    "name": "Assistive Device Support",
                    "icon": "accessibility",
                    "description": "Apply for assistive technology devices",
                    "gradientStart": "#96CEB4",
                    "gradientEnd": "#7AB59B",
                    "steps": [
                        {
                            "id": "9eb97eca-2af7-4dd0-9cc1-d0210c10907b",
                            "order": 1,
                            "inputs": {
                                "deviceType": "Wheelchair",
                                "medicalCertificate": true
                            },
                            "actionId": "9eadbc35-42f2-4d7b-accd-02dadc242f4a",
                            "actionName": "Assistive Device Application"
                        }
                    ]
                },
                {
                    "id": "9eb97eca-2b48-4865-90c6-23958d0c9a09",
                    "user": {
                        "id": "9eb97ec8-1033-450d-ad08-6b31a069fb1d",
                        "first_name": "Service Admin",
                        "middle_name": null,
                        "last_name": null,
                        "email": "service-admin@example.com",
                        "email_verified_at": null,
                        "created_at": "2025-04-21T00:28:51.000000Z",
                        "updated_at": "2025-04-21T00:28:51.000000Z"
                    },
                    "name": "Employment Assistance",
                    "icon": "briefcase.fill",
                    "description": "Access employment opportunities for PWDs",
                    "gradientStart": "#FF9F9F",
                    "gradientEnd": "#FF8787",
                    "steps": [
                        {
                            "id": "9eb97eca-2c31-4392-9880-33e2feeaaeea",
                            "order": 1,
                            "inputs": {
                                "programType": "Employment Assistance",
                                "familyMembers": 3,
                                "monthlyIncome": 8000
                            },
                            "actionId": "9eadbc35-420e-4bc5-ae05-86f182e10eca",
                            "actionName": "Social Program Registration"
                        }
                    ]
                }
            ]
        }
    ]
}
```

## Store Endpoint

```typescript
{{base_url}}/service | Method: POST
```

### Sample Payload

```typescript
{
    "name": "NCDA",
    "description": "The National Council on Disability Affairs (NCDA) is the government agency mandated to formulate policies and coordinate the activities of all agencies concerning disability issues and concerns.",
    "websiteLink": "https://www.ncda.gov.ph",
    "image": "@/assets/images/services/NCDA.png",
    "shortcuts": [
        {
        "name": "PWD ID Application",
        "description": "Apply for Person with Disability Identification Card",
        "icon": "person.crop.circle.badge.checkmark",
        "gradientStart": "#FF6B6B",
        "gradientEnd": "#FF8E8E"
        },
        {
        "name": "Disability Certification",
        "description": "Request for disability certification and assessment",
        "icon": "doc.text.fill",
        "gradientStart": "#4ECDC4",
        "gradientEnd": "#45B7AC"
        },
        {
        "name": "Assistive Device Support",
        "description": "Apply for assistive technology devices",
        "icon": "accessibility",
        "gradientStart": "#96CEB4",
        "gradientEnd": "#7AB59B"
        }
    ]
}
```

### Sample Response

```typescript
{
    "message": "Service created successfully"
}
```
