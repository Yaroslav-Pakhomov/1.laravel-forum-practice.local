<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Contracts\View\View;

class ThemeController extends Controller
{
    // Страница темы
    public function index($slug_section, $slug_theme): View
    {
        $title = 'Страница тема';

        $theme = Theme::query()->where('slug', $slug_theme)->get();

        return view('theme.index', compact('title', 'theme'));
    }

    // Создание темы - начало
    public function create($id): string
    {
        return 'Создание темы в разделе ' . $id;
    }

    public function store($id): string
    {
        return 'Создание темы в разделе ' . $id;
    }
    // Создание темы - конец

    // Редактирование темы - начало
    public function edit($slug_section, $slug_theme): string
    {
        return 'Редактирование темы ' . $slug_theme . ' раздела ' . $slug_section;
    }

    public function update($slug_section, $slug_theme): string
    {
        return 'Редактирование темы ' . $slug_theme . ' раздела ' . $slug_section;
    }

    // Редактирование темы - конец

    // Удаление темы
    public function delete($slug_section, $slug_theme): string
    {
        return 'Удаление темы ' . $slug_theme . ' раздела ' . $slug_section;
    }
}
