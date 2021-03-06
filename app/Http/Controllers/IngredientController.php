<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class IngredientController extends Controller
{
    private $validationRules = [
        'name' => ['required', 'min:2', 'max:50', 'unique:App\Models\Ingredient']
    ];

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
        $this->middleware('can:update,ingredient')->only(['edit', 'update', 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $ingredients = Ingredient::orderBy('id', 'DESC')->paginate(5);

        return View::make('ingredients.index', ['ingredients' => $ingredients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return View::make('ingredients.createOrEdit', ['isEditing' => false]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate($this->validationRules);

        $ingredient = Ingredient::make($request->all());
        $ingredient->user_id = Auth::user()->id;

        $ingredient->save();

        Session::flash('message', 'Successfully created!');

        return Redirect::to('ingredients');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Ingredient $ingredient
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Ingredient $ingredient)
    {
        return View::make('ingredients.show', ['ingredient' => $ingredient]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Ingredient $ingredient
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Ingredient $ingredient)
    {
        return View::make('ingredients.createOrEdit', ['isEditing' => true, 'ingredient' => $ingredient]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Ingredient $ingredient
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Ingredient $ingredient)
    {
        $request->validate($this->validationRules);

        $ingredient->update($request->all());

        Session::flash('message', 'Successfully updated!');

        return Redirect::to('ingredients');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Ingredient $ingredient
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Ingredient $ingredient)
    {
        $ingredient->delete();

        Session::flash('message', 'Successfully deleted!');

        return Redirect::to('ingredients');
    }
}
