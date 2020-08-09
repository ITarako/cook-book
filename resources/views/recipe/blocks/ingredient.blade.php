<label>Ингридиенты</label>
<div class="js__ingredient-container">
    @forelse ($ingredients as $idx => $ingredient)
        <div class="row ingredient-item form-group" data-idx="{{$idx}}">
            <div class="col-md-7">
                {{ Form::text("ingredients[$idx][name]", $ingredient->name, ['class'=> 'form-control js__ingredient-item-name']) }}
            </div>
            <div class="col-md-2">
                {{ Form::number("ingredients[$idx][count]", $ingredient->count, ['class'=> 'form-control js__ingredient-item-count']) }}
            </div>
            <div class="col-md-2">
                {{ Form::select("ingredients[$idx][unit_id]", $unitList, $ingredient->unit_id, [
                     'class'=> 'form-control js__ingredient-item-unit_id',
                    'placeholder' => '---'
                ]) }}
            </div>
            <div class="col-md-1 js__ingredient-item-button">
                @if ($loop->first)
                    <button class="btn btn-light js__add-ingredient-item"><i class="fas fa-plus"></i></button>
                @else
                    <button class="btn btn-danger js__remove-ingredient-item"><i class="fas fa-times"></i></button>
                @endif
            </div>
        </div>
    @empty
        <div class="row ingredient-item form-group" data-idx="0">
            <div class="col-md-7">
                {{ Form::text("ingredients[0][name]", null, ['class'=> 'form-control js__ingredient-item-name']) }}
            </div>
            <div class="col-md-2">
                {{ Form::number("ingredients[0][count]", null, ['class'=> 'form-control js__ingredient-item-count']) }}
            </div>
            <div class="col-md-2">
                {{ Form::select("ingredients[0][unit_id]", $unitList, null, [
                    'class'=> 'form-control js__ingredient-item-unit_id',
                    'placeholder' => '---'
                ]) }}
            </div>
            <div class="col-md-1 js__ingredient-item-button">
                <button class="btn btn-light js__add-ingredient-item"><i class="fas fa-plus"></i></button>
            </div>
        </div>
    @endforelse
</div>
