@extends('layouts.app')
@section('title', config('app.name') . ' | Создание рецепт')

@section('content')
    <div class="container">
        @include('blocks.breadcrumbs.index', [
            'breadcrumbs' => [
                ['title' => 'Рецепты', 'url' => route('recipe.index')],
                ['title' => 'Создание']
            ]
        ])
        <div class="card">
            <div class="card-header">Создать рецепт</div>
            <div class="card-body">
                {{ Form::open(['route' => 'recipe.store']) }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('name', 'Название') }}
                            {{ Form::text('name', null, ['class'=> 'form-control' . ($errors->has('name') ? ' is-invalid' : '')]) }}
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                 </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('category_id', 'Категория') }}
                            {{ Form::select('category_id', $categoryList, null, [
                                'class'=> 'form-control' . ($errors->has('category_id') ? ' is-invalid' : ''),
                                'placeholder' => 'Выберите категорию'
                            ]) }}
                            @error('category_id')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                 </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        @include('recipe.blocks.ingredient')
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {{ Form::label('description', 'Способ приготовления') }}
                            {{ Form::textarea('description', null, ['class'=> 'form-control' . ($errors->has('description') ? ' is-invalid' : '')]) }}
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                 </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::submit('Сохранить', ['class' => 'btn btn-success']) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
