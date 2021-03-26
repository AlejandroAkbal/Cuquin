<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class RecipesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
        $this->middleware('can:update,recipe')->only(['edit', 'update', 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $recipes = Recipe::orderBy('id', 'DESC')->paginate(5);

        return View::make('recipes.index', ['recipes' => $recipes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $ingredients = Ingredient::all();

        return View::make('recipes.createOrEdit', ['isEditing' => false, 'ingredients' => $ingredients]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:App\Models\Recipe'],
            'description' => ['required', 'min:50', 'max:255'],
            'instructions' => ['required', 'min:100', 'max:510'],
            'ingredients' => ['required'],
        ]);

        DB::transaction(function () use ($request) {
            $recipe = Recipe::make($request->all());
            $recipe->user_id = Auth::user()->id;
            $recipe->save();

            $recipe->ingredients()->sync($request->input('ingredients'));
        });


        Session::flash('message', 'Successfully created!');

        return Redirect::to('recipes');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Recipe $recipe
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Recipe $recipe)
    {
        return View::make('recipes.show', ['recipe' => $recipe]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Recipe $recipe
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Recipe $recipe)
    {
        $ingredients = Ingredient::all();

        return View::make('recipes.createOrEdit', ['isEditing' => true, 'recipe' => $recipe, 'ingredients' => $ingredients]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Recipe $recipe
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Recipe $recipe)
    {
        $request->validate([
            'name' => ['required'],
            'description' => ['required', 'min:50', 'max:255'],
            'instructions' => ['required', 'min:100', 'max:510'],
            'ingredients' => ['required'],
        ]);

        DB::transaction(function () use ($recipe, $request) {
            $recipe->update($request->all());
            $recipe->ingredients()->sync($request->input('ingredients'));
        });

        Session::flash('message', 'Successfully updated!');

        return Redirect::to('recipes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Recipe $recipe
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Recipe $recipe)
    {
        $recipe->delete();

        Session::flash('message', 'Successfully deleted!');

        return Redirect::to('recipes');
    }
}
