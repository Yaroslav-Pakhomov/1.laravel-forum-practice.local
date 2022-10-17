<x-layout>
    <x-slot:title>
        {{ $title }}
    </x-slot>

    <table>
        <tr>
            <th>ID разделов</th>
            <th>Название разделов</th>
            <th>Темы разделов</th>
        </tr>
        @foreach ($sections as $section)
            <tr>
                <td>
                    {{ $section->id }}
                </td>
                <td>
                    <a href="{{ route('section.show', $section->slug) }}">{{ $section->title }}</a>
                </td>
                <td>
                    <ul>
                    @foreach($section->themes as $theme)
                        <li>
                            {{ $theme->id }}. {{ $theme->title }}
                        </li>
                    @endforeach
                    </ul>
                </td>
            </tr>
        @endforeach
    </table>

</x-layout>
