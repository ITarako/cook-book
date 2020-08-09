<?php

namespace App\Http\Controllers;

use App\Http\Requests\Recipe\CreateRequest;
use App\Http\Requests\Recipe\UpdateRequest;
use App\Models\Recipe;
use App\Services\Category\CategoryService;
use App\Services\Recipe\RecipeService;
use App\Services\Unit\UnitService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RecipeController extends Controller
{
    /** @var RecipeService */
    public $recipeService;

    /** @var CategoryService */
    public $categoryService;

    /** @var UnitService */
    public $unitService;

    /**
     * RecipeController constructor.
     * @param RecipeService $recipeService
     * @param CategoryService $categoryService
     * @param UnitService $unitService
     */
    public function __construct(
        RecipeService $recipeService,
        CategoryService $categoryService,
        UnitService $unitService
    ) {
        $this->recipeService = $recipeService;
        $this->categoryService = $categoryService;
        $this->unitService = $unitService;
    }


    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('recipe.index', [
            'models' => $this->recipeService->searchRecipes(),
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('recipe.create', [
            'categoryList' => $this->categoryService->list(),
            'unitList' => $this->unitService->list(),
            'ingredients' => [],
        ]);
    }

    /**
     * @param CreateRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(CreateRequest $request)
    {
        $data = $request->validated();
        $this->recipeService->storeRecipe($data);

        return redirect(route('recipe.index'));
    }

    /**
     * @param Recipe $recipe
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Recipe $recipe)
    {
        return view('recipe.show', [
            'model' => $recipe,
        ]);
    }

    /**
     * @param Recipe $recipe
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Recipe $recipe)
    {
        return view('recipe.edit', [
            'model' => $recipe,
            'categoryList' => $this->categoryService->list(),
            'unitList' => $this->unitService->list(),
            'ingredients' => $recipe->ingredients,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Recipe $recipe
     * @return Response
     */
    public function update(UpdateRequest $request, Recipe $recipe)
    {
        $data = $request->validated();
        $this->recipeService->updateRecipe($recipe, $data);

        return redirect(route('recipe.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Recipe $recipe
     * @return Response
     */
    public function destroy(Recipe $recipe)
    {
        //
    }
}
