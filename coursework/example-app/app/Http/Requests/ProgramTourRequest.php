<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProgramTourRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'day'=>'required|string',
            'programme'=>'required|string|regex:/^[А-Яа-яЁё,\_.,!@#$%^&*()+=\[\]\{\}\:;"<>,.?\-\s]+$/u',
        ];
    }
    public function messages()
    {
        return[
            'regex'=>'Должна использоваться кириллица и символы',
            'required'=>'Обязательно для ввода',
            'string'=>'Должен быть текст',
        ];
    }
}
