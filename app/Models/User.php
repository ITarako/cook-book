<?php

namespace App\Models;

//use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Carbon;
use Illuminate\Notifications\Notifiable;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static User newModelQuery()
 * @method static User newQuery()
 * @method static User query()
 * @method static User whereCreatedAt($value)
 * @method static User whereEmail($value)
 * @method static User whereId($value)
 * @method static User whereName($value)
 * @method static User wherePassword($value)
 * @method static User whereRememberToken($value)
 * @method static User whereUpdatedAt($value)
 */
class User extends Authenticatable
{
//    use Notifiable;

    protected $table = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
//    protected $casts = [
//        'email_verified_at' => 'datetime',
//    ];
}
