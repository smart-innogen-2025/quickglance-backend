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
            "id": "9ea3e8b8-2df3-493f-8edd-18f6eb2de8e6",
            "categoryId": "9ea3e8b8-2cf7-4a9d-bc4e-18405615c0f9",
            "name": "Call Number",
            "icon": "phone.fill",
            "gradientStart": "#B874E3",
            "gradientEnd": "#65407D",
            "inputs": "[{\"name\": \"phoneNumber\", \"type\": \"text\", \"default\": \"911\", \"required\": true}, {\"name\": \"message\", \"type\": \"text\", \"default\": \"Need immediate assistance!\", \"required\": false}]",
            "createdAt": "2025-04-11T03:45:10.000000Z",
            "updatedAt": "2025-04-11T03:45:10.000000Z"
        },
        {
            "id": "9ea3e8b8-2ef4-44b1-a58e-60f8af05f473",
            "categoryId": "9ea3e8b8-2cf7-4a9d-bc4e-18405615c0f9",
            "name": "Send Message",
            "icon": "message.fill",
            "gradientStart": "#0EABEF",
            "gradientEnd": "#086289",
            "inputs": "[{\"name\": \"Recipient\"}, {\"name\": \"Message\"}]",
            "createdAt": "2025-04-11T03:45:10.000000Z",
            "updatedAt": "2025-04-11T03:45:10.000000Z"
        },
        {
            "id": "9ea3e8b8-2eb1-4f52-ab16-f5c863a459ee",
            "categoryId": "9ea3e8b8-2cf7-4a9d-bc4e-18405615c0f9",
            "name": "Open App",
            "icon": "app.fill",
            "gradientStart": "#53D769",
            "gradientEnd": "#2F7A3B",
            "inputs": "[{\"name\": \"App Name\"}]",
            "createdAt": "2025-04-11T03:45:10.000000Z",
            "updatedAt": "2025-04-11T03:45:10.000000Z"
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
    "categoryId": "9ea3e8b8-2cf7-4a9d-bc4e-18405615c0f9",
    "icon": "icon/test",
    "gradientStart": "#0E6F79",
    "gradientEnd": "#19CCDF"
}
```

### Sample Response

```typescript
{
    "message": "Action created successfully."
}
```
