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
 * @property string $title
 * @property string $description
 * @property int|null $priority
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
 */
class Recipe extends Model
{
    use SoftDeletes;

    protected $table = 'recipe';
}
