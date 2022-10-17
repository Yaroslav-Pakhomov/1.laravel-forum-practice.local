<x-layout>
    <x-slot:title>
        {{ $title }}
        </x-slot>

        <h1>{{ $title }}</h1>

        {{-- $slug_section --}}
        <a href="{{ route('section.index') }}">Все разделы</a>



        @foreach($section as $data)
            <p>
                ID раздела: {{ $data->id }}
            </p>
            <p>
                Название раздела: {{ $data->title }}
            </p>

            <h2>Список тем</h2>
        
            <table>
                <tr>
                    <th>
                        ID темы
                    </th>
                    <th>
                        Название темы
                    </th>
                </tr>
                @foreach($data->themes as $theme)
                    <tr>
                        <td>
                            {{ $theme->id }}
                        </td>
                        <td>
                            <a href="{{ route('theme.index', [$data->slug, $theme->slug]) }}">{{ $theme->title }}</a>
                        </td>
                    </tr>
                @endforeach
            </table>
    @endforeach


</x-layout>
