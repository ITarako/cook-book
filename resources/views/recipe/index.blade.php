@extends('layouts.app')
@section('title', config('app.name') . ' | Рецепты')

@section('content')
    <div class="container">
        @include('blocks.breadcrumbs.index', [
            'breadcrumbs' => [
                ['title' => 'Рецепты']
            ]
        ])
        <div class="pb-3">
            <a class="btn btn-primary" href="{{route('recipe.create')}}" role="button">Создать рецепт</a>
        </div>
        <table class="table table-striped"><thead>
            <tr>
                <th scope="col">Название</th>
                <th scope="col">Категория</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
            @each('recipe.blocks.item', $models, 'model')
            </tbody>
        </table>

        {{ $models->links() }}
    </div>
@endsection
