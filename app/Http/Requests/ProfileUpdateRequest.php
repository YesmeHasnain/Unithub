<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
{
    return [
        // agar name/email form me nahi dikhate to inko 'sometimes' ya 'nullable' kar do
        'first_name'     => ['nullable', 'string', 'max:255'],
        'last_name'      => ['nullable', 'string', 'max:255'],
        'location'       => ['nullable', 'string', 'max:255'],
        'bio'            => ['nullable', 'string'],
        'website'        => ['nullable', 'string', 'max:255'],
        'phone'          => ['nullable', 'string', 'max:50'],
        'phone_private'  => ['nullable'],
        'profile_photo'  => ['nullable', 'image', 'max:5120'], // 5MB
    ];
}
}
