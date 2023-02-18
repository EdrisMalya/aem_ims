<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:1', 'max:150'],
            'phone_number' => ['required', 'string', 'min:1', 'max:150'],
            'email' => ['nullable', 'string', 'min:1', 'max:150'],
            'address' => ['required', 'string', 'min:1', 'max:150'],
        ];
    }
}
