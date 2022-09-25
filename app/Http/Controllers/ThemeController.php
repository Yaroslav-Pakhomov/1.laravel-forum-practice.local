<?php

declare(strict_types=1);

namespace App\Http\Controllers;

class ThemeController extends Controller
{
    // Страница темы
    public function index($id, $theme_id): string
    {
        return 'Тема ' . $theme_id . ' раздела ' . $id;
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
    public function edit($id, $theme_id): string
    {
        return 'Редактирование темы ' . $theme_id . ' раздела ' . $id;
    }

    public function update($id, $theme_id): string
    {
        return 'Редактирование темы ' . $theme_id . ' раздела ' . $id;
    }

    // Редактирование темы - конец

    // Удаление темы
    public function delete($id, $theme_id): string
    {
        return 'Удаление темы ' . $theme_id . ' раздела ' . $id;
    }
}
