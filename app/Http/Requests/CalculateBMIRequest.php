<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalculateBMIRequest extends FormRequest
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
          'age' => 'required|numeric|min:18|max:99',
          'height' => 'required|numeric|min:100|max:250',
          'weight' => 'required|numeric|min:30|max:200',
          'gender' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
          'age.required' => 'The age is required.',
          'age.numeric' => 'The age must be a number.',
          'age.min' => 'Your age must be at least 18.',
          'age.max' => 'Your age must be less than 100.',
          'height.required' => 'The height is required.',
          'height.numeric' => 'The height must be a number.',
          'height.min' => 'The height must be at least 100 cm.',
          'height.max' => 'The height must be less than 250 cm.',
          'weight.required' => 'The weight is required.',
          'weight.numeric' => 'The weight must be a number.',
          'weight.min' => 'The weight must be at least 30 kg.',
          'weight.max' => 'The weight must be less than 200 kg.',
        ];
    }

}
