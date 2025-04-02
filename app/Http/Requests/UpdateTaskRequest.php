<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTaskRequest extends FormRequest
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
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'create_date' => 'nullable|date',
            'status' => Rule::in(['выполнена', 'не выполнена']),
            'priority' => Rule::in(['низкий', 'средний', 'высокий']),
            'category' => 'nullable|string',
        ];
    }
}
