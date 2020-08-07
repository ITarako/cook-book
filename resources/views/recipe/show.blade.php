@extends('layouts.app')
@section('title', config('app.name') . ' | Просмотр рецепта')

@section('content')
    <div class="container">
        @include('blocks.breadcrumbs.index', [
            'breadcrumbs' => [
                ['title' => 'Рецепты', 'url' => route('recipe.index')],
                ['title' => 'Просмотр']
            ]
        ])
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{$model->name}}</h4>
                <p class="card-text">{{$model->description}}</p>
            </div>
        </div>
        <br>
        @if(count($model->ingredients))
            <div class="card">
                <div class="card-header">Ингридиенты</div>
                <ul class="list-group list-group-flush">
                    @foreach($model->ingredients as $ingredient)
                        <li class="list-group-item">{{$ingredient->name}}: {{$ingredient->count}} {{$ingredient->unit->name}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection
