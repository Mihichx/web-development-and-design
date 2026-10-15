<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CancelOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => 'required|integer|exists:orders,id',
            'status' => 'required|integer|exists:order_statuses,id',
            'cause' => 'required_if:status,3|nullable|string|min:10|max:100'
        ];
    }

    public function messages(): array
    {
        return [
            'cause.require' => 'Поле должно быть заполненным',
            'cause.min' => 'Минимальное кол-во символов 10'
        ];
    }
}
