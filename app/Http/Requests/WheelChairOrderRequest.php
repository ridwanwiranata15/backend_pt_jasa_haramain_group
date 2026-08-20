<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class WheelChairOrderRequest extends FormRequest
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
            "service_id" => 'required|exists:service,id',
            "wheel_chair_id" => 'required|exists:wheel_chairs,id',
            "jumlah" => 'required',
            "status" =>'in:nego, deal, batal, tahap persiapan, tahap produksi,done',
            "tanggal_pelaksanaan" => 'required|date',
            "supplier" => 'nullable',
            "harga_dasar" => 'nullable',
            "harga_jual" => 'nullable'
        ];
    }
}
