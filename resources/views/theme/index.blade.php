<x-layout>
    <x-slot:title>
        {{ $title }}
    </x-slot>

    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('section.index') }}">Все разделы</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a
                    href="{{ route('section.show', [$theme->section->slug]) }}">Текущий разделы</a></li>
        </ol>
    </nav>

    <p>
        <a class="btn btn-primary" data-bs-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Тема</a>
    </p>
    <div class="row">
        <div class="col">
            <div class="collapse multi-collapse" id="multiCollapseExample1">
                <div class="card card-body">
                    <p>
                        ID темы: {{ $theme->id }}
                    </p>
                    <p>
                        Название темы: {{ $theme->title }}
                    </p>
                    <p>
                        Название раздела темы: {{ $theme->section->title }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <p>
        <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            Автор
        </a>
    </p>
    <div class="collapse" id="collapseExample">
        <div class="card card-body">
            <p>
                ID автора: {{ $theme->author->id }}
            </p>
            <p>
                Имя автора: {{ $theme->author->name }}
            </p>
            <p>
                Аватар автора: <br> <img src="{{ $theme->author->avatar }}" alt="{{ $theme->author->login }}">
            </p>
        </div>
    </div>
    <br>
    <h2>Действия</h2>
    <div style="display: flex; flex-wrap: wrap;">
        <div style="margin-right: 20px;">
            <a class="btn btn-success" href="{{ route('theme.edit', [$theme->section->slug, $theme->slug]) }}">Редактировать тему</a>
        </div>
        <form action="{{ route('theme.delete', [$theme->section->slug, $theme->slug]) }}" method="POST">
            @csrf
            @method('DELETE')
            <label>
                <input class="btn btn-danger" type="submit" value="Удалить тему">
            </label>
        </form>
    </div>
    <br>

    <h2>Все посты темы</h2>
    <table class="table table-dark table-hover">
        <tr>
            <th>
                ID поста
            </th>
            <th>
                Название поста
            </th>
            <th>
                Содержание поста
            </th>
            <th>
                Автор поста
            </th>
            <th>
                Время создание поста
            </th>
        </tr>
        @foreach($posts as $post)
            <tr>
                <td>
                    {{ $post->id }}
                </td>
                <td>
                    {{ $post->title }}
                </td>
                <td>
                    {{ $post->content }}
                </td>
                <td>
                    <a href="{{ route('author.show', [$post->author->login]) }}">{{ $post->author->name }}</a>
                </td>
                <td>
                    {{ $post->created_at }}
                </td>
            </tr>
        @endforeach
    </table>
    <br>
    <br>
    <div class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6">
        {{ $posts->links() }}
    </div>


</x-layout>
