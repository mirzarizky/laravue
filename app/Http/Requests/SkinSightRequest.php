<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SkinSightRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $requiredIfGuest = Rule::requiredIf(auth()->guest());

        return [
            'answers'             => ['required', 'array'],
            // 'answer.options'     => ['required', 'array'],
            // 'answer.questions'   => ['required', 'array'],
            'answers.*.option'   => ['required', 'numeric'],
            'answers.*.question' => ['required', 'numeric'],
            'name'               => ['nullable', $requiredIfGuest, 'string'],
            'email'              => ['nullable', $requiredIfGuest, 'email'],
            'birth_date'         => ['nullable', $requiredIfGuest, 'date'],
            'phone_number'       => ['nullable', $requiredIfGuest, 'string'],
            'gender'             => ['nullable', $requiredIfGuest, Rule::in(['male', 'female', 'none'])],
            'password'           => ['nullable', $requiredIfGuest],
            'photo'              => ['nullable', 'image', 'max:5120'],
        ];
    }
}
