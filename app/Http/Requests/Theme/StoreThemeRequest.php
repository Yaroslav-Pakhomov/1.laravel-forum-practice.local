<?php

namespace App\Http\Requests\Theme;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class StoreThemeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    #[ArrayShape([
        'title'        => "string",
        'section_slug' => "string",
    ])]
    public function rules(): array
    {
        return [
            'title'        => 'required|string|max:255',
            'section_slug' => 'required|string',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    #[ArrayShape([
        'title.required'        => "string",
        'title.string'          => "string",
        'title.max'             => "string",
        'section_slug.required' => "string",
        'section_slug.string'   => "string",
    ])]
    public function messages(): array
    {
        return [
            'title.required'        => 'Заголовок обязателен',
            'title.string'          => 'Заголовок должен быть строкой',
            'title.max'             => 'Заголовок слишком длинный',
            'section_slug.required' => 'Параметр обязателен',
            'section_slug.string'   => 'Параметр должен быть строкой',
        ];
    }
}
