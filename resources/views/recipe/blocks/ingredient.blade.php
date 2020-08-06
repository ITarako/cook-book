<label>Ингридиенты</label>
<div class="ingredient-container">
    @forelse ($ingredients as $idx => $ingredient)
        <div class="row ingredient-item form-group">
            <div class="col-md-7">
                {{ Form::text("ingredients[name][$idx]", $ingredient->name, ['class'=> 'form-control']) }}
            </div>
            <div class="col-md-2">
                {{ Form::select("ingredients[unit_id][$idx]", $unitList, $ingredient->unit_id, [
                    'class'=> 'form-control',
                    'placeholder' => '---'
                ]) }}
            </div>
            <div class="col-md-2">
                {{ Form::number("ingredients[count][$idx]", $ingredient->count, ['class'=> 'form-control']) }}
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
        <div class="row ingredient-item form-group">
            <div class="col-md-7">
                {{ Form::text("ingredients[name][]", null, ['class'=> 'form-control']) }}
            </div>
            <div class="col-md-2">
                {{ Form::select("ingredients[unit_id][]", $unitList, null, [
                    'class'=> 'form-control',
                    'placeholder' => '---'
                ]) }}
            </div>
            <div class="col-md-2">
                {{ Form::number("ingredients[count][]", null, ['class'=> 'form-control']) }}
            </div>
            <div class="col-md-1 js__ingredient-item-button">
                <button class="btn btn-light js__add-ingredient-item"><i class="fas fa-plus"></i></button>
            </div>
        </div>
    @endforelse
</div>
