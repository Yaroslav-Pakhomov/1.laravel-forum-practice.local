<x-layout>
    <x-slot:title>
        {{ $title }}
        </x-slot>

        @foreach($theme as $data)
        @endforeach
            <a href="{{ route('section.index') }}">Все разделы</a> ->
            <a href="{{ route('section.show', [$theme->section->slug]) }}">Текущий разделы</a>
            <div>
                <p>
                    ID темы: {{ $theme->id }}
                </p>
                <p>
                    Название темы: {{ $theme->title }}
                </p>
                <p>
                    Название раздела: {{ $theme->section->title }}
                </p>
            </div>
            <div>
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


        <h2>Последние 10 поста:</h2>

        <table>
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
            </tr>
            @foreach($theme->posts as $post)
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
                </tr>
            @endforeach

        </table>


        <h2>Все посты темы</h2>
        <table>
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
        </div>>

</x-layout>
