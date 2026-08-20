<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class TransportationOrderRequest extends FormRequest
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
            'service_id' => 'required|exists:services,id',
            'transportation_id' => 'required|exists:transportations,id',
            'tour_id' => 'required|exists:tours,id',
            'tanggal_keberangkatan' => 'required',
            'supplier' => 'nullable',
            'harga_dasar' => 'nullable',
            'harga_jual' =>'nullable',
            'status' => 'in:nego, deal, batal, tahap persiapan, tahap produksi,done'
        ];
    }
}
