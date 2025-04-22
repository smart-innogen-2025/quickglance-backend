# Shortcut Routes

## Public Shortcuts Endpoint

```typescript
{{baseurl}}/shortcut | Method: GET
```

### Sample Response

```typescript
{
    "shortcuts": [
        {
            "id": "9ea5a727-7f45-494d-9274-885a178c8705",
            "name": "Navigate to Doctor",
            "icon": "stethoscope",
            "description": "Get directions to the nearest doctor or medical facility in your area",
            "gradientStart": "#19CCDF",
            "gradientEnd": "#0E6F79",
            "steps": [
                {
                    "id": "9ea5a727-8071-4292-b145-3380c3f6aace",
                    "order": 1,
                    "inputs": {
                        "mode": "driving",
                        "location": "Nearest doctor"
                    },
                    "actionId": "9ea403bf-8810-4983-b96d-eb13d493c14d",
                    "actionName": "Navigate to Location"
                }
            ],
            "userName": "Alex M. Camaddo"
        },
        {
            "id": "9ea5a727-dbfb-413b-8323-27afbb5a9479",
            "name": "Medication Reminder",
            "icon": "pills.fill",
            "description": "Set up reminders for taking medications on time and track your medication schedule",
            "gradientStart": "#E5BC09",
            "gradientEnd": "#7F6805",
            "steps": [
                {
                    "id": "9ea5a727-dcfb-4558-9fd7-25a44038e9f0",
                    "order": 1,
                    "inputs": {
                        "time": "08:00 AM",
                        "dosage": "500mg",
                        "medicationName": "Aspirin"
                    },
                    "actionId": "9ea403bf-878c-4470-b514-af22633a0ff4",
                    "actionName": "Medication Reminder"
                }
            ],
            "userName": "Robert Chen"
        }
    ]
}
```

---

## Personal Shortcuts Endpoint

```typescript
{{baseurl}}/shortcut/personal | Method: GET
```

### Sample Response

```typescript
{
    "shortcuts": [
        {
            "id": "9ebc3b98-301d-4772-8ba6-c6025e660024",
            "order": 1,
            "name": "Tests",
            "icon": "assets/icon/test",
            "description": "Test description",
            "gradientStart": "#0E6F79",
            "gradientEnd": "#19CCDF",
            "steps": [
                {
                    "id": "9ebc3c18-26e8-42ad-a007-8aec996686df",
                    "order": 1,
                    "inputs": {
                        "message": "Need immediate assistance!",
                        "phoneNumber": "91112"
                    },
                    "actionId": "9ea3e8b8-2df3-493f-8edd-18f6eb2de8e6",
                    "actionName": "Call Number"
                }
            ],
            "userName": "Mel Mathew Palana"
        }
    ]
}
```

---

## Store Endpoint

```typescript
{{baseurl}}/shortcut | Method: POST
```

### Sample Payload

```typescript
{
    "name": "Test",
    "actions": [
        {
            "id": "9ea3e8b8-2df3-493f-8edd-18f6eb2de8e6",
            "inputs": "{\"phoneNumber\": \"911\", \"message\": \"Need immediate assistance!\"}"
        },
        {
            "id": "9ea403bf-8810-4983-b96d-eb13d493c14d",
            "inputs": "{\"location\": \"Nearest doctor\", \"mode\": \"driving\"}"
        },
        {
            "id": "9ea403bf-878c-4470-b514-af22633a0ff4",
            "inputs": "{\"medicationName\": \"Aspirin\", \"dosage\": \"500mg\", , \"time\": \"08:00 AM\"}"
        }
    ],
    "icon": "icon/test",
    "description": "test description",
    "gradientStart": "#19CCDF",
    "gradientEnd": "#0E6F79"
}
```

### Sample Response

```typescript
{
    message: "Shortcut created successfully.";
}
```

---

## Edit Endpoint

```typescript
{{base_url}}/shortcut/edit/${id} | Method: GET
```

### Sample Response

```typescript
{
    "shortcut": {
        "id": "9eb97ec8-6656-4657-814d-52f334d2cfb9",
        "serviceId": null,
        "name": "Call Emergency Services",
        "icon": "cross.case.fill",
        "description": "Quickly dial emergency services",
        "gradientStart": "#FF2D55",
        "gradientEnd": "#991B33",
        "userAction": [
            {
                "id": "9eb9cd48-308e-4061-9130-28152a4fab81",
                "order": 1,
                "inputs": {
                    "message": "Need immediate assistance!",
                    "phoneNumber": "91112"
                }
            },
            {
                "id": "9eb9cd48-3374-4e1a-a433-44937e60bb9e",
                "order": 2,
                "inputs": {
                    "time": "04:00",
                    "dosage": "500mg",
                    "medicationName": "Aspirin"
                }
            }
        ],
        "user": {
            "id": "9eb97ec8-64f4-4be7-9e27-5189b1e6d209",
            "firstName": "Mel Mathew",
            "middleName": null,
            "lastName": "Palana"
        },
        "categoryActions": [
            {
                "id": "9ea3e8b8-2df3-493f-8edd-18f6eb2de8e6",
                "categoryId": "9ea3e8b8-2cf7-4a9d-bc4e-18405615c0f9",
                "name": "Call Number",
                "icon": "phone.fill",
                "gradientStart": "#B874E3",
                "gradientEnd": "#65407D",
                "inputs": "[{\"key\": \"phoneNumber\", \"type\": \"text\", \"label\": \"Phone Number\", \"default\": \"911\", \"required\": true}, {\"key\": \"message\", \"type\": \"text\", \"label\": \"Message\", \"default\": \"Need immediate assistance!\", \"required\": false}]"
            },
            {
                "id": "9ea3e8b8-2ef4-44b1-a58e-60f8af05f473",
                "categoryId": "9ea3e8b8-2cf7-4a9d-bc4e-18405615c0f9",
                "name": "Send Message",
                "icon": "message.fill",
                "gradientStart": "#0EABEF",
                "gradientEnd": "#086289",
                "inputs": "[{\"key\": \"recipient\", \"type\": \"text\", \"label\": \"Recipient\"}, {\"key\": \"message\", \"type\": \"text\", \"label\": \"Message\"}]"
            }
        ]
    }
}
```

---

## Update Endpoint

```typescript
{{base_url}}/shortcut/${id} | Method: PUT
```

### Sample Payload

```typescript
{
    "actions": [
        {
            "id": "9ea3e8b8-2df3-493f-8edd-18f6eb2de8e6",
            "inputs": "{\"phoneNumber\": \"91112\", \"message\": \"Need immediate assistance!\"}"
        },
        {
            "id": "9ea403bf-8810-4983-b96d-eb13d493c14d",
            "inputs": "{\"location\": \"Nearest doctors\", \"mode\": \"driving\"}"
        },
        {
            "id": "9ea403bf-878c-4470-b514-af22633a0ff4",
            "inputs": "{\"medicationName\": \"Aspirin\", \"dosage\": \"500mg\", \"time\": \"04:00\"}"
        }
    ]
}
```

```typescript
{
    "message": "Shortcut updated successfully."
}
```

---

## Destroy Endpoint

```typescript
{{baseurl}}/shortcut/${id} | Method: DELETE
```

### Sample Response

```typescript
{
    message: "Shortcut deleted successfully.";
}
```
