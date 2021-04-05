@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="container">

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <h1 class="display-4">{{ config('app.name') }}</h1>

        <h2 class="lead font-weight-bold">Your online cookbook</h2>

        <hr>

        <h3 class="lead">{{ config('app.name') }} allows you to...</h3>

        <ul class="list-unstyled space-y-4">
            <li class="d-flex flex-row mt-4 space-x-4">
                <svg class="text-primary" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                     width="24" height="24">
                    <path fill-rule="evenodd"
                          d="M17.263 2.177a1.75 1.75 0 012.474 0l2.586 2.586a1.75 1.75 0 010 2.474L19.53 10.03l-.012.013L8.69 20.378a1.75 1.75 0 01-.699.409l-5.523 1.68a.75.75 0 01-.935-.935l1.673-5.5a1.75 1.75 0 01.466-.756L14.476 4.963l2.787-2.786zm-2.275 4.371l-10.28 9.813a.25.25 0 00-.067.108l-1.264 4.154 4.177-1.271a.25.25 0 00.1-.059l10.273-9.806-2.94-2.939zM19 8.44l2.263-2.262a.25.25 0 000-.354l-2.586-2.586a.25.25 0 00-.354 0L16.061 5.5 19 8.44z"></path>
                </svg>

                <span>Write your own recipes</span>
            </li>

            <li class="d-flex flex-row mt-4 space-x-4">
                <svg class="text-primary" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                     width="24" height="24">
                    <path fill-rule="evenodd"
                          d="M0 3.75A.75.75 0 01.75 3h7.497c1.566 0 2.945.8 3.751 2.014A4.496 4.496 0 0115.75 3h7.5a.75.75 0 01.75.75v15.063a.75.75 0 01-.755.75l-7.682-.052a3 3 0 00-2.142.878l-.89.891a.75.75 0 01-1.061 0l-.902-.901a3 3 0 00-2.121-.879H.75a.75.75 0 01-.75-.75v-15zm11.247 3.747a3 3 0 00-3-2.997H1.5V18h6.947a4.5 4.5 0 012.803.98l-.003-11.483zm1.503 11.485V7.5a3 3 0 013-3h6.75v13.558l-6.927-.047a4.5 4.5 0 00-2.823.971z"></path>
                </svg>

                <span>Browse through other user's recipes</span>
            </li>

            <li class="d-flex align-items-center flex-row mt-4 space-x-4">
                <svg class="text-primary" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                     width="24" height="24">
                    <path fill-rule="evenodd"
                          d="M12.53 1.22a.75.75 0 00-1.06 0L8.22 4.47a.75.75 0 001.06 1.06l1.97-1.97v10.69a.75.75 0 001.5 0V3.56l1.97 1.97a.75.75 0 101.06-1.06l-3.25-3.25zM5.5 9.75a.25.25 0 01.25-.25h2.5a.75.75 0 000-1.5h-2.5A1.75 1.75 0 004 9.75v10.5c0 .966.784 1.75 1.75 1.75h12.5A1.75 1.75 0 0020 20.25V9.75A1.75 1.75 0 0018.25 8h-2.5a.75.75 0 000 1.5h2.5a.25.25 0 01.25.25v10.5a.25.25 0 01-.25.25H5.75a.25.25 0 01-.25-.25V9.75z"></path>
                </svg>

                <span>Share recipes</span>
            </li>
        </ul>


        <h1 class="mt-5">Latest recipes</h1>

        <h2 class="lead">That our users have added</h2>

        <hr>

        <ul class="list-unstyled space-y-4">

            @forelse($recipes as $recipe)

                <x-content-card
                    title="{{$recipe->name}}"
                    text="{{Str::limit($recipe->description, 150)}}"
                    img="{{$recipe->image}}"
                >
                    <!-- actions -->
                    <div>
                        <a href="{{ route('recipes.show', $recipe) }}"
                           class="btn btn-primary">
                            Read
                        </a>

                        @include('recipes.partials.edit-actions')
                    </div>

                </x-content-card>

            @empty
                <li class="my-4">There are no recipes. You should create one!</li>
            @endforelse

        </ul>

        <div class="text-center">
            <a href="{{ route('recipes.index') }}" class="btn btn-primary btn-lg">View all recipes</a>
        </div>

    </div>
@endsection
