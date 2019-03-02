<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Pembelianrequest extends FormRequest
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
            'suplier_id' => 'required',
            'no_faktur'=> 'required',
            'tgl_faktur' => 'required',
            'jth_tempo' => 'required',
            'tgl_pengiriman' => 'required',
            'tgl_terima' => 'required',
            'no_sjpembelian' => 'required'
        ];
    }
}
