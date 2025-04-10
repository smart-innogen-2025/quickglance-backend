# Shortcut Routes

## Index Endpoint

```typescript
{{baseurl}}/shortcut | Method: GET
```

### Sample Response

```typescript
{
    "shortcuts": [
        {
            "id": 2,
            "name": "Test",
            "icon": "icon/test",
            "description": "test description",
            "user_action": [
                {
                    id: 4,
                    order: "1",
                    form: "{\"test1\": \"test1\", \"test2\": \"test2\"}"// JSON String
                },
                {
                    id: 5,
                    order: "2",
                    form: "{\"test1\": \"test1\", \"test2\": \"test2\"}" // JSON String
                },
                {
                    id: 6,
                    order: "3",
                    form: "{\"test1\": \"test1\", \"test2\": \"test2\"}" // JSON String
                }
            ]
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
            "id": 4,
            "form": "{\"test1\": \"test1\", \"test2\": \"test2\"}"
        },
        {
            "id": 5,
            "form": "{\"test1\": \"test1\", \"test2\": \"test2\"}"
        },
        {
            "id": 6,
            "form": "{\"test1\": \"test1\", \"test2\": \"test2\"}"
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
