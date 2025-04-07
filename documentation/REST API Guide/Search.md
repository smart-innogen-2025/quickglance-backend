# Search Route

## Search Case-Insensitive Endpoint

```typescript
{{baseurl}}/search | Method: POST
```

### Sample Payload

```typescript
{
    "model": "shortcut",
    "query": "T"
}
```

### Sample Response

```typescript
{
    "results": [
        {
            "id": 3,
            "name": "Test",
            "icon": "icon/test",
            "description": "test description",
            "gradient_start": "#19CCDF",
            "gradient_end": "#0E6F79"
        }
    ]
}
```
