<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class HandlingHotelRequest extends FormRequest
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
            "nama" => 'required',
            "tanggal" => 'required',
            "harga" => 'required',
            "pax" => 'required',
            "status" => 'nullable',
            "supplier" => 'nullable',
            "harga_dasar" => 'nullable',
            "harga_jual" => 'nullable',
            "kode_booking" => $this->isMethod('post') ? 'required|image|mimes:jpg,jpeg,png|max:2048' : 'image|mimes:jpg,jpeg,png|max:2048',
            "rumlis"=> $this->isMethod('post') ? 'required|image|mimes:jpg,jpeg,png|max:2048' : 'image|mimes:jpg,jpeg,png|max:2048',
            "identitas_koper" => $this->isMethod('post') ? 'required|image|mimes:jpg,jpeg,png|max:2048' : 'image|mimes:jpg,jpeg,png|max:2048'
        ];
    }
}
