@extends('layouts.app')

@section('title', ($isEditing ? 'Edit' : 'Create') . ' ingredient')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>
                                    {{ $error }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card">

                    <div class="card-header">{{$isEditing ? 'Edit' : 'Create'}} ingredient</div>

                    <div class="card-body">

                        <form
                            action="{{$isEditing ? route('ingredients.update', $ingredient) : route('ingredients.store')}}"
                            method="POST">
                            @csrf
                            @if($isEditing)
                                @method('PUT')
                            @endif

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                       placeholder="Carrot" value="{{old('name', $ingredient->name ?? null)}}"
                                       required>
                            </div>

                            <button type="submit"
                                    class="btn btn-primary">{{$isEditing ? 'Edit' : 'Create'}}</button>

                        </form>
                    </div>

                </div>


            </div>
        </div>
    </div>
@endsection
