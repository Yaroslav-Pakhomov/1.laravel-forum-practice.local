<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * Таблица, связанная с моделью.
     *
     * @var string
     */
    protected $table = 'sections';

    /**
     * Связь один к одному (каждый пост ИМЕЕТ свою миниатюру), у таблицы 'thumbnails' есть внешний ключ 'post_id', который ссылается на таблицу 'posts'
     */
    // public function thumbnail() {
    //     return $this->hasOne(Thumbnail::class);
    // }
    //
    // /**
    //  * Обратная связь один к одному (каждая миниатюра ПРИНАДЛЕЖИТ посту), у таблицы 'thumbnails' есть внешний ключ 'post_id', который ссылается на таблицу 'posts'
    //  */
    // public function post() {
    //     return $this->belongsTo(Post::class);
    // }

    /**
     * Отношение один ко многим (один раздел ИМЕЕТ несколько тем), у таблицы 'themes' есть внешний ключ 'section_id', который ссылается на таблицу 'sections'
     */
    public function themes(): HasMany
    {
        return $this->hasMany(Theme::class);
    }

}
