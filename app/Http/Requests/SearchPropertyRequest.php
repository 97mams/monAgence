<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchPropertyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'price' => ['gte:0', 'numeric', 'nullable'],
            'surface' => ['gte:0', 'numeric', 'nullable'],
            'rooms' => ['gte:0', 'numeric', 'nullable'],
            'ttle' => ['string', 'nullable']
        ];
    }
}
