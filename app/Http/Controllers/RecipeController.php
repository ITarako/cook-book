<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Services\Category\CategoryService;
use App\Services\Recipe\RecipeService;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RecipeController extends Controller
{
    /** @var RecipeService */
    public $recipeService;

    /** @var CategoryService */
    public $categoryService;

    /**
     * RecipeController constructor.
     * @param RecipeService $recipeService
     * @param CategoryService $categoryService
     */
    public function __construct(RecipeService $recipeService, CategoryService $categoryService)
    {
        $this->recipeService = $recipeService;
        $this->categoryService = $categoryService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
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
            'categoryList' => $this->categoryService->list()
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => ['required', 'max:255'],
            'category_id' => ['required', 'exists:categories,id'],
            'description' => ['required', 'max:5000'],
        ]);
        $this->recipeService->storeRecipe($data);

        return redirect(route('recipe.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param Recipe $recipe
     * @return Response
     */
    public function show(Recipe $recipe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Recipe $recipe
     * @return Response
     */
    public function edit(Recipe $recipe)
    {
        return view('recipe.edit', [
            'model' => $recipe,
            'categoryList' => $this->categoryService->list()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Recipe $recipe
     * @return Response
     */
    public function update(Request $request, Recipe $recipe)
    {
        $data = $this->validate($request, [
            'name' => ['required', 'max:255'],
            'category_id' => ['required', 'exists:categories,id'],
            'description' => ['required', 'max:5000'],
        ]);
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
