<?php

namespace Domains\Category\Repositories;

use Domains\Category\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository
{
    protected $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    /**
     * Get all categories with optional pagination
     */
    public function getAllCategories(int $perPage = 15)
    {
        return $this->model->ordered()->paginate($perPage);
    }

    /**
     * Get all active categories
     */
    public function getActiveCategories(): Collection
    {
        return $this->model->active()->ordered()->get();
    }

    /**
     * Get all categories without pagination
     */
    public function getAllCategoriesList(): Collection
    {
        return $this->model->ordered()->get();
    }

    /**
     * Get category by ID
     */
    public function getCategoryById(int $id): ?Category
    {
        return $this->model->find($id);
    }

    /**
     * Get category by slug
     */
    public function getCategoryBySlug(string $slug): ?Category
    {
        return $this->model->where('slug', $slug)->first();
    }

    /**
     * Create a new category
     */
    public function createCategory(array $data): Category
    {
        return $this->model->create($data);
    }

    /**
     * Update category by ID
     */
    public function updateCategory(int $id, array $data): ?Category
    {
        $category = $this->getCategoryById($id);
        if ($category) {
            $category->update($data);
            return $category;
        }
        return null;
    }

    /**
     * Update category by slug
     */
    public function updateCategoryBySlug(string $slug, array $data): ?Category
    {
        $category = $this->getCategoryBySlug($slug);
        if ($category) {
            $category->update($data);
            return $category;
        }
        return null;
    }

    /**
     * Delete category by ID
     */
    public function deleteCategory(int $id): bool
    {
        $category = $this->getCategoryById($id);
        if ($category) {
            return $category->delete();
        }
        return false;
    }

    /**
     * Delete category by slug
     */
    public function deleteCategoryBySlug(string $slug): bool
    {
        $category = $this->getCategoryBySlug($slug);
        if ($category) {
            return $category->delete();
        }
        return false;
    }

    /**
     * Search categories
     */
    public function searchCategories(string $search, int $perPage = 15)
    {
        return $this->model->where(function ($query) use ($search) {
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
        })->ordered()->paginate($perPage);
    }

    /**
     * Get categories with contact count
     */
    public function getCategoriesWithContactCount()
    {
        return $this->model->withCount('contacts')->ordered()->get();
    }

    /**
     * Toggle category active status
     */
    public function toggleActive(int $id): ?Category
    {
        $category = $this->getCategoryById($id);
        if ($category) {
            $category->update(['is_active' => !$category->is_active]);
            return $category;
        }
        return null;
    }

    /**
     * Get category statistics
     */
    public function getCategoryStats(): array
    {
        return [
            'total' => $this->model->count(),
            'active' => $this->model->active()->count(),
            'inactive' => $this->model->where('is_active', false)->count(),
        ];
    }
} 