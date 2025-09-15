<?php
// app/Http/Requests/EventRegistrationRequest.php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRegistrationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'payment_method_id' => 'nullable|string',
            'additional_info' => 'nullable|array',
            'additional_info.dietary_restrictions' => 'nullable|string|max:500',
            'additional_info.emergency_contact' => 'nullable|string|max:100',
            'additional_info.special_requirements' => 'nullable|string|max:500',
            'terms_accepted' => 'required|boolean|accepted'
        ];
    }

    public function messages(): array
    {
        return [
            'terms_accepted.required' => 'You must accept the terms and conditions.',
            'terms_accepted.accepted' => 'You must accept the terms and conditions.'
        ];
    }
}