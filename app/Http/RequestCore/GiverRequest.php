<?php

namespace App\Http\RequestCore;

use Core\helper\give\src\service\GiveService;
use Core\user\giver\src\service\UserGiverService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class GiverRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        /**
         * @var UserGiverService $balanceAllowed
         */
        $balanceAllowed = app(UserGiverService::class);

        return [
            'nilai_bantuan'     => 'required|numeric|max:' . $balanceAllowed->checkBalance(Auth::user()) . '|min:100000'
        ];
    }
}
