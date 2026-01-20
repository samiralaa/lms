<?php

namespace Domains\Category\Services;

use Illuminate\Support\Str;
use Domains\Category\Models\Category;
use Domains\Category\Repositories\CategoryRepository;
use Illuminate\Support\Facades\Log;

class CategoryService
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Create a new category
     */
    public function createCategory(array $data): Category
    {
        // Generate slug if not provided
        if (!isset($data['slug']) && isset($data['name'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        // Set default values
        if (!isset($data['is_active'])) {
            $data['is_active'] = true;
        }

        if (!isset($data['sort_order'])) {
            $data['sort_order'] = 0;
        }

        $category = $this->categoryRepository->createCategory($data);

        // Log the category creation
        Log::info('New category created', [
            'category_id' => $category->id,
            'name' => $category->name,
            'slug' => $category->slug
        ]);

        return $category;
    }

    /**
     * Get all categories with pagination
     */
    public function getAllCategories(int $perPage = 15)
    {
        return $this->categoryRepository->getAllCategories($perPage);
    }

    /**
     * Get all active categories
     */
    public function getActiveCategories()
    {
        return $this->categoryRepository->getActiveCategories();
    }

    /**
     * Get category by ID
     */
    public function getCategory(int $id): ?Category
    {
        return $this->categoryRepository->getCategoryById($id);
    }

    /**
     * Get category by slug
     */
    public function getCategoryBySlug(string $slug): ?Category
    {
        return $this->categoryRepository->getCategoryBySlug($slug);
    }

    /**
     * Update category
     */
    public function updateCategory(int $id, array $data): ?Category
    {
        // Generate slug if name is updated and slug is not provided
        if (isset($data['name']) && !isset($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        $category = $this->categoryRepository->updateCategory($id, $data);

        if ($category) {
            Log::info('Category updated', [
                'category_id' => $category->id,
                'name' => $category->name
            ]);
        }

        return $category;
    }

    /**
     * Update category by slug
     */
    public function updateCategoryBySlug(string $slug, array $data): ?Category
    {
        // Generate slug if name is updated and slug is not provided
        if (isset($data['name']) && !isset($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        $category = $this->categoryRepository->updateCategoryBySlug($slug, $data);

        if ($category) {
            Log::info('Category updated by slug', [
                'category_id' => $category->id,
                'name' => $category->name
            ]);
        }

        return $category;
    }

    /**
     * Delete category
     */
    public function deleteCategory(int $id): bool
    {
        $category = $this->categoryRepository->getCategoryById($id);
        
        if ($category) {
            $deleted = $this->categoryRepository->deleteCategory($id);
            
            if ($deleted) {
                Log::info('Category deleted', [
                    'category_id' => $id,
                    'name' => $category->name
                ]);
            }
            
            return $deleted;
        }

        return false;
    }

    /**
     * Delete category by slug
     */
    public function deleteCategoryBySlug(string $slug): bool
    {
        $category = $this->categoryRepository->getCategoryBySlug($slug);
        
        if ($category) {
            $deleted = $this->categoryRepository->deleteCategoryBySlug($slug);
            
            if ($deleted) {
                Log::info('Category deleted by slug', [
                    'category_id' => $category->id,
                    'name' => $category->name
                ]);
            }
            
            return $deleted;
        }

        return false;
    }

    /**
     * Search categories
     */
    public function searchCategories(string $search, int $perPage = 15)
    {
        return $this->categoryRepository->searchCategories($search, $perPage);
    }

    /**
     * Get categories with contact count
     */
    public function getCategoriesWithContactCount()
    {
        return $this->categoryRepository->getCategoriesWithContactCount();
    }

    /**
     * Toggle category active status
     */
    public function toggleActive(int $id): ?Category
    {
        $category = $this->categoryRepository->toggleActive($id);

        if ($category) {
            Log::info('Category status toggled', [
                'category_id' => $category->id,
                'name' => $category->name,
                'is_active' => $category->is_active
            ]);
        }

        return $category;
    }

    /**
     * Get category statistics
     */
    public function getCategoryStats(): array
    {
        return $this->categoryRepository->getCategoryStats();
    }

    /**
     * Get category names for contact form
     */
    public function getCategoryNamesForContact(): array
    {
        $categories = $this->getActiveCategories();
        return $categories->pluck('name')->toArray();
    }
} 