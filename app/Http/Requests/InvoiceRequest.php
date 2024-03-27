<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceRequest extends FormRequest
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
            'name' => 'required|regex:/^[a-zA-Z\s]*$/',
            'date' => 'required|date_format:Y-m-d',
            'email' => 'required|email',
            'amount' => 'required|numeric',
            'quantity' => 'required|numeric',
            'percentage' => 'required|in:0,5,12,18,28',
            'file' => 'nullable|file|max:3072|mimes:jpg,png,pdf',
        ];
    }
}
