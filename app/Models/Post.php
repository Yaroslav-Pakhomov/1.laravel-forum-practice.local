<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * Таблица, связанная с моделью.
     *
     * @var string
     */
    protected $table = 'posts';

    /**
     * Обратная связь один ко многим (каждая тема ПРИНАДЛЕЖИТ разделу), у таблицы 'themes' есть внешний ключ 'section_id', который ссылается на таблицу 'sections'
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }
}
