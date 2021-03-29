@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>Recipes</h1>

        <hr>

        <form id="sort-form" action="" class="form-inline mt-1 mb-3">
            <div class="form-group">
                <label for="sort" class="mr-2">Sort By</label>

                <select name="sort" id="sort" class="form-control form-control-sm"
                        onchange="document.getElementById('sort-form').submit()">

                    <option value="latest">Latest</option>
                    <option value="creation">Creation</option>

                </select>
            </div>
        </form>

        @include('shared.messages')

        <ul class="list-unstyled space-y-6">

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
