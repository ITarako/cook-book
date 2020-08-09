@extends('layouts.app')

@section('title', config('app.name'))

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="jumbotron">
                    @if($randomRecipe)
                        <h1 class="display-4">{{$randomRecipe->name}}</h1>
                        <hr class="my-4">
                        <p class="lead">
                            <a class="btn btn-primary btn-lg" href="{{ route('recipe.show', $randomRecipe) }}" role="button">
                                Смотреть
                            </a>
                        </p>
                    @else
                        <p class="lead">
                            Еще нет рецептов
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
