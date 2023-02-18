<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WarehouseRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:1', 'max:150'],
            'email' => ['required', 'email'],
            'phone_number' => ['required', 'string', 'min:1', 'max:150'],
            'address' => ['required', 'string', 'min:1', 'max:150'],
            'province_id' => ['required'],
            'status' => ['required', 'boolean'],
        ];
    }
}
