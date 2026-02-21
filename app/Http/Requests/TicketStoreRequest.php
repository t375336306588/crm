<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketStoreRequest extends FormRequest
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
            'customer_email' => 'required|email',
            'customer_name'  => 'required|string|max:255',
            'phone'          => ['required', 'string', 'regex:/^\+[1-9]\d{1,14}$/'],
            'subject'        => 'required|string|max:255',
            'message'        => 'required|string',
            'attachment'     => 'nullable|file|max:10240',
        ];
    }
}
