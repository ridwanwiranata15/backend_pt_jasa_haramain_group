<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ContentOrderRequest extends FormRequest
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
            "content_id" => 'required|exists:contents,id',
            "jumlah" => 'required',
            "keterangan" => 'required',
            "status" => 'required',
            "tanggal_pelaksanaan" => 'required',
            "supplier" => 'required',
            "harga_dasar" =>'required',
            "harga_jual" => 'required'
        ];
    }
}
