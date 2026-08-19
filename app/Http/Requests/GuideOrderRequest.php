<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class GuideOrderRequest extends FormRequest
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
            "guide_id" => 'required|exists:guides,id',
            "jumlah" => 'required',
            "keterangan" => 'required',
            "status" => 'nullable',
            "muthowif_dari" => 'required',
            "muthowif_sampai" => 'required',
            "supplier" => 'nullable',
            "harga_dasar" => 'nullable',
            "harga_jual" => 'nullable'
        ];
    }
}
