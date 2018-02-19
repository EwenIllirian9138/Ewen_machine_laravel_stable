<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSales extends FormRequest
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
            'id' => 'required|integer|exists:boissons',
            'selectSucre' => 'required|integer|between:0,3',
            'coin' => 'required|array|size:6',
            'coin.200' => 'required|integer',
            'coin.100' => 'required|integer',
            'coin.50' => 'required|integer',
            'coin.20' => 'required|integer',
            'coin.10' => 'required|integer',
            'coin.5' => 'required|integer',
        ];
    }
}
