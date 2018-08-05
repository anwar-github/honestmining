<?php

namespace App\Http\Controllers;

use App\Http\RequestCore\GiverRequest;
use Core\helper\give\src\service\GiveService;
use Core\helper\request\src\service\RequestService;
use Core\user\giver\src\model\EloquentUserGiver;
use Core\user\giver\src\service\UserGiverService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * Class HomeController
 *
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * @var RequestService $requestService
     */
    protected $requestService;

    /**
     * @var GiveService $giveService
     */
    protected $giveService;

    /**
     * @var UserGiverService $userGiverService
     */
    protected $userGiverService;

    /**
     * HomeController constructor.
     *
     * @param RequestService $requestService
     * @param GiveService $giveService
     * @param UserGiverService $userGiverService
     */
    public function __construct(RequestService $requestService, GiveService $giveService, UserGiverService $userGiverService)
    {
        $this->middleware('auth');
        $this->requestService = $requestService;
        $this->giveService = $giveService;
        $this->userGiverService = $userGiverService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home', [
            'data'  => $this->giveService->getApprovedDone($this->requestService->getAll(), false)
        ]);
    }

    public function create($id)
    {
        $received = $this->giveService->getTotalGived($this->requestService->getById($id));
        $user = Auth::user();

        return view('giver', [
            'data' => [
                'user'      => $user,
                'received'  => $received
            ]
        ]);
    }

    /**
     * @param GiverRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function store(GiverRequest $request)
    {
        DB::transaction(function () use($request) {
            /**
             * @var EloquentUserGiver $userLoged
             */
            $userLoged = Auth::user();
            /**
             * cut balance
             */
            $this->userGiverService->cutBalance($userLoged, $request->input('nilai_bantuan'));
            /**
             * create giver
             */
            return $this->giveService->give($request->all(), $userLoged);
        });


        $done = $this->giveService->getApprovedDone( $this->requestService->getAll());

        return view('bantuan-approved', [
            'data'  => $done
        ]);
    }

    public function show()
    {
        $done = $this->giveService->getApprovedDone( $this->requestService->getAll());

        return view('bantuan-approved', [
            'data'  => $done
        ]);
    }
}
