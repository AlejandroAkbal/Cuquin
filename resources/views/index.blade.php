@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">

                        <div class="list-group list-group-flush">

                            <a href="{{route('recipes.index')}}" class="list-group-item list-group-item-action">
                                Recipes
                            </a>

                            <a href="{{route('ingredients.index')}}" class="list-group-item list-group-item-action">
                                Ingredients
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
