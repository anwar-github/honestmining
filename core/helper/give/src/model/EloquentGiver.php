<?php

/**
 * Email: muhammadanwar.dev@gmail.com
 * Date : 04/08/18
 * Time : 11:30
 */

namespace Core\helper\give\src\model;

use Core\helper\request\src\model\EloquentRequest;
use Core\user\giver\src\model\EloquentUserGiver;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EloquentGiver
 *
 * @package Core\helper\give\src\model
 */
class EloquentGiver extends Model
{
    /**
     * @var string $table
     */
    protected $table = 'bantuan_giver';

    /**
     * @var array $fillable
     */
    protected $fillable = [
        'tanggal_dibantu',
        'nilai_bantuan',
        'giver_user_id',
        'bantuan_id',
        'balance'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bantuan()
    {
        return $this->belongsTo(EloquentRequest::class, 'bantuan_id');
    }

    /**\
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function giver()
    {
        return $this->belongsTo(EloquentUserGiver::class, 'giver_user_id');
    }

    /**
     * @return mixed
     */
    public function getBantuan()
    {
        return $this->bantuan;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->tanggal_dibantu;
    }

    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->nilai_bantuan;
    }

}