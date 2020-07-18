<?php

namespace App\Services\Category\Repositories;

use App\Models\Category;

/**
 * Class CategoryRepository
 * @package App\Services\Category\Repositories
 */
class CategoryRepository
{
    /**
     * @param int $id
     * @return mixed
     */
    public function find(int $id)
    {
        return Category::find($id);
    }

    /**
     * @param array $filters
     * @return mixed
     */
    public function search(array $filters = [])
    {
        return Category::orderBy('name')->paginate();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function list()
    {
        return Category::orderBy('name')->get();
    }

    /**
     * @param array $data
     * @return Category
     */
    public function createFromArray(array $data): Category
    {
        $country = new Category();
        $country->create($data);
        return $country;
    }

    /**
     * @param Category $country
     * @param array $data
     * @return Category
     */
    public function updateFromArray(Category $country, array $data)
    {
        $country->update($data);
        return $country;
    }
}
