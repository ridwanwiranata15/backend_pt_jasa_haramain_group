<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class TravelDocumentRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "service_id" => 'required|exists:services,id',
            "pas_foto" => 'nullable|image|mimes:jpg,png,jpeg',
            "paspor" => 'nullable|image|mimes:jpg,png,jpeg',
            "ktp" => 'nullable|image|mimes:jpg,png,jpeg',
            "visa" => 'nullable|image|mimes:jpg,png,jpeg'
        ];
    }
}
