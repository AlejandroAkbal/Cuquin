@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @include('shared.messages')

                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        Ingredients

                        <a href="{{ route('ingredients.create') }}"
                           class="btn btn-primary">
                            Create
                        </a>
                    </div>

                    <div class="card-body">

                        <ul class="list-unstyled">
                            @forelse($ingredients as $ingredient)
                                <li class="my-2">

                                    <div class="card">
                                        <div class="card-body">

                                            <!-- Title -->
                                            <h5 class="card-title">
                                                {{$ingredient->name}}
                                            </h5>

                                            <!-- Content -->
                                            <p class="card-subtitle text-muted">
                                                Used in {{$ingredient->recipes->count()}} recipes.
                                            </p>

                                            <!-- actions -->
                                            <div>
                                                <a href="{{ route('ingredients.show', $ingredient->id) }}"
                                                   class="btn btn-primary">
                                                    View
                                                </a>

                                                @include('ingredients.partials.edit-actions')
                                            </div>

                                            <!-- Author -->
                                            <p class="float-right text-muted small">
                                                By {{$ingredient->creator->name}}
                                            </p>

                                        </div>

                                        {{--                                        {{$ingredient}}--}}

                                    </div>

                                </li>

                            @empty
                                <li class="my-2">There are no ingredients. Create one?</li>
                            @endforelse

                        </ul>

                        <!-- Pagination -->
                        <div class="d-flex justify-content-center">
                            {{$ingredients->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
