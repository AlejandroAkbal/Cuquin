@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Recipes</div>

                    <div class="card-body">

                        <ul class="list-unstyled">
                            @foreach($recipes as $recipe)
                                <li class="my-2">

                                    <div class="card">
                                        <div class="card-body">

                                            <!-- Title -->
                                            <h5 class="card-title">
                                                {{$recipe->name}}
                                            </h5>

                                            <!-- Content -->
                                            <p class="card-text">
                                                {{Str::limit($recipe->description, 150)}}
                                            </p>

                                            <!-- actions -->
                                            <div>
                                                <a href="{{ route('recipes.show', $recipe->id) }}"
                                                   class="btn btn-primary">
                                                    Read
                                                </a>

                                                <a href="{{ route('recipes.edit', $recipe->id) }}"
                                                   class="btn btn-secondary">
                                                    Edit
                                                </a>

                                                <form class="d-inline"
                                                      action="{{route('recipes.destroy', $recipe->id)}}"
                                                      method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">Delete</button>
                                                </form>
                                            </div>

                                            <!-- Author -->
                                            <p class="float-right small">
                                                By {{$recipe->author->name}}
                                            </p>

                                        </div>

                                        {{--                                        {{$recipe}}--}}

                                    </div>

                                </li>
                            @endforeach

                        </ul>

                        <!-- Pagination -->
                        <div class="d-flex justify-content-center">
                            {{$recipes->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
