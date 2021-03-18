@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">Recipe</div>

                    <div class="card-body">

                        <!-- Title -->
                        <h4 class="card-title">
                            {{$recipe->name}}
                        </h4>

                        <!-- Author -->
                        <p class="text-muted small">
                            By {{$recipe->author->name}}
                        </p>

                        <!-- Content -->
                        <p class="card-text">
                            {{$recipe->description}}
                        </p>

                        <p class="card-text">
                            {{$recipe->instructions}}
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
