# Action Routes

## Index Endpoint

```typescript
{
    {{base_url}}/action | Method: GET
}
```

### Sample Response

```typescript
{
    "actions": [
        {
            "id": 1,
            "category_id": 1,
            "name": "Call Number",
            "icon": "test/test-icon.svg",
            "created_at": "2025-03-21T01:51:14.000000Z",
            "updated_at": "2025-03-21T01:51:14.000000Z"
        },
        {
            "id": 2,
            "category_id": 1,
            "name": "Lock Phone",
            "icon": "test/test-icon.svg",
            "created_at": "2025-03-21T01:51:14.000000Z",
            "updated_at": "2025-03-21T01:51:14.000000Z"
        },
        {
            "id": 3,
            "category_id": 1,
            "name": "Open App",
            "icon": "test/test-icon.svg",
            "created_at": "2025-03-21T01:51:14.000000Z",
            "updated_at": "2025-03-21T01:51:14.000000Z"
        },
        {
            "id": 4,
            "category_id": 1,
            "name": "Send Message",
            "icon": "test/test-icon.svg",
            "created_at": "2025-03-21T01:51:14.000000Z",
            "updated_at": "2025-03-21T01:51:14.000000Z"
        },
        {
            "id": 5,
            "category_id": 1,
            "name": "Check Reminders",
            "icon": "test/test-icon.svg",
            "created_at": "2025-03-21T01:51:14.000000Z",
            "updated_at": "2025-03-21T01:51:14.000000Z"
        },
        {
            "id": 6,
            "category_id": 1,
            "name": "Check Heart Rate",
            "icon": "test/test-icon.svg",
            "created_at": "2025-03-21T01:51:14.000000Z",
            "updated_at": "2025-03-21T01:51:14.000000Z"
        },
        {
            "id": 7,
            "category_id": 2,
            "name": "Describe Surroundings",
            "icon": "test/test-icon.svg",
            "created_at": "2025-03-21T01:51:14.000000Z",
            "updated_at": "2025-03-21T01:51:14.000000Z"
        },
        {
            "id": 8,
            "category_id": 2,
            "name": "Translate Sign Language",
            "icon": "test/test-icon.svg",
            "created_at": "2025-03-21T01:51:14.000000Z",
            "updated_at": "2025-03-21T01:51:14.000000Z"
        },
        {
            "id": 9,
            "category_id": 2,
            "name": "Generate Visual Instructions",
            "icon": "test/test-icon.svg",
            "created_at": "2025-03-21T01:51:14.000000Z",
            "updated_at": "2025-03-21T01:51:14.000000Z"
        },
        {
            "id": 10,
            "category_id": 2,
            "name": "Predict Next Behavior",
            "icon": "test/test-icon.svg",
            "created_at": "2025-03-21T01:51:14.000000Z",
            "updated_at": "2025-03-21T01:51:14.000000Z"
        },
        {
            "id": 11,
            "category_id": 2,
            "name": "Simplify Complex Text",
            "icon": "test/test-icon.svg",
            "created_at": "2025-03-21T01:51:14.000000Z",
            "updated_at": "2025-03-21T01:51:14.000000Z"
        },
        {
            "id": 12,
            "category_id": 2,
            "name": "Assist with Voice",
            "icon": "test/test-icon.svg",
            "created_at": "2025-03-21T01:51:14.000000Z",
            "updated_at": "2025-03-21T01:51:14.000000Z"
        }
    ]
}
```

## Store Endpoint

```typescript
{
    {{base_url}}/action | Method: POST
}
```

### Sample Payload

```typescript
{
    "name": "test",
    "categoryId": 1,
    "icon": "icon/test"
}
```

### Sample Response

```typescript
{
    "message": "Action created successfully."
}
```
