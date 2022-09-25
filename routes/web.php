<?php

declare(strict_types=1);

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\ThemeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', static function () {
//     return view('welcome');
// });


// ----------------------
// Форум - начало
// ----------------------

// Раздел
Route::controller(SectionController::class)->group(function () {
    Route::name('section.')->group(function () {
        // Главная с разделами
        Route::get('/', 'index')->name('index');

        // Страница раздела
        Route::get('/section/{slug_section}', 'show')->where('slug_section', '[a-z0-9_-]+')->name('show');
    });
});

// Тема
Route::controller(ThemeController::class)->group(function () {
    Route::prefix('/section/{slug_section}/')->group(function () {
        Route::name('theme.')->group(function () {
            // Страница темы
            Route::get('/{slug_theme}', 'index')->where('slug_section', '[a-z0-9_-]+')->where('slug_theme',
                                                                                              '[a-z0-9_-]+')->name('index');
        });

        // Создание темы
        Route::get('create', 'create')->whereNumber('id')->name('create');
        Route::post('/', 'store')->whereNumber('id')->name('store');

        // Редактирование темы
        Route::get('/{slug_theme}/edit', 'edit')->where('slug_section', '[a-z0-9_-]+')->where('slug_theme',
                                                                                              '[a-z0-9_-]+')->name('edit');
        Route::patch('/{slug_theme}', 'update')->where('slug_section', '[a-z0-9_-]+')->where('slug_theme',
                                                                                             '[a-z0-9_-]+')->name('update');

        // Удаление темы
        Route::delete('/{slug_theme}', 'delete')->where('slug_section', '[a-z0-9_-]+')->where('slug_theme',
                                                                                              '[a-z0-9_-]+')->name('delete');
    });
});

// Автор
Route::controller(AuthorController::class)->group(function () {
    Route::prefix('/author')->group(function () {
        Route::name('author.')->group(static function () {
            // Главная с разделами
            Route::get('/', 'index')->name('index');

            // Страница раздела
            Route::get('/{login}', 'show')->whereAlphaNumeric('login')->name('show');
        });
    });
});

// ----------------------
// Форум - конец
// ----------------------
