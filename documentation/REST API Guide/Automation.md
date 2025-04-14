# Automation Routes

## Index Endpoint

```typescript
{{baseurl}}/automation | Method: GET
```

### Sample Response

```typescript
[
    {
        id: "9eabe6c8-676f-44e9-a919-37b2854564c7",
        title: "When the user feels sad",
        icon: "asset/sademoji.svg",
        automation_condition_id: "9eab7130-4d1b-4ed4-81a8-07816e216d26",
        steps: [
            {
                id: "9eabe6c8-6ba0-4505-adf8-9b35ed80f306",
                order: 1,
                shortcut_id: "9eab7131-b0e6-44dc-b293-5edda45590cb",
                shortcutName: "Call Emergency Services",
            },
        ],
    },
];
```

---

## Create Endpoint

```typescript
{{baseurl}}/automation/create | Method: GET
```

### Sample Response

```typescript
{
    automationConditions: [
        {
            "id": "9eab7130-4d1b-4ed4-81a8-07816e216d26",
            "icon": "icons/emotion.svg",
            "name": "Happy",
            "description": "Smiling, etc.",
            "type": "emotion"
        },
        {
            "id": "9eab7130-4d8d-4fb5-8833-134670644a4d",
            "icon": "icons/emotion.svg",
            "name": "Sad",
            "description": "Frowning, etc.",
            "type": "emotion"
        },
        {
            "id": "9eab7130-4dd0-4114-ba24-fb78a11fa3b1",
            "icon": "icons/emotion.svg",
            "name": "Scared",
            "description": "Trembling, etc.",
            "type": "emotion"
        },
        {
            "id": "9eab7130-4e0d-4501-afdc-ef1741e40383",
            "icon": "icons/emotion.svg",
            "name": "Surprised",
            "description": "In Shock, etc.",
            "type": "emotion"
        }
    ],
    "userShortcuts": [
        {
            "id": "9eab7131-b0e6-44dc-b293-5edda45590cb",
            "name": "Call Emergency Services",
            "icon": "cross.case.fill",
            "description": "Quickly dial emergency services for immediate assistance in case of medical emergencies",
            "gradient_start": "#FF2D55",
            "gradient_end": "#991B33",
            "steps": [
                {
                    "id": "9eab7131-b2ab-4d46-ba4a-6cd755e13ddd",
                    "order": 1,
                    "inputs": {
                        "message": "Need immediate assistance!",
                        "phoneNumber": "911"
                    },
                    "action_id": "9ea3e8b8-2df3-493f-8edd-18f6eb2de8e6",
                    "actionName": "Call Number"
                }
            ]
        },
        {
            "id": "9eab71c4-3f9b-4817-9f93-14b326c0d29a",
            "name": "Test",
            "icon": "icon/test",
            "description": "test description",
            "gradient_start": "#19CCDF",
            "gradient_end": "#0E6F79",
            "steps": [
                {
                    "id": "9eab71c4-43fb-4e84-961d-1d78a6b6c103",
                    "order": 1,
                    "inputs": {
                        "message": "Need immediate assistance!",
                        "phoneNumber": "91112"
                    },
                    "action_id": "9ea3e8b8-2df3-493f-8edd-18f6eb2de8e6",
                    "actionName": "Call Number"
                },
                {
                    "id": "9eab71c4-4512-4c9c-8fbc-e00ceb06f854",
                    "order": 2,
                    "inputs": {
                        "mode": "driving",
                        "location": "Nearest doctor"
                    },
                    "action_id": "9ea403bf-8810-4983-b96d-eb13d493c14d",
                    "actionName": "Navigate to Location"
                }
            ]
        }
    ]
}
```

---

## Store Endpoint

```typescript
{{baseurl}}/automation | Method: POST
```

### Sample Payload

```typescript
{
    "title": "When the user feels sad",
    "icon": "asset/sademoji.svg",
    "automation_condition_id": "9eab7130-4d1b-4ed4-81a8-07816e216d26",
    "shortcuts": [
        {
            "order": 1,
            "id": "9eab7131-b0e6-44dc-b293-5edda45590cb"
        }
    ]

}
```

### Sample Response

```typescript
{
    message: "Automation created successfully";
}
```

---

## Edit Endpoint

```typescript
{{baseurl}}/automation/edit/{id} | Method: GET
```

### Sample Response

```typescript
{
    "id": "9eabe6c8-676f-44e9-a919-37b2854564c7",
    "title": "When the user feels sad",
    "icon": "asset/sademoji.svg",
    "user_id": "9eab7131-afc1-43d3-b15a-8c660f231cd7",
    "automation_condition_id": "9eab7130-4d1b-4ed4-81a8-07816e216d26",
    "user_automation_shortcut": [
        {
            "id": "9eabe6c8-6ba0-4505-adf8-9b35ed80f306",
            "order": 1,
            "user_automation_id": "9eabe6c8-676f-44e9-a919-37b2854564c7",
            "shortcut_id": "9eab7131-b0e6-44dc-b293-5edda45590cb",
            "created_at": "2025-04-14T06:18:04.000000Z",
            "updated_at": "2025-04-14T06:18:04.000000Z",
            "shortcut": {
                "id": "9eab7131-b0e6-44dc-b293-5edda45590cb",
                "name": "Call Emergency Services",
                "icon": "cross.case.fill",
                "gradient_start": "#FF2D55",
                "gradient_end": "#991B33"
            }
        }
    ],
    "automation_condition": {
        "id": "9eab7130-4d1b-4ed4-81a8-07816e216d26",
        "name": "Happy",
        "icon": "icons/emotion.svg"
    }
}
```

---

## Update Endpoint

```typescript
{{baseurl}}/automation/{id} | Method: PUT
```

### Sample Payload

```typescript
{
    title: "Test",
    icon: "icon/test",
    shortcuts: [
        {
            id: "9eab7131-b0e6-44dc-b293-5edda45590cb",
            order: 1
        },
        {
            id: "9eab71c4-3f9b-4817-9f93-14b326c0d29a",
            order: 2
        }
    ]
}
```

### Sample Response

```typescript
{
    message: "Automation updated successfully";
}
```

---

## Destroy Endpoint

```typescript
{{baseurl}}/automation/{id} | Method: DELETE
```

### Sample Response

```typescript
{
    message: "Automation deleted successfully.";
}
```
