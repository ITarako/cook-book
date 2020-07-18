<?php

namespace App\Services\Recipe;

use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Recipe;
use App\Services\Recipe\Repositories\RecipeRepository;

/**
 * Class RecipeService
 * @package App\Services\Recipe
 */
class RecipeService
{
    public $recipeRepository;

    /**
     * RecipeService constructor.
     * @param $recipeRepository
     */
    public function __construct(RecipeRepository $recipeRepository)
    {
        $this->recipeRepository = $recipeRepository;
    }

    /**
     * @param int $id
     * @return Recipe|null
     */
    public function findRecipe(int $id)
    {
        return $this->recipeRepository->find($id);
    }

    /**
     * @return LengthAwarePaginator
     */
    public function searchRecipes(): LengthAwarePaginator
    {
        return $this->recipeRepository->search();
    }

    /**
     * @param array $data
     * @return Recipe
     */
    public function storeRecipe(array $data): Recipe
    {
        return $this->recipeRepository->createFromArray($data);
    }

    /**
     * @param Recipe $recipe
     * @param array $data
     * @return Recipe
     */
    public function updateRecipe(Recipe $recipe, array $data): Recipe
    {
        return $this->recipeRepository->updateFromArray($recipe, $data);
    }
}
