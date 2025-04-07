# User Authentication Routes

## User Show Endpoint

```typescript
{{baseurl}}/auth/user/ | Method: GET
```

### Sample Response

```typescript
{
    "message": "User retrieved successfully",
    "user": {
        "id": 6,
        "first_name": "Test",
        "middle_name": "t1",
        "last_name": "TestTest",
        "email": "alex.camaddo04@gmail.com",
        "email_verified_at": null,
        "created_at": "2025-04-07T01:47:28.000000Z",
        "updated_at": "2025-04-07T01:58:09.000000Z"
    }
}
```

---

## User Register Endpoint

```typescript
{{baseurl}}/auth/register | Method: POST
```

### Sample Payload

```typescript
{
    "firstName": "Alex",
    "middleName": "Mosing",
    "lastName": "Camaddo",
    "email": "test@example.com",
    "password": "testpassword",
    "password_confirmation": "testpassword",
}
```

### Sample Response

```typescript
{
    "message": "User created successfully",
    "access_token": "3|rR76cqZierr9Dsa7itUTCxKpSgUdWRNO5NDCzLJg3d386c5f",
    "token_type": "Bearer",
    "user": {
        "first_name": "Alex",
        "middle_name": "Mosing",
        "last_name": "Camaddo",
        "email": "alex.camaddo04@gmail.com",
        "updated_at": "2025-03-21T01:58:51.000000Z",
        "created_at": "2025-03-21T01:58:51.000000Z",
        "id": 6
    }
}
```

---

## User Update Credentials Endpoint

```typescript
{{baseurl}}/auth/update/{id} | Method: PUT
```

### Sample Payload

```typescript
{
    "firstName": "Test",
    "middleName": "t1",
    "lastName": "TestTest"
    // "email": "test@gmail.com"
}
```

### Sample Response

```typescript
{
    "message": "User updated successfully",
    "user": {
        "id": 6,
        "first_name": "Test",
        "middle_name": "t1",
        "last_name": "TestTest",
        "email": "alex.camaddo04@gmail.com",
        "email_verified_at": null,
        "created_at": "2025-04-07T01:47:28.000000Z",
        "updated_at": "2025-04-07T01:58:09.000000Z"
    }
}
```

---

## User Login Endpoint

```typescript
{{baseurl}}/auth/login | Method: POST
```

### Sample Payload

```typescript
{
    "email": "alex.camaddo04@gmail.com",
    "password": "asdasd123",
}
```

### Sample Response

```typescript
{
    "access_token": "4|ry8HnbFTfg3FRKZpTZb0LczR5pDI9JSnV9q31zXC5097416b",
    "token_type": "Bearer",
    "user": {
        "id": 6,
        "first_name": "Alex",
        "middle_name": "Mosing",
        "last_name": "Camaddo",
        "email": "alex.camaddo04@gmail.com",
        "email_verified_at": null,
        "created_at": "2025-03-21T01:58:51.000000Z",
        "updated_at": "2025-03-21T01:58:51.000000Z"
    }
}
```

---

## User Logout Endpoint

```typescript
{{baseurl}}/auth/logout | Method: POST
```

### Sample Response

```typescript
{
    "message": "Logged out successfully"
}
```
