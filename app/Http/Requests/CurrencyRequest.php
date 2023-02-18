<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CurrencyRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:1', 'max:150'],
            'code' => ['required', 'string', 'min:1', 'max:150'],
            'symbol' => ['required', 'string', 'min:1', 'max:150'],
        ];
    }
}
