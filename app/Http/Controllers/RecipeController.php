<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

/**
 * Class RecipeController
 * @package App\Http\Controllers
 */
class RecipeController extends Controller
{
    public function index()
    {
        return view('recipe.index');
    }

    public function show(Recipe $recipe)
    {
        return view('recipe.show');
    }

    public function create()
    {
        return view('recipe.create');
    }

    public function store()
    {
        return redirect()->route('recipe.index');
    }

    public function edit(Recipe $recipe)
    {
        return view('recipe.edit');
    }

    public function update(Recipe $recipe)
    {
        return redirect()->route('recipe.show');
    }

    public function delete(Recipe $recipe)
    {
        return redirect()->route('recipe.index');
    }
}
