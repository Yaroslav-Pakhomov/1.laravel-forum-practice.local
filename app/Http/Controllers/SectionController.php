<?php

declare(strict_types=1);

namespace App\Http\Controllers;

class SectionController extends Controller
{
    public function index(): string
    {
        return 'Разделы';
    }

    public function show($id): string
    {
        $sections = [
            1 => 'Раздел 1',
            2 => 'Раздел 2',
            3 => 'Раздел 3',
            4 => 'Раздел 4',
            5 => 'Раздел 5',
        ];

        return $sections[ $id ] . ' с id ' . $id;
    }
}
