<?php

namespace App\Http\Requests;

use App\Http\Controllers\HelperController;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BaseunitRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        if($this->baseunit){
            $unique = Rule::unique('base_units')->ignore(HelperController::isEncrypted($this->baseunit));
        }else{
            $unique = Rule::unique('base_units');
        }
        return [
            'name' => ['required', 'string', 'min:1', 'max:255', $unique]
        ];
    }
}
