<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class HandlingPlaneRequest extends FormRequest
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
            "nama_bandara" => 'required',
            "jumlah_jamaah" => 'required',
            "harga" => 'required',
            "kedatangan_jamaah" => 'required',
            "status" => 'nullable',
            "supplier" => 'nullable',
            "harga_dasar" => 'nullable',
            "harga_jual" => 'nullable',
            "paket_info" => $this->isMethod('post') ? 'required|image|mimes:jpg,jpeg,png|max:2048' : 'image|mimes:jpg,jpeg,png|max:2048',
            "nama_supir" => $this->isMethod('post') ? 'required|image|mimes:jpg,jpeg,png|max:2048' : 'image|mimes:jpg,jpeg,png|max:2048',
            "identitas_koper" => $this->isMethod('post') ? 'required|image|mimes:jpg,jpeg,png|max:2048' : 'image|mimes:jpg,jpeg,png|max:2048'
        ];
    }
}
