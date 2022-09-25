<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Contracts\View\View;

class SectionController extends Controller
{
    public function index(): View
    {
        $title = 'Список всех разделов';
        $sections = Section::all();

        return view('section.index', compact('title', 'sections'));
    }

    public function show(Section $section): View
    {
        $title = 'Страница раздела';

        return view('section.show', compact('title', 'section'));
    }
}
