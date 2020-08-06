<?php

namespace App\Services\Ingredient\Repositories;

use App\Models\Ingredient;

/**
 * Class IngredientRepository
 * @package App\Services\Ingredient\Repositories
 */
class IngredientRepository
{
    /**
     * @param int $id
     * @return mixed
     */
    public function find(int $id)
    {
        return Ingredient::find($id);
    }

    /**
     * @param array $data
     * @return Ingredient
     */
    public function createFromArray(array $data): Ingredient
    {
        $ingredient = new Ingredient();
        $ingredient->create($data);
        return $ingredient;
    }

    /**
     * @param Ingredient $ingredient
     * @return bool|null
     * @throws \Exception
     */
    public function delete(Ingredient $ingredient)
    {
        return $ingredient->delete();
    }
}
