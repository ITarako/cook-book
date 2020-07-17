<?php

namespace App\Services\Category;

use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Category;
use App\Services\Category\Repositories\CategoryRepository;

/**
 * Class CategoryService
 * @package App\Services\Category
 */
class CategoryService
{
    public $categoryRepository;

    /**
     * CategoryService constructor.
     * @param $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @param int $id
     * @return Category|null
     */
    public function findCategory(int $id)
    {
        return $this->categoryRepository->find($id);
    }

    /**
     * @return LengthAwarePaginator
     */
    public function searchCategories(): LengthAwarePaginator
    {
        return $this->categoryRepository->search();
    }

    /**
     * @param array $data
     * @return Category
     */
    public function storeCategory(array $data): Category
    {
        return $this->categoryRepository->createFromArray($data);
    }

    /**
     * @param Category $category
     * @param array $data
     * @return Category
     */
    public function updateCategory(Category $category, array $data): Category
    {
        return $this->categoryRepository->updateFromArray($category, $data);
    }
}
