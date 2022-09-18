<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Eloquent;

/**
 * Post
 *
 * @mixin Eloquent
 */
class Theme extends Model
{
    use HasFactory;

    // Мягкое удаление
    use SoftDeletes;

    /**
     * Таблица, связанная с моделью.
     *
     * @var string
     */
    protected $table = 'themes';

    /**
     * Атрибуты, которые не могут быть назначены массово.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Обратная связь один ко многим (каждая тема ПРИНАДЛЕЖИТ разделу), у таблицы 'themes' есть внешний ключ 'section_id', который ссылается на таблицу 'sections'
     */
    public function section(): BelongsTo
    {
        return $this->belongsTo(Section::class);
    }

    /**
     * Обратная связь один ко многим (каждая тема ПРИНАДЛЕЖИТ разделу), у таблицы 'themes' есть внешний ключ 'section_id', который ссылается на таблицу 'sections'
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    /**
     * Отношение один ко многим (одна тема ИМЕЕТ несколько постов), у таблицы 'posts' есть внешний ключ 'theme_id', который ссылается на таблицу 'themes'
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function postsWithAuthor(): HasMany
    {
        return $this->hasMany(Post::class)->with([ 'author', ])->latest('updated_at');
    }

    // Транслит русских слов в латиницу
    public static function rusToLat($value): string
    {
        $converter = array(
            'а' => 'a',    'б' => 'b',    'в' => 'v',    'г' => 'g',    'д' => 'd',
            'е' => 'e',    'ё' => 'e',    'ж' => 'zh',   'з' => 'z',    'и' => 'i',
            'й' => 'y',    'к' => 'k',    'л' => 'l',    'м' => 'm',    'н' => 'n',
            'о' => 'o',    'п' => 'p',    'р' => 'r',    'с' => 's',    'т' => 't',
            'у' => 'u',    'ф' => 'f',    'х' => 'h',    'ц' => 'c',    'ч' => 'ch',
            'ш' => 'sh',   'щ' => 'sch',  'ь' => '',     'ы' => 'y',    'ъ' => '',
            'э' => 'e',    'ю' => 'yu',   'я' => 'ya',
        );

        $value = mb_strtolower($value);
        $value = strtr($value, $converter);
        $value = mb_ereg_replace('[^-0-9a-z]', '-', $value);
        $value = mb_ereg_replace('[-]+', '-', $value);
        return trim($value, '-');
    }
}
