@extends('layouts.app')

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

                    <div class="card-header">{{isset($recipe) ? 'Update' : 'Create'}} recipe</div>

                    <div class="card-body">

                        <form
                            action="{{isset($recipe) ? route('recipes.update', $recipe->id) : route('recipes.store')}}"
                            method="POST">
                            @csrf
                            @if(isset($recipe))
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

                            <button type="submit"
                                    class="btn btn-primary">{{isset($recipe) ? 'Update' : 'Create'}}</button>

                        </form>
                    </div>

                </div>


            </div>
        </div>
    </div>
@endsection
