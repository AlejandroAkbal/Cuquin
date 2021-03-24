@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">View ingredient</div>

                    <div class="card-body">

                        <!-- Title -->
                        <h4 class="card-title">
                            {{$ingredient->name}}
                        </h4>

                        <!-- Author -->
                        <h5 class="card-subtitle mb-2 text-muted">
                            By {{$ingredient->creator->name}}
                        </h5>

                        <p class="card-text">
                            Used in {{$ingredient->recipes->count()}} recipes.
                        </p>

                        <div>
                            @include('ingredients.partials.edit-actions')
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
