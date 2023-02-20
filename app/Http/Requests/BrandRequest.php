<?php

namespace App\Http\Requests;

use App\Http\Controllers\HelperController;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BrandRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        if($this->brand){
            $rule = Rule::unique('brands')->ignore(HelperController::isEncrypted($this->brand));
        }else{
            $rule = Rule::unique('brands');
        }
        return [
            'name' => ['required', 'string', 'min:1', 'max:150', $rule],
        ];
    }
}
