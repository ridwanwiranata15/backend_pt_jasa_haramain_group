<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            "foto" => $this->isMethod('post') ? 'required|image|mimes:jpg,jpeg,png,gif|max:2048' : 'sometimes|image|mimes:jpg,jpeg,png,gif|max:2048',
            "nama_travel" => 'required|unique:customers,nama_travel',
            "alamat" => 'required',
            "email" => 'required|unique:customers,email',
            "penanggung_jawab" => 'required',
            "phone" => 'required',
            "no_ktp" => 'required',
            "status" => 'required|in:active,inactive'
        ];
    }
}
