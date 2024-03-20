<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidationServerRequest extends FormRequest
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
            'requiredInput' => 'required',
            'maxMinLengthInput' => 'required|min:8|max:20',
            'emailInput' => 'required|email',
            'digitsInput' => 'required|digits_between:1,3',
            'numberInput' => 'required|numeric',
            'dateInput' => 'required|date_format:d/m/Y',
        ];
    }

    public function messages()
    {
        return [
            'requiredInput.required' => 'This field is required',
            'maxMinLengthInput.required' => 'This field is required',
            'maxMinLengthInput.min' => 'Minimum length is 8 characters',
            'maxMinLengthInput.max' => 'Maximum length is 20 characters',
            'emailInput.required' => 'Please enter an email address',
            'emailInput.email' => 'Please enter a valid email address',
            'digitsInput.required' => 'Please enter digits only',
            'digitsInput.digits' => 'Please enter a valid number',
            'numberInput.required' => 'Please enter a number',
            'numberInput.numeric' => 'Please enter a valid number',
            'dateInput.required' => 'Please enter a date',
            'dateInput.date_format' => 'Please enter a date in the format dd/mm/yyyy',
        ];
    }
}
