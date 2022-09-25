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
        Route::get('/section/{section:slug}', 'show')->where('section:slug', '[a-z0-9_-]+')->name('show');
    });
});

// Тема
Route::controller(ThemeController::class)->group(function () {
    Route::prefix('/section/{section:slug}')->group(function () {
        Route::name('theme.')->group(function () {
            // Создание темы
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');

            // Страница темы
            Route::get('/{theme:slug}', 'index')->where('section:slug', '[a-z0-9_-]+')->where('theme:slug', '[a-z0-9_-]+')->name('index');

            // Редактирование темы
            Route::get('/{theme:slug}/edit', 'edit')->where('section:slug', '[a-z0-9_-]+')->where('theme:slug', '[a-z0-9_-]+')->name('edit');
            Route::patch('/{theme:slug}', 'update')->where('section:slug', '[a-z0-9_-]+')->where('theme:slug', '[a-z0-9_-]+')->name('update');

            // Удаление темы
            Route::delete('/{theme:slug}', 'delete')->where('section:slug', '[a-z0-9_-]+')->where('theme:slug', '[a-z0-9_-]+')->name('delete');
        });
    });
});

// Автор
Route::controller(AuthorController::class)->group(function () {
    Route::prefix('/author')->group(function () {
        Route::name('author.')->group(static function () {
            // Главная с разделами
            Route::get('/', 'index')->name('index');

            // Страница раздела
            Route::get('/{author:login}', 'show')->where('author:login', '[a-z0-9_-]+')->name('show');
        });
    });
});

// ----------------------
// Форум - конец
// ----------------------
//
// Auth::routes();
//
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//
// Auth::routes();
//
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
