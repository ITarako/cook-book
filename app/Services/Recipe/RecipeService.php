<?php

namespace App\Services\Recipe;

use App\Services\Ingredient\IngredientService;
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
    public $ingredientService;

    /**
     * RecipeService constructor.
     * @param $recipeRepository
     * @param $ingredientService
     */
    public function __construct(RecipeRepository $recipeRepository, IngredientService $ingredientService)
    {
        $this->recipeRepository = $recipeRepository;
        $this->ingredientService = $ingredientService;
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
        $recipe = $this->recipeRepository->createFromArray($data);
        $recipe->ingredients()->createMany($data['ingredients']);

        return $recipe;
    }

    /**
     * @param Recipe $recipe
     * @param array $data
     * @return Recipe
     */
    public function updateRecipe(Recipe $recipe, array $data): Recipe
    {
        $this->recipeRepository->updateFromArray($recipe, $data);
        $this->ingredientService->saveForRecipe($recipe, $data['ingredients']);

        return $recipe;
    }

    /**
     * @param int $need
     * @return array
     */
    public function getRandom($need = 3)
    {
        $models = [];
        $all = $this->recipeRepository->get();
        $count = $all->count();
        if (empty($count)) {
            return $models;
        }

        while (count($models) < $need) {
            $idx = rand(0, $count - 1);
            $models[] = $all[$idx];
        }

        return $models;
    }
}
