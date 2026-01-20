<?php

namespace Domains\Contact\Services;

use Domains\Contact\Models\Contact;
use Domains\Contact\Repositories\ContactRepository;
use Illuminate\Support\Facades\Log;

class ContactService
{
    protected $contactRepository;

    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    /**
     * Create a new contact
     */
    public function createContact(array $data): Contact
    {
        // Set default status if not provided
        if (!isset($data['status'])) {
            $data['status'] = 'New';
        }

        $contact = $this->contactRepository->createContact($data);

        // Log the contact creation
        Log::info('New contact created', [
            'contact_id' => $contact->id,
            'email' => $contact->email,
            'category' => $contact->category
        ]);

        return $contact;
    }

    /**
     * Get all contacts with pagination
     */
    public function getAllContacts(int $perPage = 15)
    {
        return $this->contactRepository->getAllContacts($perPage);
    }

    /**
     * Get contact by ID
     */
    public function getContact(int $id): ?Contact
    {
        return $this->contactRepository->getContactById($id);
    }

    /**
     * Update contact
     */
    public function updateContact(int $id, array $data): ?Contact
    {
        $contact = $this->contactRepository->updateContact($id, $data);

        if ($contact) {
            Log::info('Contact updated', [
                'contact_id' => $contact->id,
                'status' => $contact->status
            ]);
        }

        return $contact;
    }

    /**
     * Delete contact
     */
    public function deleteContact(int $id): bool
    {
        $contact = $this->contactRepository->getContactById($id);
        
        if ($contact) {
            $deleted = $this->contactRepository->deleteContact($id);
            
            if ($deleted) {
                Log::info('Contact deleted', [
                    'contact_id' => $id,
                    'email' => $contact->email
                ]);
            }
            
            return $deleted;
        }

        return false;
    }

    /**
     * Get contacts by status
     */
    public function getContactsByStatus(string $status, int $perPage = 15)
    {
        return $this->contactRepository->getContactsByStatus($status, $perPage);
    }

    /**
     * Get contacts by category
     */
    public function getContactsByCategory(string $category, int $perPage = 15)
    {
        return $this->contactRepository->getContactsByCategory($category, $perPage);
    }

    /**
     * Search contacts
     */
    public function searchContacts(string $search, int $perPage = 15)
    {
        return $this->contactRepository->searchContacts($search, $perPage);
    }

    /**
     * Get contact statistics
     */
    public function getContactStats(): array
    {
        return $this->contactRepository->getContactStats();
    }

    /**
     * Update contact status
     */
    public function updateContactStatus(int $id, string $status): ?Contact
    {
        $validStatuses = Contact::getStatuses();
        
        if (!in_array($status, $validStatuses)) {
            throw new \InvalidArgumentException('Invalid status provided');
        }

        return $this->updateContact($id, ['status' => $status]);
    }

    /**
     * Get available categories
     */
    public function getAvailableCategories(): array
    {
        return Contact::getCategories();
    }

    /**
     * Get available statuses
     */
    public function getAvailableStatuses(): array
    {
        return Contact::getStatuses();
    }
} 