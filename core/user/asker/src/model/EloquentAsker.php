<?php

/**
 * Email: muhammadanwar.dev@gmail.com
 * Date : 04/08/18
 * Time : 10:52
 */

namespace Core\user\asker\src\model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EloquentAsker
 *
 * @package Core\user\asker\src\model
 */
class EloquentAsker extends Model
{
    /**
     * @var string $table
     */
    protected $table = 'user_asker';

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}