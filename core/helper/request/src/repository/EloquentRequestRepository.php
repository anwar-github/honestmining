<?php

/**
 * Email: muhammadanwar.dev@gmail.com
 * Date : 04/08/18
 * Time : 10:55
 */

namespace Core\helper\request\src\repository;

use Core\helper\request\src\model\EloquentRequest;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class EloquentRequestRepository
 *
 * @package Core\helper\request\src\repository
 */
class EloquentRequestRepository extends BaseRepository
{
    public function model()
    {
        return EloquentRequest::class;
    }
}