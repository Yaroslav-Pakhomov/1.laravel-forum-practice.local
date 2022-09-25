<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Section;
use Illuminate\Contracts\View\View;

class AuthorController extends Controller
{
    public function index(): View
    {
        $title = 'Список всех авторов';
        $authors = Author::all();

        return view('author.index', compact('title', 'authors'));
    }

    public function show($login): View
    {
        $title = 'Профиль автора';
        $author =  Author::query()->where('login', $login)->first();

        return view('author.show', compact('title', 'author'));
    }
}
