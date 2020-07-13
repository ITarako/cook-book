<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * Class RecipeController
 * @package App\Http\Controllers
 */
class RecipeController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('recipe.index');
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('recipe.create');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        return redirect()->route('recipe.index');
    }

    /**
     * @param Recipe $recipe
     * @return Application|Factory|View
     */
    public function show(Recipe $recipe)
    {
        return view('recipe.show');
    }

    /**
     * @param Recipe $recipe
     * @return Application|Factory|View
     */
    public function edit(Recipe $recipe)
    {
        return view('recipe.edit');
    }

    /**
     * @param Request $request
     * @param Recipe $recipe
     * @return RedirectResponse
     */
    public function update(Request $request, Recipe $recipe)
    {
        return redirect()->route('recipe.show');
    }

    /**
     * @param Recipe $recipe
     * @return RedirectResponse
     */
    public function destroy(Recipe $recipe)
    {
        return redirect()->route('recipe.index');
    }
}
