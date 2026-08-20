<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class HotelRequest extends FormRequest
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
            "tanggal_checkin" => 'required|date',
            "tanggal_checkout" => 'required|date',
            "nama_hotel" => 'required',
            "harga_perkamar" => 'nullable',
            "jumlah_kamar" => 'required',
            "catatan" => 'nullable',
            "type" => 'required|in:double,triple,kuint,kuard',
            "jumlah_type" => 'required',
            "status" => 'nullable',
            "supplier" => 'nullable',
            "harga_dasar" => 'nullable',
            "harga_jual" => 'nullable'
        ];
    }
}
