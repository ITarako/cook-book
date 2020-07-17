@extends('layouts.app')
@section('title', config('app.name') . ' | Категории')

@section('content')
    <div class="container">
        <div class="pb-3">
            <a class="btn btn-primary" href="{{route('category.create')}}" role="button">Создать категорию</a>
        </div>
        <table class="table table-striped"><thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Название</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
            @each('category.blocks.item', $models, 'model')
            </tbody>
        </table>

        {{ $models->links() }}
    </div>
@endsection
