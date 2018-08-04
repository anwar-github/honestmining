<?php

/**
 * Email: muhammadanwar.dev@gmail.com
 * Date : 04/08/18
 * Time : 11:30
 */

namespace Core\helper\give\src\repository;


use Core\helper\give\src\model\EloquentGiver;
use Prettus\repository\Eloquent\BaseRepository;

class EloquentGiverRepository extends BaseRepository
{
    public function model()
    {
        return EloquentGiver::class;
    }
}