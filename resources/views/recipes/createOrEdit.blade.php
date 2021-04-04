@extends('layouts.app')

@section('title', ($isEditing ? 'Edit' : 'Create') . ' recipe')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>
                                    {{ $error }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card">

                    <div class="card-header">{{$isEditing ? 'Edit' : 'Create'}} recipe</div>

                    <div class="card-body">

                        <form
                            action="{{$isEditing ? route('recipes.update', $recipe) : route('recipes.store')}}"
                            method="POST">
                            @csrf
                            @if($isEditing)
                                @method('PUT')
                            @endif

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                       placeholder="My savoury meal" value="{{old('name', $recipe->name ?? null)}}"
                                       required>
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3"
                                          required>{{old('description', $recipe->description ?? null)}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="instructions">Instructions</label>
                                <textarea class="form-control" id="instructions" name="instructions" rows="4"
                                          required>{{old('instructions', $recipe->instructions ?? null)}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="ingredients">Ingredients</label>
                                <select multiple class="form-control" id="ingredients" name="ingredients[]" required>

                                    @foreach($ingredients as $ingredient)

                                        @if($isEditing)
                                            <option
                                                {{-- Compare recipe ingredients with all ingredients --}}
                                                {{-- TODO: add old value --}}
                                                value="{{$ingredient->id}}" {{$recipe->ingredients->contains('id', $ingredient->id) ? "selected" : ""}}>
                                                {{$ingredient->name}}
                                            </option>

                                        @else
                                            <option
                                                value="{{$ingredient->id}}" {{in_array($ingredient->id, old("ingredients") ?: []) ? "selected": ""}}>
                                                {{$ingredient->name}}
                                            </option>

                                        @endif
                                    @endforeach

                                </select>
                            </div>

                            <button type="submit"
                                    class="btn btn-primary">{{$isEditing ? 'Edit' : 'Create'}}</button>

                        </form>
                    </div>

                </div>


            </div>
        </div>
    </div>
@endsection
