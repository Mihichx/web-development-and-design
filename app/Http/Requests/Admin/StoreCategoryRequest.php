<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:50',
        ];
    }

    public function messages(): array
    {
        return [
            'name.require' => 'Название должно быть указано',
            'name.string' => 'Название должно быть строкой',
            'name.max' => 'Максимум 50 символов в названии',
        ];
    }
}
