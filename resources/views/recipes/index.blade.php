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
                                        <div class="card-header">
                                            <a href="">{{$recipe->name}}</a>
                                        </div>

                                        <div class="card-body">
                                            <p>
                                                {{$recipe->description}}
                                            </p>

                                            <p>
                                                {{$recipe->instructions}}
                                            </p>

                                        </div>

                                        <div class="card-footer">
                                            By {{$recipe->author->name}}
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
