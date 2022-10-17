<x-layout>
    <x-slot:title>
        {{ $title }}
    </x-slot>

        @foreach($theme as $data)
            <a href="{{ route('section.index') }}">Все разделы</a> ->
            <a href="{{ route('section.show', [$data->section->slug]) }}">Текущий разделы</a>
            <div>
                <p>
                    ID темы: {{ $data->id }}
                </p>
                <p>
                    Название темы: {{ $data->title }}
                </p>
                <p>
                    Название раздела: {{ $data->section->title }}
                </p>
            </div>
            <div>
                <p>
                    ID автора: {{ $data->author->id }}
                </p>
                <p>
                    Имя автора: {{ $data->author->name }}
                </p>
                <p>
                    Аватар автора: <br> <img src="{{ $data->author->avatar }}" alt="{{ $data->author->login }}">
                </p>
            </div>

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
                @foreach($data->posts as $post)
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
    @endforeach

</x-layout>
