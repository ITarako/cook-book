<?php

namespace App\Services\Recipe\Repositories;

use App\Models\Recipe;

/**
 * Class RecipeRepository
 * @package App\Services\Recipe\Repositories
 */
class RecipeRepository
{
    /**
     * @param int $id
     * @return mixed
     */
    public function find(int $id)
    {
        return Recipe::find($id);
    }

    /**
     * @param array $filters
     * @return mixed
     */
    public function search(array $filters = [])
    {
        return Recipe::orderBy('name')->paginate();
    }

    /**
     * @param array $data
     * @return Recipe
     */
    public function createFromArray(array $data): Recipe
    {
        $recipe = new Recipe();
        $recipe->create($data);
        return $recipe;
    }

    /**
     * @param Recipe $recipe
     * @param array $data
     * @return Recipe
     */
    public function updateFromArray(Recipe $recipe, array $data)
    {
        $recipe->update($data);
        return $recipe;
    }
}
