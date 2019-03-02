<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BarangRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'kd_barang' => 'required|Min:3',
            'category_id' => 'required',
            'barang' => 'required|Min:3',
            'satuan' => 'required|Min:2',
            'hrg_beli' => 'required|Min:3',
            'hrg_jual' => 'required|Min:3',
            'stok' => 'required|Min:1',
            'merk_id' => 'required'
        ];
    }
}
