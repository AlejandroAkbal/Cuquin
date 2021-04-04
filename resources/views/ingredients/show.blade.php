@extends('layouts.app')


@section('title', $ingredient->name . ' ingredient')

@section('content')
    <div class="container">

        <div class="card">

            <div class="card-body">

                <!-- Title -->
                <h1 class="card-title font-weight-bold">
                    {{$ingredient->name}}
                </h1>

                <!-- Author -->
                <h5 class="card-subtitle text-muted">
                    By {{$ingredient->creator->name}}
                </h5>

                <hr/>

                <p class="card-text">
                    Used in {{$ingredient->recipes->count()}} recipes.
                </p>

                <div>
                    @include('ingredients.partials.edit-actions')
                </div>

            </div>

        </div>
    </div>
@endsection
