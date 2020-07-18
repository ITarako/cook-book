<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

/**
 * Class Recipe
 *
 * @package App\Models
 * @property int $id
 * @property string name
 * @property string $description
 * @property int $category_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @method static Recipe newModelQuery()
 * @method static Recipe newQuery()
 * @method static Recipe onlyTrashed()
 * @method static Recipe query()
 * @method static Recipe whereCreatedAt($value)
 * @method static Recipe whereDeletedAt($value)
 * @method static Recipe whereDescription($value)
 * @method static Recipe whereId($value)
 * @method static Recipe wherePriority($value)
 * @method static Recipe whereTitle($value)
 * @method static Recipe whereUpdatedAt($value)
 * @method static Recipe withTrashed()
 * @method static Recipe withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Recipe whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Recipe whereName($value)
 * @property string $name
 * @property-read \App\Models\Category $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Ingredient[] $ingredients
 * @property-read int|null $ingredients_count
 */
class Recipe extends Model
{
    use SoftDeletes;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }
}
