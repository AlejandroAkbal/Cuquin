@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">View recipe</div>

                    <img class="card-img-top" src="https://via.placeholder.com/150" alt="Recipe image"
                         style="max-height: 45vh">

                    <div class="card-body">

                        <!-- Title -->
                        <h4 class="card-title">
                            {{$recipe->name}}
                        </h4>

                        <!-- Author -->
                        <h5 class="card-subtitle mb-2 text-muted">
                            By {{$recipe->author->name}}
                        </h5>

                        <h5>Description</h5>
                        <p class="card-text">
                            {{$recipe->description}}
                        </p>

                        <h5>Ingredients</h5>
                        <ul class="list-group">
                            @forelse($recipe->ingredients as $ingredient)
                                <li class="list-group-item">{{$ingredient->pivot->quantity . 'x ' . $ingredient->name}}</li>

                            @empty
                                <p class="text-muted">No ingredients available.</p>

                            @endforelse
                        </ul>

                        <h5>Instructions</h5>
                        <p class="card-text">
                            {{$recipe->instructions }}
                        </p>

                        <div>
                            @include('recipes.partials.edit-actions')
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
