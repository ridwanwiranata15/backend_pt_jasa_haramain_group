<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class DocumentOrderRequest extends FormRequest
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
            "document_detail_id" => 'required|exists:document_details,id',
            "document_id" => 'required|exists:documents,id',
            "jumlah" => 'required',
            "harga" =>'required',
            "status" => 'nullable',
            "supplier" => 'nullable',
            "harga_dasar" => 'nullable',
            "harga_jual" => 'nullable'
        ];
    }
}
