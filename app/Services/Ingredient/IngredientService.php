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
     * @param $records
     * @throws \Exception
     */
    public function saveForRecipe(Recipe $recipe, $records)
    {
        $old = $recipe->ingredients;
        foreach ($old as $ingredient) {
            $this->deleteIngredient($ingredient);
        }

        $recipe->ingredients()->createMany($records);
    }
}
