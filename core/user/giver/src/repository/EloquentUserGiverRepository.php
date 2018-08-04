<?php

/**
 * Email: muhammadanwar.dev@gmail.com
 * Date : 04/08/18
 * Time : 17:55
 */

namespace Core\user\giver\src\repository;

use Core\user\giver\src\model\EloquentUserGiver;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class EloquentUserGiverRepository
 *
 * @package Core\user\giver\src\repository
 */
class EloquentUserGiverRepository extends BaseRepository
{
    public function model()
    {
        return EloquentUserGiver::class;
    }
}