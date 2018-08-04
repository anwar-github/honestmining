<?php

/**
 * Email: muhammadanwar.dev@gmail.com
 * Date : 04/08/18
 * Time : 10:56
 */

namespace Core\helper\request\src\service;
use Core\helper\request\src\repository\EloquentRequestRepository;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class RequestService
 *
 * @package Core\helper\request\src\service
 */
class RequestService
{
    protected $repository;

    /**
     * RequestService constructor.
     *
     * @param EloquentRequestRepository $repository
     */
    public function __construct(EloquentRequestRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param int $limit
     * @return LengthAwarePaginator
     */
    public function getRequestWithPaginate($limit = 15): LengthAwarePaginator
    {
        return $this->repository->paginate($limit);
    }

    public function getAll()
    {
        return $this->repository->all();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getById($id)
    {
        return $this->repository->find($id);
    }
}