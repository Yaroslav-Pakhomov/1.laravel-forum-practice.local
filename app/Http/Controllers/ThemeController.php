<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Theme\StoreThemeRequest;
use App\Http\Requests\Theme\UpdateThemeRequest;
use App\Models\Post;
use App\Models\Section;
use App\Models\Theme;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ThemeController extends Controller
{
    // Страница темы
    public function index(Section $section, Theme $theme): View
    {
        $title = 'Страница тема';
        $posts = Post::where('theme_id', $theme->id)->with([ 'author', ])->latest('updated_at')->paginate(10);

        return view('theme.index', compact('title','section', 'theme', 'posts'));
    }

    // Создание темы - начало
    public function create(Section $section): View
    {
        $title = 'Создание темы в разделе "' . $section->title . '"';

        return view('theme.create', compact('title', 'section'));
    }

    public function store(StoreThemeRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $section = Section::where('slug', $validated['section_slug'])->firstOrFail();
        $data['title'] = $validated['title'];
        $data['slug'] = Theme::rusToLat($data['title']);
        $data['author_id'] = 1;
        $data['section_id'] = $section->id;
        Theme::create($data);

        return redirect()->route('section.show', [ $validated['section_slug'] ]);
    }
    // Создание темы - конец

    // Редактирование темы - начало
    public function edit(Section $section, Theme $theme): View
    {
        $title = 'Редактирование темы в разделе "' . $section->title . '"';

        return view('theme.edit', compact('title', 'section', 'theme'));
    }

    public function update(UpdateThemeRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $data['title'] = $validated['title'];
        $data['slug'] = Theme::rusToLat($data['title']);
        Theme::where('slug', $validated['theme_slug'])->update($data);

        return redirect()->route('section.show', [ $validated['section_slug'] ]);
    }
    // Редактирование темы - конец

    // Удаление темы
    public function delete(Section $section, Theme $theme): RedirectResponse
    {
        $theme->delete();

        return redirect()->route('section.show', [ $section->slug, ]);
    }
}
