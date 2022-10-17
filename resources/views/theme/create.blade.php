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
    <form action="{{ route('theme.store', [$section->slug]) }}" method="POST">
        @csrf
        <label>
            <input class="form-control" type="text" name="title" placeholder="Введите название темы">
            @error('title')
            <div class="mt-2 text-danger">
                {{ $message }}
            </div>
            @enderror
        </label>
        <br>
        <label>
            <input type="hidden" name="section_slug" value="{{ $section->slug }}">
            @error('section_slug')
            <div class="mt-2 text-danger">
                {{ $message }}
            </div>
            @enderror
        </label>
        <br>
        <input class="btn btn-success" type="submit" value="Создать">
    </form>

</x-layout>
