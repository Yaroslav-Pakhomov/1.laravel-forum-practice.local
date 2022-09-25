<?php
declare(strict_types=1);

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
        Route::get('/{id}', 'show')->whereNumber('id')->name('show');
    });
});

// Тема
Route::controller(ThemeController::class)->group(function () {
    Route::prefix('/{id}/theme')->group(function () {
        Route::name('theme.')->group(function () {

        // Страница темы
        Route::get('/{theme_id}', 'index')->whereNumber(['id', 'theme_id'])->name('index');
        });

        // Создание темы
        Route::get('create', 'create')->whereNumber('id')->name('create');
        Route::post('/', 'store')->whereNumber('id')->name('store');

        // Редактирование темы
        Route::get('/{theme_id}/edit', 'edit')->whereNumber(['id', 'theme_id'])->name('edit');
        Route::patch('/{theme_id}', 'update')->whereNumber(['id', 'theme_id'])->name('update');

        // Удаление темы
        Route::delete('/{theme_id}', 'delete')->whereNumber(['id', 'theme_id'])->name('delete');
    });
});





// ----------------------
// Форум - конец
// ----------------------
