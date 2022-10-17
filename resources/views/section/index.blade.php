<x-layout>
    <x-slot:title>
        {{ $title }}
    </x-slot>

    <table class="table table-bordered border-primary">
        <thead>
        <tr>
            <th scope="col">ID разделов</th>
            <th scope="col">Название разделов</th>
            <th scope="col">Темы разделов</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($sections as $section)
                <tr>
                    <td>
                        {{ $section->id }}
                    </td>
                    <td>
                        <a href="{{ route('section.show', $section->slug) }}">{{ $section->title }}</a>
                    </td>
                    <td>
                        <ul class="list-group list-group-flush">
                            @foreach($section->themes as $theme)
                                <li class="list-group-item">
                                    {{ $theme->id }}. {{ $theme->title }}
                                </li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</x-layout>
