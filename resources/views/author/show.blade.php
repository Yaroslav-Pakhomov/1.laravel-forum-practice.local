<x-layout>
    <x-slot:title>
        {{ $title }}
        </x-slot>

        <h1>{{ $title }}</h1>

        {{-- $slug_section --}}
        <a href="{{ route('section.index') }}">Все разделы</a>

        {{--@dd($author)--}}

        <p>
            ID автора: {{ $author->id }}
        </p>
        <p>
            Имя автора: {{ $author->name }}
        </p>
        <p>
            Почта автора: {{ $author->email }}
        </p>
        <p>
            Аватар автора: <br>
            <img src="{{ $author->avatar }}" alt="{{ $author->login }}">
        </p>

</x-layout>
