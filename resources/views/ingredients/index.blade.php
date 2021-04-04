@extends('layouts.app')

@section('title', 'Ingredients')

@section('content')
    <div class="container">

        <h1>Ingredients</h1>

        <hr>


        <div class="d-flex flex-row justify-content-between align-items-center mb-3">

            <div class="form-group"></div>

            <a href="{{ route('ingredients.create') }}"
               class="btn btn-primary">
                Create
            </a>

        </div>

        @include('shared.messages')


        <ul class="list-unstyled space-y-4">

            @forelse($ingredients as $ingredient)

                <x-content-card
                    title="{{$ingredient->name}}"
                    text="Used in {{$ingredient->recipes->count()}} recipes."
                >
                    <!-- actions -->
                    <div>
                        <a href="{{ route('ingredients.show', $ingredient) }}"
                           class="btn btn-primary">
                            View
                        </a>

                        @include('ingredients.partials.edit-actions')
                    </div>

                </x-content-card>

            @empty
                <li class="my-4">There are no ingredients. You should create one!</li>
            @endforelse

        </ul>

        <!-- Pagination -->
        <div class="d-flex justify-content-center">
            {{$ingredients->links()}}
        </div>
    </div>
@endsection
