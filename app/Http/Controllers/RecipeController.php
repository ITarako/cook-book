<?php

namespace App\Http\Controllers;

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

    public function show($recipe)
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

    public function edit($recipe)
    {
        return view('recipe.edit');
    }

    public function update($recipe)
    {
        return redirect()->route('recipe.show');
    }

    public function delete($recipe)
    {
        return redirect()->route('recipe.index');
    }
}
