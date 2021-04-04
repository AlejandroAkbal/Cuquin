@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="card">

            <div class="card-body">

                <!-- Title -->
                <h1 class="card-title font-weight-bold">
                    {{$recipe->name}}
                </h1>

                <!-- Author -->
                <h5 class="card-subtitle text-muted">
                    By {{$recipe->author->name}}
                </h5>

                <div class="w-100 my-4"
                     style="height: 30vh; background-image: url('https://via.placeholder.com/150'); background-repeat: no-repeat; background-position: center; background-size: cover">
                </div>

                <h4 class="font-weight-bold">Description</h4>
                <p class="card-text">
                    {!! nl2br(e($recipe->description)) !!}
                </p>

                <h4 class="font-weight-bold">Ingredients</h4>
                <ul class="list-unstyled mb-4">

                    @forelse($recipe->ingredients as $ingredient)

                        <li>{{$ingredient->pivot->quantity . " " . $ingredient->name}}</li>

                    @empty
                        <p class="text-muted">No ingredients available.</p>

                    @endforelse
                </ul>

                <h4 class="font-weight-bold">Instructions</h4>
                <p class="card-text">
                    {!! nl2br(e($recipe->instructions)) !!}
                </p>

                <div>
                    @include('recipes.partials.edit-actions')
                </div>

            </div>

        </div>
    </div>
@endsection
