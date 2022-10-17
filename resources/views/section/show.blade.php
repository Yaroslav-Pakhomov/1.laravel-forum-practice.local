<x-layout>
    <x-slot:title>
        {{ $title }}
        </x-slot>

        {{-- $slug_section --}}
        <a href="{{ route('section.index') }}">Все разделы</a>

        @foreach($section as $data)
            <p>
                ID раздела: {{ $data->id }}
            </p>
            <p>
                Название раздела: {{ $data->title }}
            </p>

            <table>
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        Название
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
