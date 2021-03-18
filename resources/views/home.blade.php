@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <ul class="list-group">

                            <li class="list-group-item list-group-item-action">
                                <a href="{{route('recipes.index')}}">
                                    View recipes
                                </a>
                            </li>

                            <li class="list-group-item list-group-item-action">
                                <a href="{{route('recipes.create')}}">Create recipe</a>
                            </li>

                            <li class="list-group-item list-group-item-action">
                                <a href="">View ingredients</a>
                            </li>

                            <li class="list-group-item list-group-item-action">
                                <a href="">Create ingredients</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
