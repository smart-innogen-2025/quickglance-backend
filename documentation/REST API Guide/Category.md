# Category Routes

## Index Endpoint

```typescript
{{base_url}}/category | Method: GET
```

### Sample Response

```typescript
{
    "categories": [
        {
            "id": "9ea3e8b8-2cf7-4a9d-bc4e-18405615c0f9",
            "name": "Device Actions",
            "icon": "icons/device.svg",
            "image": "categories/device.jpg",
            "actions": [
                {
                    "id": "9ea3e8b8-2df3-493f-8edd-18f6eb2de8e6",
                    "category_id": "9ea3e8b8-2cf7-4a9d-bc4e-18405615c0f9",
                    "name": "Call Number",
                    "icon": "phone.fill",
                    "gradient_start": "#B874E3",
                    "gradient_end": "#65407D",
                    "inputs": "[{\"name\": \"phoneNumber\", \"type\": \"text\", \"default\": \"911\", \"required\": true}, {\"name\": \"message\", \"type\": \"text\", \"default\": \"Need immediate assistance!\", \"required\": false}]"
                },
                {
                    "id": "9ea3e8b8-2ef4-44b1-a58e-60f8af05f473",
                    "category_id": "9ea3e8b8-2cf7-4a9d-bc4e-18405615c0f9",
                    "name": "Send Message",
                    "icon": "message.fill",
                    "gradient_start": "#0EABEF",
                    "gradient_end": "#086289",
                    "inputs": "[{\"name\": \"Recipient\"}, {\"name\": \"Message\"}]"
                }
            ]
        }
    ]
}
```

## Store Endpoint

```typescript
{{base_url}}/category | Method: POST
```

### Sample Payload

```typescript
{
    "name": "Artificial Intelligencesssss",
    "icon": "icons/ai.svg",
    "image": "category-bg/ai.jpg",
    "actions": [
        {
            "name": "Describe Surroundings",
            "icon": "test/test-icon.svg",
            "gradientStart": "#0E6F79",
            "gradientEnd": "#19CCDF"
        },
        {
            "name": "Translate Sign Language",
            "icon": "test/test-icon.svg",
            "gradientStart": "#0E6F79",
            "gradientEnd": "#19CCDF"
        }
    ]
}
```

### Sample Response

```typescript
{
    message: "Category created successfully.";
}
```

---

## Destroy Endpoint

```typescript
{{base_url}}/category/${id} | Method: DELETE
```

### Sample Response

```typescript
{
    message: "Category not found.";
}
```
