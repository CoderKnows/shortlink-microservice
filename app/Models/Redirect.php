<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Мэппинг кодов в URL дл редиректа
 * @package App\Models
 *
 * @property integer $id
 * @property string $code - код из URL
 * @property string $url - адрес для редиректа
 * @property boolean $is_active - признак активности
 * @property integer $created_at - когда создан
 * @property integer $updated_at - когда обновлен
 */
class Redirect extends Model
{
    protected $connection = 'pgsql';
    protected $table = 'redirects';

    /**
     * Отношение один-ко-многим (статистика по переходам)
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function statistics()
    {
        return $this->hasMany(RedirectStatistics::class, 'redirect_id', 'id');
    }
}
