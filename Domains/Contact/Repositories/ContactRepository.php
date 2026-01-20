<?php

namespace Domains\Contact\Repositories;

use Domains\Contact\Models\Contact;
use Illuminate\Database\Eloquent\Collection;

class ContactRepository
{
    protected $model;

    public function __construct(Contact $model)
    {
        $this->model = $model;
    }

    /**
     * Get all contacts with optional pagination
     */
    public function getAllContacts(int $perPage = 15)
    {
        return $this->model->orderBy('created_at', 'desc')->paginate($perPage);
    }

    /**
     * Get all contacts without pagination
     */
    public function getAllContactsList(): Collection
    {
        return $this->model->orderBy('created_at', 'desc')->get();
    }

    /**
     * Get contact by ID
     */
    public function getContactById(int $id): ?Contact
    {
        return $this->model->find($id);
    }

    /**
     * Create a new contact
     */
    public function createContact(array $data): Contact
    {
        return $this->model->create($data);
    }

    /**
     * Update contact by ID
     */
    public function updateContact(int $id, array $data): ?Contact
    {
        $contact = $this->getContactById($id);
        if ($contact) {
            $contact->update($data);
            return $contact;
        }
        return null;
    }

    /**
     * Delete contact by ID
     */
    public function deleteContact(int $id): bool
    {
        $contact = $this->getContactById($id);
        if ($contact) {
            return $contact->delete();
        }
        return false;
    }

    /**
     * Get contacts by status
     */
    public function getContactsByStatus(string $status, int $perPage = 15)
    {
        return $this->model->byStatus($status)->orderBy('created_at', 'desc')->paginate($perPage);
    }

    /**
     * Get contacts by category
     */
    public function getContactsByCategory(string $category, int $perPage = 15)
    {
        return $this->model->byCategory($category)->orderBy('created_at', 'desc')->paginate($perPage);
    }

    /**
     * Search contacts
     */
    public function searchContacts(string $search, int $perPage = 15)
    {
        return $this->model->where(function ($query) use ($search) {
            $query->where('full_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('subject', 'like', "%{$search}%")
                  ->orWhere('message', 'like', "%{$search}%");
        })->orderBy('created_at', 'desc')->paginate($perPage);
    }

    /**
     * Get contact statistics
     */
    public function getContactStats(): array
    {
        return [
            'total' => $this->model->count(),
            'new' => $this->model->byStatus('New')->count(),
            'in_progress' => $this->model->byStatus('In Progress')->count(),
            'resolved' => $this->model->byStatus('Resolved')->count(),
            'closed' => $this->model->byStatus('Closed')->count(),
        ];
    }
} 