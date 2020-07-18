@extends('layouts.app')
@section('title', config('app.name') . ' | Категория ' . $model->name)

@section('content')
    <div class="container">
        @include('blocks.breadcrumbs.index', [
           'breadcrumbs' => [
               ['title' => 'Категории', 'url' => route('category.index')],
               ['title' => 'Редактирование']
           ]
       ])
        <div class="card">
            <div class="card-header">Редактировать категорию</div>
            <div class="card-body">
                {{ Form::open(['route' => ['category.update', $model->id], 'method' => 'PUT']) }}
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
                </div>
                <div class="form-group">
                    {{ Form::submit('Сохранить', ['class' => 'btn btn-success']) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
@endsection
