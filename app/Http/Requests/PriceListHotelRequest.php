<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class PriceListHotelRequest extends FormRequest
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
             "tanggal" => 'required|date',
            "nama_hotel" => 'required',
            "tipe_kamar" => 'required',
            "harga" => 'required',
            "tanggal_checkout" => 'required',
            "catatan" => 'nullable',
            "add_on" => 'nullable',
            "supplier_utama" => 'nullable',
            "kontak_supplier_utama" => 'nullable',
            "supplier_cadangan" => 'nullable',
            "kontak_supplier_cadangan" => 'nullable',
            "category" => 'nullable'
        ];
    }
}
