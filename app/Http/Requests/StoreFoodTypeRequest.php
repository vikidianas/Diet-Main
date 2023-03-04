<?php

namespace App\Http\Requests;

use App\Models\FoodType;
use Illuminate\Foundation\Http\FormRequest;

class StoreFoodTypeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->user()->can('create', FoodType::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'photo' => ['nullable', 'image', 'max:1024'],
            'food' => ['nullable', 'array'],
            'food.*' => ['required', 'string', 'max:255'],
        ];
    }
}
