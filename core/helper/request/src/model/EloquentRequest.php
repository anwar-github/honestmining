<?php

/**
 * Email: muhammadanwar.dev@gmail.com
 * Date : 04/08/18
 * Time : 10:46
 */

namespace Core\helper\request\src\model;

use Carbon\Carbon;
use Core\user\asker\src\model\EloquentAsker;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EloquentRequest
 *
 * @package Core\helper\request\src\model
 */
class EloquentRequest extends Model
{
    /**
     * @var string $table
     */
    protected $table = 'bantuan';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function asker()
    {
        return $this->belongsTo(EloquentAsker::class, 'asker_user_id', 'id');
    }

    /**
     * @return EloquentAsker
     */
    public function getAsker(): EloquentAsker
    {
        return $this->asker;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return Carbon
     */
    public function getDate()
    {
        return $this->tanggal;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->judul;
    }

    /**
     * @return int
     */
    public function getTotal(): int
    {
        return $this->jumlah_bantuan;
    }

    /**
     * @return string
     */
    public function getDetail()
    {
        return $this->detail;
    }
}