<x-layout>
    <x-slot:title>
        {{ $title }}
        </x-slot>

        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('section.index') }}">Все разделы</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="{{ route('section.show', [$section->slug]) }}">Назад в раздел</a>
                </li>
            </ol>
        </nav>
        <h1>{{ $title }}</h1>
        <form action="{{ route('theme.update', [$section->slug, $theme->slug]) }}" method="POST">
            @csrf
            @method('PATCH')
            <label>
                <input class="form-control" type="text" name="title" placeholder="Введите название темы"
                       value="{{ $theme->title }}">
                @error('title')
                <div class="mt-2 text-danger">
                    {{ $message }}
                </div>
                @enderror
            </label>
            <br>
            <label for="">
                <input type="hidden" name="theme_slug" value="{{ $theme->slug }}">
                @error('theme_slug')
                <div class="mt-2 text-danger">
                    {{ $message }}
                </div>
                @enderror
            </label>
            <label for="">
                <input type="hidden" name="section_slug" value="{{ $section->slug }}">
                @error('section_slug')
                <div class="mt-2 text-danger">
                    {{ $message }}
                </div>
                @enderror
            </label>
            <br>
            <input class="btn btn-success" type="submit" value="Редактировать">
        </form>

</x-layout>
