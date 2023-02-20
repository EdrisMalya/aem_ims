<?php

namespace App\Http\Requests;

use App\Http\Controllers\HelperController;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductcategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        if($this->productcategory){
            $unique = Rule::unique('product_categories')->ignore(HelperController::isEncrypted($this->productcategory));
        }else{
            $unique = Rule::unique('product_categories');
        }
        return [
            'name' => ['required', 'string', 'min:2', 'max:150', $unique],
        ];
    }
}
