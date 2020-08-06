<?php

namespace App\Services\Ingredient;

use App\Models\Recipe;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Ingredient;
use App\Services\Ingredient\Repositories\IngredientRepository;

/**
 * Class IngredientService
 * @package App\Services\Ingredient
 */
class IngredientService
{
    public $ingredientRepository;

    /**
     * IngredientService constructor.
     * @param $ingredientRepository
     */
    public function __construct(IngredientRepository $ingredientRepository)
    {
        $this->ingredientRepository = $ingredientRepository;
    }

    /**
     * @param int $id
     * @return Ingredient|null
     */
    public function findIngredient(int $id): ?Ingredient
    {
        return $this->ingredientRepository->find($id);
    }

    /**
     * @param array $data
     * @return Ingredient
     */
    public function storeIngredient(array $data): Ingredient
    {
        return $this->ingredientRepository->createFromArray($data);
    }

    /**
     * @param Ingredient $ingredient
     * @return bool|null
     * @throws \Exception
     */
    public function deleteIngredient(Ingredient $ingredient): ?bool
    {
        return $this->ingredientRepository->delete($ingredient);
    }

    /**
     * @param Recipe $recipe
     * @param $data
     * @throws \Exception
     */
    public function saveForRecipe(Recipe $recipe, $data)
    {
        $old = $recipe->ingredients;
        foreach ($old as $ingredient) {
            $this->deleteIngredient($ingredient);
        }

        $length = count($data['name']);
        for ($i = 0; $i < $length; $i++) {
            $datum['name'] = $data['name'][$i];
            $datum['count'] = $data['count'][$i];
            $datum['unit_id'] = $data['unit_id'][$i];
            $datum['recipe_id'] = $recipe->id;
            $this->storeIngredient($datum);
        }
    }
}
