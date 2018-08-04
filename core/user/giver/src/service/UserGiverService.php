<?php

/**
 * Email: muhammadanwar.dev@gmail.com
 * Date : 04/08/18
 * Time : 09:34
 */

namespace Core\user\giver\src\service;

use Core\helper\give\src\repository\EloquentGiverRepository;
use Core\helper\give\src\service\GiveService;
use Core\user\giver\src\model\EloquentUserGiver;
use Illuminate\Support\Facades\Auth;

/**
 * Class UserGiverService
 *
 * @package Core\user\giver\src\service
 */
class UserGiverService
{
    /**
     * @var EloquentGiverRepository
     */
    protected $repository;

    /**
     * UserGiverService constructor.
     * @param EloquentGiverRepository $repository
     */
    public function __construct(EloquentGiverRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param EloquentUserGiver $userGiver
     * @param $amount
     * @throws \Exception
     */
    public function cutBalance(EloquentUserGiver $userGiver, $amount)
    {
        if ($amount > $userGiver->getBalance()) {
            throw new \Exception('balance not enought', 422);
        }

        $balance = $userGiver->getBalance() - $amount;

        $userGiver->setBalance($balance);
        $userGiver->save();
    }

    /**
     * @param EloquentUserGiver $userGiver
     * @return int
     */
    public function checkBalance(EloquentUserGiver $userGiver)
    {
        if (GiveService::MAX >  $userGiver->getBalance()) {
            return $userGiver->getBalance();
        }

        return GiveService::MAX;
    }
}