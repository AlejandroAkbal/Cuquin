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

                                            <!-- Link -->
                                            <a href="" class="btn btn-primary">Read</a>

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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
