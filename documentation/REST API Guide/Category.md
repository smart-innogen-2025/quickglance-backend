# Category Routes

## Index Endpoint

```typescript
{{base_url}}/category | Method: GET
```

### Sample Response

```typescript
{
    categories: [
        {
            id: 1,
            name: "Device",
            icon: "icons/device.svg",
            bgImage: "category-bg/device.jpg",
        },
        {
            id: 2,
            name: "Artificial Intelligence",
            icon: "icons/ai.svg",
            bgImage: "category-bg/ai.jpg",
        },
    ];
}
```

## Store Endpoint

```typescript
{{base_url}}/category | Method: POST
```

### Sample Payload

```typescript
{
    name: "Artificial Intelligence",
    icon: "icons/ai.svg",
    bgImage: "category-bg/ai.jpg",
    actions: [
        {
            name: "Describe Surroundings",
            icon: "test/test-icon.svg"
        },
        {
            name: "Translate Sign Language",
            icon: "test/test-icon.svg"
        },
        {
            name: "Generate Visual Instructions",
            icon: "test/test-icon.svg"
        },
        {
            name: "Predict Next Behavior",
            icon: "test/test-icon.svg"
        },
        {
            name: "Simplify Complex Text",
            icon: "test/test-icon.svg"
        },
        {
            name: "Assist with Voice",
            icon: "test/test-icon.svg"
        }
    ]
}
```

### Sample Response

```typescript
{
    message: "Category created successfully."
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
    message: "Category not found."
}
```
