<?php

/**
 * Email: muhammadanwar.dev@gmail.com
 * Date : 04/08/18
 * Time : 10:24
 */

namespace Core\user\giver\src\model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class EloquentUserGiver
 * @package Core\user\giver\src\model
 */
class EloquentUserGiver extends Authenticatable
{
    use Notifiable;

    const ACTIVE = 1;
    const BALANCE_REGISTER = 10000000;

    protected $table = 'user_giver';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','balance', 'active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    /**
     * @return int
     */
    public function getBalance(): int
    {
        return $this->balance;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    public function setBalance($balance)
    {
        return $this->balance = $balance;
    }
}