@extends('layouts.app')

@section('title', config('app.name'))

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="jumbotron">
                    <h1 class="display-4">{{$randomRecipe->name}}</h1>
                    <hr class="my-4">
                    <p class="lead">
                        <a class="btn btn-primary btn-lg" href="{{ route('recipe.show', $randomRecipe) }}" role="button"
                           target="_blank">
                            Смотреть
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
