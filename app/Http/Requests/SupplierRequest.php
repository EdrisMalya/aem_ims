<?php

namespace App\Http\Requests;

use App\Http\Controllers\HelperController;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SupplierRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        if($this->supplier){
            $rule = Rule::unique('suppliers')->ignore(HelperController::isEncrypted($this->supplier));
        }else{
            $rule = Rule::unique('suppliers');
        }
        return [
            'name' => ['required', 'string', 'min:1', 'max:150'],
            'email' => ['nullable', 'email', $rule],
            'phone_number' => ['required', 'string', 'min:1', 'max:150', $rule],
            'province_id' => ['required'],
            'address' => ['required', 'string', 'min:1', 'max:150'],
        ];
    }
}
