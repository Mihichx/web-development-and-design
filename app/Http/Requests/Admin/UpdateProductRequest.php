<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'img'               => 'required|string|max:255', // Если это путь к файлу. Если загрузка файла, то 'required|image|mimes:jpeg,png,jpg|max:2048'
            'name'              => 'required|string|max:255',
            'small_description' => 'required|string|max:500',
            'description'       => 'required|string',
            'model'             => 'required|string|max:255',
            'country'           => 'required|string|max:100',
            'release_at'        => 'required|date', // Проверяет корректность формата даты (ГГГГ-ММ-ДД)
            'price'             => 'required|numeric|min:0', // Число (можно с копейками), не отрицательное
            'category_id'       => 'required|exists:categories,id', // Проверяет, что выбранный ID реально существует в таблице categories
            'quantity'          => 'required|integer|min:0', // Только целое число, от 0 и выше
        ];
    }
   
    public function messages(): array
    {
        return [
            'required'    => 'Поле обязательно для заполнения.',
            'min'         => 'Значение не может быть меньше :min.',
            'exists'      => 'Выбранное значение не существует в базе данных.',
            'date'        => 'Введите корректную дату.',
            'numeric'     => 'Цена должна быть числом.',
            'integer'     => 'Количество должно быть целым числом.',
        ];
    }
}
