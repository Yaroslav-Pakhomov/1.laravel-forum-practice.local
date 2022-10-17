<x-layout>
    <x-slot:title>
        {{ $title }}
        </x-slot>

        <h1>{{ $title }}</h1>

        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"  aria-current="page"><a href="{{ route('section.index') }}">Все разделы</a></li>
            </ol>
        </nav>

        <p>
            ID раздела: {{ $section->id }}
        </p>
        <p>
            Название раздела: {{ $section->title }}
        </p>

        <h2>Список тем</h2>

        <a class="btn btn-primary" href="{{ route('theme.create', [$section->slug]) }}">Создать тему</a>
        <br>
        <br>
        <table class="table table-bordered border-primary">
            <tr>
                <th>
                    ID темы
                </th>
                <th>
                    Название темы
                </th>
                <th>
                    Действия темы
                </th>
            </tr>
            @foreach($section->themes as $theme)
                <tr>
                    <td>
                        {{ $theme->id }}
                    </td>
                    <td>
                        <a class="link-primary" href="{{ route('theme.index', [$section->slug, $theme->slug]) }}">{{ $theme->title }}</a>
                    </td>
                    <td>
                        <div style="display: flex; flex-wrap: wrap;">
                            <div style="margin-right: 20px;">
                                <a class="btn btn-success" href="{{ route('theme.edit', [$section->slug, $theme->slug]) }}">Редактировать</a>
                            </div>
                            <form action="{{ route('theme.delete', [$section->slug, $theme->slug]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <label>
                                    <input class="btn btn-danger" type="submit" value="Удалить">
                                </label>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>

</x-layout>
