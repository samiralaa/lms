<?php

namespace Domains\Contact\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Domains\Contact\Models\Contact;
use Domains\Contact\Repositories\ContactRepository;
use Domains\Contact\Requests\ContactRequest;
use Domains\Contact\Services\ContactService;

class ContactController
{
    protected $contactService;
    protected $contactRepository;

    public function __construct(ContactService $contactService, ContactRepository $contactRepository)
    {
        $this->contactService = $contactService;
        $this->contactRepository = $contactRepository;
    }

    /**
     * Display a listing of contacts
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $perPage = $request->get('per_page', 15);
            $contacts = $this->contactService->getAllContacts($perPage);

            return response()->json([
                'success' => true,
                'data' => $contacts,
                'message' => 'Contacts retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve contacts',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created contact
     */
    public function store(ContactRequest $request): JsonResponse
    {
        try {
            $data = $request->validated();
            $contact = $this->contactService->createContact($data);

            return response()->json([
                'success' => true,
                'data' => $contact,
                'message' => 'Contact created successfully'
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create contact',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified contact
     */
    public function show(int $id): JsonResponse
    {
        try {
            $contact = $this->contactService->getContact($id);

            if (!$contact) {
                return response()->json([
                    'success' => false,
                    'message' => 'Contact not found'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'data' => $contact,
                'message' => 'Contact retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve contact',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified contact
     */
    public function update(ContactRequest $request, int $id): JsonResponse
    {
        try {
            $data = $request->validated();
            $contact = $this->contactService->updateContact($id, $data);

            if (!$contact) {
                return response()->json([
                    'success' => false,
                    'message' => 'Contact not found'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'data' => $contact,
                'message' => 'Contact updated successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update contact',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified contact
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $deleted = $this->contactService->deleteContact($id);

            if (!$deleted) {
                return response()->json([
                    'success' => false,
                    'message' => 'Contact not found'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'message' => 'Contact deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete contact',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get contacts by status
     */
    public function getByStatus(Request $request, string $status): JsonResponse
    {
        try {
            $perPage = $request->get('per_page', 15);
            $contacts = $this->contactService->getContactsByStatus($status, $perPage);

            return response()->json([
                'success' => true,
                'data' => $contacts,
                'message' => "Contacts with status '{$status}' retrieved successfully"
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve contacts by status',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get contacts by category
     */
    public function getByCategory(Request $request, string $category): JsonResponse
    {
        try {
            $perPage = $request->get('per_page', 15);
            $contacts = $this->contactService->getContactsByCategory($category, $perPage);

            return response()->json([
                'success' => true,
                'data' => $contacts,
                'message' => "Contacts with category '{$category}' retrieved successfully"
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve contacts by category',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Search contacts
     */
    public function search(Request $request): JsonResponse
    {
        try {
            $search = $request->get('q');
            $perPage = $request->get('per_page', 15);

            if (!$search) {
                return response()->json([
                    'success' => false,
                    'message' => 'Search query is required'
                ], 400);
            }

            $contacts = $this->contactService->searchContacts($search, $perPage);

            return response()->json([
                'success' => true,
                'data' => $contacts,
                'message' => 'Search results retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to search contacts',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get contact statistics
     */
    public function stats(): JsonResponse
    {
        try {
            $stats = $this->contactService->getContactStats();

            return response()->json([
                'success' => true,
                'data' => $stats,
                'message' => 'Contact statistics retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve contact statistics',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update contact status
     */
    public function updateStatus(Request $request, int $id): JsonResponse
    {
        try {
            $request->validate([
                'status' => 'required|in:' . implode(',', \Domains\Contact\Enums\ContactStatus::values())
            ]);

            $status = $request->input('status');
            $contact = $this->contactService->updateContactStatus($id, $status);

            if (!$contact) {
                return response()->json([
                    'success' => false,
                    'message' => 'Contact not found'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'data' => $contact,
                'message' => 'Contact status updated successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update contact status',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get available categories
     */
    public function categories(): JsonResponse
    {
        try {
            $categories = $this->contactService->getAvailableCategories();

            return response()->json([
                'success' => true,
                'data' => $categories,
                'message' => 'Available categories retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve categories',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get available statuses
     */
    public function statuses(): JsonResponse
    {
        try {
            $statuses = $this->contactService->getAvailableStatuses();

            return response()->json([
                'success' => true,
                'data' => $statuses,
                'message' => 'Available statuses retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve statuses',
                'error' => $e->getMessage()
            ], 500);
        }
    }
} 