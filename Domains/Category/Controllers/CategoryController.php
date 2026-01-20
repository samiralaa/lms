<?php

namespace Domains\Category\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Domains\Category\Models\Category;
use Domains\Category\Repositories\CategoryRepository;
use Domains\Category\Requests\CategoryRequest;
use Domains\Category\Services\CategoryService;

class CategoryController
{
    protected $categoryService;
    protected $categoryRepository;

    public function __construct(CategoryService $categoryService, CategoryRepository $categoryRepository)
    {
        $this->categoryService = $categoryService;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of categories
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $perPage = $request->get('per_page', 15);
            $categories = $this->categoryService->getAllCategories($perPage);

            return response()->json([
                'success' => true,
                'data' => $categories,
                'message' => 'Categories retrieved successfully'
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
     * Store a newly created category
     */
    public function store(CategoryRequest $request): JsonResponse
    {
        try {
            $data = $request->validated();
            $category = $this->categoryService->createCategory($data);

            return response()->json([
                'success' => true,
                'data' => $category,
                'message' => 'Category created successfully'
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create category',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified category
     */
    public function show(int $id): JsonResponse
    {
        try {
            $category = $this->categoryService->getCategory($id);

            if (!$category) {
                return response()->json([
                    'success' => false,
                    'message' => 'Category not found'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'data' => $category,
                'message' => 'Category retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve category',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified category
     */
    public function update(CategoryRequest $request, int $id): JsonResponse
    {
        try {
            $data = $request->validated();
            $category = $this->categoryService->updateCategory($id, $data);

            if (!$category) {
                return response()->json([
                    'success' => false,
                    'message' => 'Category not found'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'data' => $category,
                'message' => 'Category updated successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update category',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified category
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $deleted = $this->categoryService->deleteCategory($id);

            if (!$deleted) {
                return response()->json([
                    'success' => false,
                    'message' => 'Category not found'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'message' => 'Category deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete category',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get active categories for contact form
     */
    public function active(): JsonResponse
    {
        try {
            $categories = $this->categoryService->getActiveCategories();

            return response()->json([
                'success' => true,
                'data' => $categories,
                'message' => 'Active categories retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve active categories',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get category names for contact form
     */
    public function names(): JsonResponse
    {
        try {
            $categoryNames = $this->categoryService->getCategoryNamesForContact();

            return response()->json([
                'success' => true,
                'data' => $categoryNames,
                'message' => 'Category names retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve category names',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Search categories
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

            $categories = $this->categoryService->searchCategories($search, $perPage);

            return response()->json([
                'success' => true,
                'data' => $categories,
                'message' => 'Search results retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to search categories',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get categories with contact count
     */
    public function withContactCount(): JsonResponse
    {
        try {
            $categories = $this->categoryService->getCategoriesWithContactCount();

            return response()->json([
                'success' => true,
                'data' => $categories,
                'message' => 'Categories with contact count retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve categories with contact count',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Toggle category active status
     */
    public function toggleActive(int $id): JsonResponse
    {
        try {
            $category = $this->categoryService->toggleActive($id);

            if (!$category) {
                return response()->json([
                    'success' => false,
                    'message' => 'Category not found'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'data' => $category,
                'message' => 'Category status toggled successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to toggle category status',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get category statistics
     */
    public function stats(): JsonResponse
    {
        try {
            $stats = $this->categoryService->getCategoryStats();

            return response()->json([
                'success' => true,
                'data' => $stats,
                'message' => 'Category statistics retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve category statistics',
                'error' => $e->getMessage()
            ], 500);
        }
    }
} 