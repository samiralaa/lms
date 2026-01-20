<?php

namespace Domains\Contact\Requests;

use Domains\Contact\Enums\ContactCategory;
use Domains\Contact\Enums\ContactStatus;
use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'category' => 'required|in:' . implode(',', ContactCategory::values()),
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10',
            'status' => 'sometimes|in:' . implode(',', ContactStatus::values()),
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'full_name.required' => 'Full name is required.',
            'full_name.max' => 'Full name cannot exceed 255 characters.',
            'email.required' => 'Email address is required.',
            'email.email' => 'Please provide a valid email address.',
            'email.max' => 'Email address cannot exceed 255 characters.',
            'category.required' => 'Please select a category.',
            'category.in' => 'Please select a valid category.',
            'subject.required' => 'Subject is required.',
            'subject.max' => 'Subject cannot exceed 255 characters.',
            'message.required' => 'Message is required.',
            'message.min' => 'Message must be at least 10 characters long.',
            'status.in' => 'Please select a valid status.',
        ];
    }
} 