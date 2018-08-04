<?php

/**
 * Email: muhammadanwar.dev@gmail.com
 * Date : 04/08/18
 * Time : 10:00
 */

namespace Core\helper\give\src\service;

use Carbon\Carbon;
use Core\helper\give\src\model\EloquentGiver;
use Core\helper\give\src\repository\EloquentGiverRepository;
use Core\helper\request\src\model\EloquentRequest;
use Core\user\giver\src\model\EloquentUserGiver;
use Illuminate\Support\Facades\Auth;

/**
 * Class GiveService
 *
 * @package Core\helper\give\src\service
 */
class GiveService
{
    const MAX = 5000000; // 5m
    const MIN = 100000;  // 100k

    /**
     * @var EloquentGiverRepository $repository
     */
    protected $repository;

    /**
     * GiveService constructor.
     *
     * @param EloquentGiverRepository $repository
     */
    public function __construct(EloquentGiverRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param $input
     * @param EloquentUserGiver $userGiver
     * @return mixed
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     * @throws \Exception
     */
    public function give($input, EloquentUserGiver $userGiver)
    {
        $this->validate($input, $userGiver);

        //TODO: change to associated
        $input['giver_user_id'] = $userGiver->getId();
        $input['tanggal_dibantu'] = Carbon::now();

        return $this->repository->create($input);
    }

    /**
     * @param $request
     * @return array
     */
    public function getApprovedDone($request)
    {
        $data = [];
        /**
         * @var EloquentRequest $value
         */
        foreach ($request as $key => $value) {

            $total = $this->getTotalGived($value);

            if ($value->getTotal() <= $total->amount) {

                $data[] = $total;

            }
        }

        return $data;
    }


    /**
     * @param EloquentRequest $request
     * @return mixed
     */
    public function getTotalGived(EloquentRequest $request)
    {
        $giver = $this->repository->findWhere([
            'bantuan_id'    => $request->getId()
        ]);

        $request->amount = (int)$giver->sum('nilai_bantuan');
        $request->total = (int)$giver->count();

        return $request;
    }

    /**
     * @param EloquentRequest $request
     * @return EloquentGiver
     */
    public function getByRequestId(EloquentRequest $request): EloquentGiver
    {
        return $this->repository->findWhere([
            'bantuan_id'    => $request->getId()
        ]);
    }

    /**
     * @param $input
     * @param $userGiver
     * @return bool
     * @throws \Exception
     */
    public function validate($input, $userGiver): bool
    {
        if (isset($input['nilai_bantuan'])) {
            $this->allowedAmount($input['nilai_bantuan'], $userGiver);
        }

        return true;
    }

    /**
     * @param int $amount
     * @param EloquentUserGiver $userGiver
     * @return bool
     * @throws \Exception
     */
    public function allowedAmount($amount, EloquentUserGiver $userGiver): bool
    {
        //TODO: change to custom exception
        if ($amount >  self::MAX) {
            throw new \Exception('nilai bantuan tidak diijinkan', 422);
        }

        if ($amount < self::MIN) {
            throw new \Exception('nilai bantuan tidak diijinkan', 422);
        }

        return true;
    }
}