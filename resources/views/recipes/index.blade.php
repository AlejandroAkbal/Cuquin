@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>Recipes</h1>

        <hr>

        <div class="d-flex flex-row justify-content-between align-items-center mb-3">

            <form id="sort-form" class="form-inline">
                <div class="form-group">
                    <label for="sortBy" class="mr-2">Sort By</label>

                    <select name="sortBy" id="sortBy" class="form-control form-control-sm"
                            onchange="document.getElementById('sort-form').submit()">

                        <option value="updated_at" {{$sortBy === 'updated_at' ? 'selected' : ''}}>Updated</option>
                        <option value="created_at" {{$sortBy === 'created_at' ? 'selected' : ''}}>Created</option>

                    </select>
                </div>
            </form>

            <a class="btn btn-primary" href="{{ route('recipes.create') }}">Create</a>

        </div>

        @include('shared.messages')

        <ul class="list-unstyled space-y-4">

            @forelse($recipes as $recipe)

                <li class="card flex-column flex-md-row">

                    <img src="https://via.placeholder.com/150"
                         class="card-img-top recipe-img" alt="Recipe image"/>

                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">{{$recipe->name}}</h5>

                        <p class="card-text">{{Str::limit($recipe->description, 150)}}</p>

                        <!-- actions -->
                        <div>
                            <a href="{{ route('recipes.show', $recipe) }}"
                               class="btn btn-primary">
                                Read
                            </a>

                            @include('recipes.partials.edit-actions')
                        </div>
                    </div>


                </li>

            @empty
                <li class="my-4">There are no recipes. You should create one!</li>
            @endforelse

        </ul>


        <!-- Pagination -->
        <div class="d-flex justify-content-center">
            {{$recipes->links()}}
        </div>
    </div>
@endsection
