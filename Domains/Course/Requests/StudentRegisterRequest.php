<?php
namespace Domains\Course\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CourseRegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'instructor_id' => 'required|exists:users,id',
            'price' => 'required|numeric|min:0',
            'status' => ['required', Rule::in(['draft', 'published', 'archived'])],
            'image' => 'nullable|image|max:2048' // Max 2MB
        ];
    }
}
