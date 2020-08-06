<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Ingredient
 *
 * @property int $id
 * @property string $name
 * @property float $count
 * @property int $recipe_id
 * @property int $unit_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Recipe $recipe
 * @property-read \App\Models\Unit $unit
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ingredient newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ingredient newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ingredient query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ingredient whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ingredient whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ingredient whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ingredient whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ingredient whereRecipeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ingredient whereUnitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ingredient whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Ingredient extends Model
{
    public $fillable = ['name', 'count', 'unit_id', 'recipe_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
