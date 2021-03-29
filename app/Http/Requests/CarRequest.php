<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
{
    public function rules()
    {
        return [
            'mark' => 'required',
            'model' => 'required',
            'color' => 'required',
            'year' => 'required|integer'
        ];
    }
}
