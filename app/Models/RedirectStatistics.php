<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RedirectStatistics
 * @package App\Models
 *
 * @property integer $id
 * @property string $ip
 * @property string $referrer
 * @property integer $redirect_id
 * @property integer $created_at
 * @property integer $updated_at
 */
class RedirectStatistics extends Model
{
    protected $connection = 'pgsql';
    protected $table = 'redirect_statistics';

    /**
     * Отношение много-к-одному (статистика переходов по ссылке)
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function redirect()
    {
        return $this->belongsTo(Redirect::class, 'redirect_id', 'id');
    }

}
