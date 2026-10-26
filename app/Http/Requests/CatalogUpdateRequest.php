<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CatalogUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'return_url' => 'nullable|string',
            'plus' => 'nullable|integer',
            'minus' => 'nullable|integer',
        ];
    }
}
