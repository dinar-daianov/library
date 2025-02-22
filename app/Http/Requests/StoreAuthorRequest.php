<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAuthorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'birthday' => 'required|date',
            'gender' => 'required|in:Мужской,Женский',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Имя автора обязательно для заполнения.',
            'name.unique' => 'Такой автор уже существует.'
        ];
    }
}
