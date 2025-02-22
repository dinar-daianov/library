<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'year' => 'required|integer|min:1900|max:'.(date('Y') + 1),
            'author_id' => 'required|exists:authors,id',
        ];
    }

    public function messages()
    {
        return [
            'author_id.required' => 'Выберите автора книги. ',
            'author_id.exists' => 'Выбранный автор не существует.',
        ];
    }
}
