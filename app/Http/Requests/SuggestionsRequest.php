<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuggestionsRequest extends FormRequest
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
            'suggestion' => ['required', 'string', 'min:10', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'suggestion.required' => 'The suggestion field is required. Please provide your suggestion.',
            'suggestion.string' => 'The suggestion must be a string.',
            'suggestion.min' => 'The suggestion must be at least 10 characters.',
            'suggestion.max' => 'The suggestion may not be greater than 255 characters.',
        ];
    }
}
