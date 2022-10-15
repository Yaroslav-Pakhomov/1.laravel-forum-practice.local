<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Theme extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * Таблица, связанная с моделью.
     *
     * @var string
     */
    protected $table = 'themes';

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

    // Транслит русских слов в латиницу
    // public function RusToLat($source=false): array {
    //     if ($source) {
    //         $rus = [
    //             'А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я',
    //             'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я'
    //         ];
    //         $lat = [
    //             'A', 'B', 'V', 'G', 'D', 'E', 'Yo', 'Zh', 'Z', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'H', 'C', 'Ch', 'Sh', 'Shh', '``', 'Y'', '`', 'E`', 'Yu', 'Ya',
    //             'a', 'b', 'v', 'g', 'd', 'e', 'yo', 'zh', 'z', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'shh', '``', 'y'', '`', 'e`', 'yu', 'ya',
    //         ];
    //
    //         return str_replace($rus, $lat, $source);
    //     }
    // }
}
