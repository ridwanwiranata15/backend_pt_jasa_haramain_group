<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class FoodOrderRequest extends FormRequest
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
            "food_id" => 'required|exists:foods,id',
            "jumlah" => 'required',
            "dari_tanggal" => 'required',
            "sampai_tanggal" => 'required|date',
            "status" => 'nullable',
            "supplier" => 'nullable',
            "status" => 'nullable',
            "supplier" => 'nullable',
            "harga_dasar" => 'nullable',
            "harga_jual" => 'nullable'
        ];
    }
}
