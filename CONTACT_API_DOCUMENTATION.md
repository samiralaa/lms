# Contact API Documentation

This document describes the Contact API endpoints for managing contact form submissions.

## Base URL
```
/api/contacts
```

## Endpoints

### 1. Get All Contacts
**GET** `/api/contacts`

Retrieve all contacts with pagination.

**Query Parameters:**
- `per_page` (optional): Number of contacts per page (default: 15)

**Response:**
```json
{
    "success": true,
    "data": {
        "current_page": 1,
        "data": [
            {
                "id": 1,
                "full_name": "John Doe",
                "email": "john@example.com",
                "category": "General Inquiry",
                "subject": "Question about services",
                "message": "I have a question about your services...",
                "status": "New",
                "created_at": "2025-07-05T12:00:00.000000Z",
                "updated_at": "2025-07-05T12:00:00.000000Z"
            }
        ],
        "total": 1,
        "per_page": 15
    },
    "message": "Contacts retrieved successfully"
}
```

### 2. Create Contact
**POST** `/api/contacts`

Create a new contact submission.

**Request Body:**
```json
{
    "full_name": "John Doe",
    "email": "john@example.com",
    "category": "feedback",
    "subject": "Question about services",
    "message": "I have a question about your services. Can you help me?",
    "status": "new"
}
```

**Response:**
```json
{
    "success": true,
    "data": {
        "id": 1,
        "full_name": "John Doe",
        "email": "john@example.com",
        "category": "feedback",
        "subject": "Question about services",
        "message": "I have a question about your services. Can you help me?",
        "status": "new",
        "created_at": "2025-07-05T12:00:00.000000Z",
        "updated_at": "2025-07-05T12:00:00.000000Z"
    },
    "message": "Contact created successfully"
}
```

### 3. Get Contact by ID
**GET** `/api/contacts/{id}`

Retrieve a specific contact by ID.

**Response:**
```json
{
    "success": true,
    "data": {
        "id": 1,
        "full_name": "John Doe",
        "email": "john@example.com",
        "category": "General Inquiry",
        "subject": "Question about services",
        "message": "I have a question about your services...",
        "status": "New",
        "created_at": "2025-07-05T12:00:00.000000Z",
        "updated_at": "2025-07-05T12:00:00.000000Z"
    },
    "message": "Contact retrieved successfully"
}
```

### 4. Update Contact
**PUT** `/api/contacts/{id}`

Update an existing contact.

**Request Body:**
```json
{
    "full_name": "John Doe Updated",
    "email": "john.updated@example.com",
    "category": "Technical Support",
    "subject": "Updated subject",
    "message": "Updated message content",
    "status": "In Progress"
}
```

**Response:**
```json
{
    "success": true,
    "data": {
        "id": 1,
        "full_name": "John Doe Updated",
        "email": "john.updated@example.com",
        "category": "Technical Support",
        "subject": "Updated subject",
        "message": "Updated message content",
        "status": "In Progress",
        "created_at": "2025-07-05T12:00:00.000000Z",
        "updated_at": "2025-07-05T12:30:00.000000Z"
    },
    "message": "Contact updated successfully"
}
```

### 5. Delete Contact
**DELETE** `/api/contacts/{id}`

Delete a contact.

**Response:**
```json
{
    "success": true,
    "message": "Contact deleted successfully"
}
```

### 6. Get Contacts by Status
**GET** `/api/contacts/status/{status}`

Retrieve contacts filtered by status.

**Path Parameters:**
- `status`: One of "new", "In Progress", "Resolved", "Closed"

**Query Parameters:**
- `per_page` (optional): Number of contacts per page (default: 15)

**Response:**
```json
{
    "success": true,
    "data": {
        "current_page": 1,
        "data": [...],
        "total": 5,
        "per_page": 15
    },
    "message": "Contacts with status 'New' retrieved successfully"
}
```

### 7. Get Contacts by Category
**GET** `/api/contacts/category/{category}`

Retrieve contacts filtered by category.

**Path Parameters:**
- `category`: One of "General Inquiry", "Technical Support", "Billing", "feedback", "Other"

**Query Parameters:**
- `per_page` (optional): Number of contacts per page (default: 15)

### 8. Search Contacts
**GET** `/api/contacts/search`

Search contacts by name, email, subject, or message content.

**Query Parameters:**
- `q` (required): Search query
- `per_page` (optional): Number of contacts per page (default: 15)

### 9. Get Contact Statistics
**GET** `/api/contacts/stats`

Get contact statistics.

**Response:**
```json
{
    "success": true,
    "data": {
        "total": 25,
        "new": 10,
        "in_progress": 8,
        "resolved": 5,
        "closed": 2
    },
    "message": "Contact statistics retrieved successfully"
}
```

### 10. Update Contact Status
**PATCH** `/api/contacts/{id}/status`

Update only the status of a contact.

**Request Body:**
```json
{
    "status": "In Progress"
}
```

### 11. Get Available Categories
**GET** `/api/contacts/categories`

Get list of available categories.

**Response:**
```json
{
    "success": true,
    "data": [
        "General Inquiry",
        "Technical Support",
        "Billing",
        "Feedback",
        "Other"
    ],
    "message": "Available categories retrieved successfully"
}
```

### 12. Get Available Statuses
**GET** `/api/contacts/statuses`

Get list of available statuses.

**Response:**
```json
{
    "success": true,
    "data": [
        "New",
        "In Progress",
        "Resolved",
        "Closed"
    ],
    "message": "Available statuses retrieved successfully"
}
```

## Validation Rules

### Contact Creation/Update
- `full_name`: Required, string, max 255 characters
- `email`: Required, valid email format, max 255 characters
- `category`: Required, must be one of the predefined categories
- `subject`: Required, string, max 255 characters
- `message`: Required, string, minimum 10 characters
- `status`: Optional, must be one of the predefined statuses

## Error Responses

### Validation Error (422)
```json
{
    "success": false,
    "message": "The given data was invalid.",
    "errors": {
        "email": ["The email field is required."],
        "category": ["The selected category is invalid."]
    }
}
```

### Not Found Error (404)
```json
{
    "success": false,
    "message": "Contact not found"
}
```

### Server Error (500)
```json
{
    "success": false,
    "message": "Failed to create contact",
    "error": "Database connection error"
}
```

## Example Usage with cURL

### Create a new contact
```bash
curl -X POST http://localhost:8000/api/contacts \
  -H "Content-Type: application/json" \
  -d '{
    "full_name": "John Doe",
    "email": "john@example.com",
    "category": "General Inquiry",
    "subject": "Question about services",
    "message": "I have a question about your services. Can you help me?"
  }'
```

### Get all contacts
```bash
curl -X GET http://localhost:8000/api/contacts
```

### Update contact status
```bash
curl -X PATCH http://localhost:8000/api/contacts/1/status \
  -H "Content-Type: application/json" \
  -d '{"status": "In Progress"}'
```

## Testing

You can use the provided factory to create test data:

```php
use Domains\Contact\Models\Contact;

// Create a single contact
$contact = Contact::factory()->create();

// Create multiple contacts
$contacts = Contact::factory()->count(10)->create();

// Create a contact with specific status
$newContact = Contact::factory()->new()->create();
$inProgressContact = Contact::factory()->inProgress()->create();
``` 