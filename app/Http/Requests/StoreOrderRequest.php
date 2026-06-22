<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:120'],
            // Телефон: цифри, пробіли та + - ( ) — як на фронті.
            'phone' => ['required', 'string', 'max:32', 'regex:/^[\d\s()+\-]{6,}$/'],
            'comment' => ['nullable', 'string', 'max:300'],
            // Honeypot: справжні користувачі це поле не бачать і лишають порожнім.
            'website' => ['prohibited'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Вкажіть, будь ласка, ваше ім’я.',
            'name.min' => 'Ім’я занадто коротке.',
            'phone.required' => 'Вкажіть номер телефону.',
            'phone.regex' => 'Перевірте формат номера телефону.',
            'comment.max' => 'Коментар не може бути довшим за 300 символів.',
            'website.prohibited' => 'Помилка валідації.',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'ім’я',
            'phone' => 'телефон',
            'comment' => 'коментар',
        ];
    }

    /**
     * Очищені дані тільки для збереження замовлення (без honeypot).
     *
     * @return array<string, string|null>
     */
    public function orderData(): array
    {
        return [
            'name' => trim($this->validated('name')),
            'phone' => trim($this->validated('phone')),
            'comment' => $this->filled('comment') ? trim($this->validated('comment')) : null,
        ];
    }
}
