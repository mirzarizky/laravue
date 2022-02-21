<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateQuizRequest extends FormRequest
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
        return [
            'question_text'         => ['required', 'string', 'max:255'],
            'question_image'        => ['nullable', 'image', 'max:1024'],
            'options'               => ['required', 'array'],
            'options.*.id'          => ['required', 'numeric'],
            'options.*.option_text' => ['required', 'string', 'max:255']
        ];
    }

    public function attributes()
    {
        return [
            'question_text'         => 'Question',
            'options.*.option_text' => 'Answer'
        ];
    }
}
