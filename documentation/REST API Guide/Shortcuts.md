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
            "id": "9ea408af-6a52-4def-a0fa-b656211df15e",
            "name": "Medication Reminder",
            "icon": "pills.fill",
            "description": "Set up reminders for taking medications on time and track your medication schedule",
            "gradientStart": "#FF2D55",
            "gradientEnd": "#991B33",
            "steps": [
                {
                    "id": "9ea408af-6c2e-41e4-889a-31ba87fb9af7",
                    "order": 1,
                    "inputs": {
                        "message": "Need immediate assistance!",
                        "phoneNumber": "911"
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
