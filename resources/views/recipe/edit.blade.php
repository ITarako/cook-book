@extends('layouts.app')
@section('title', config('app.name') . ' | Рецепт ' . $model->name)

@section('content')
    <div class="container">
        @include('blocks.breadcrumbs.index', [
            'breadcrumbs' => [
                ['title' => 'Рецепты', 'url' => route('recipe.index')],
                ['title' => 'Редактирование']
            ]
        ])
        <div class="card">
            <div class="card-header">Редактировать рецепт</div>
            <div class="card-body">
                {{ Form::open(['route' => ['recipe.update', $model->id], 'method' => 'PUT']) }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('name', 'Название') }}
                            {{ Form::text('name', $model->name, ['class'=> 'form-control' . ($errors->has('name') ? ' is-invalid' : '')]) }}
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
                            {{ Form::select('category_id', $categoryList, $model->category_id, [
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
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('description', 'Способ приготовления') }}
                            {{ Form::textarea('description', $model->description, ['class'=> 'form-control' . ($errors->has('description') ? ' is-invalid' : '')]) }}
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
@endsection
