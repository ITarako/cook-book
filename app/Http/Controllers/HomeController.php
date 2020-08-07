<?php

namespace App\Http\Controllers;

use App\Services\Recipe\RecipeService;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    public $recipeService;

    /**
     * HomeController constructor.
     * @param $recipeService
     */
    public function __construct(RecipeService $recipeService)
    {
        $this->recipeService = $recipeService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $recipe = $this->recipeService->getRandom();
        return view('home', [
            'randomRecipe' => $recipe,
        ]);
    }
}
