<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CatalogSortRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'search'        => 'nullable|string|max:100',
            'sort_price'    => 'nullable|integer',
            'sort_year'     => 'nullable|integer',
            'sort_category' => 'nullable|integer',
        ];
    }
}
