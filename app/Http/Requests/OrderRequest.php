<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            "total_estimasi" => 'required',
            "total_yang_dibayarkan" => 'required',
            "sisa_hutang" => 'required',
            "total_amount_final" => 'required',
            "status_harga" => 'required',
            "status_pembayaran" => 'required',
            "upload_transfer" => 'required',
            "bukti_pembayaran" => 'required',
            "status_bukti_pembayaran" => 'required'
        ];
    }
}
