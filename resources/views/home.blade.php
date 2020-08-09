@extends('layouts.app')

@section('title', config('app.name'))

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if($recipes)
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel" data-interval="2000">
                        <div class="carousel-inner">
                        @foreach($recipes as $recipe)
                            <div class="carousel-item <?= $loop->first ? 'active' : '' ?>">
                                <div class="jumbotron">
                                    <h1 class="display-4">{{$recipe->name}}</h1>
                                    <hr class="my-4">
                                    <p class="lead">
                                        <a class="btn btn-primary btn-lg" href="{{ route('recipe.show', $recipe) }}" role="button">
                                            Смотреть
                                        </a>
                                    </p>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                @else
                    <div class="jumbotron">
                        <p class="lead">
                            Еще нет рецептов
                        </p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
