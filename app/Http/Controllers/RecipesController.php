<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $recipes = Recipe::latest()->paginate(3);

        return View::make('recipes.index', ['recipes' => $recipes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('recipes.createOrEdit');
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
        ]);

        $recipe = Recipe::make($request->all());
        $recipe->user_id = Auth::user()->id;

        $recipe->save();

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
        return View::make('recipes.createOrEdit', ['recipe' => $recipe]);
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
        ]);

        $recipe->update($request->all());

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
