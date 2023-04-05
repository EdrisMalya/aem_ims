<?php

namespace App\Http\Requests;

use App\Http\Controllers\HelperController;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:150', Rule::unique('products')],
            'code' => ['required', 'string', 'min:2', 'max:255', Rule::unique('products')],
            'product_brand' => ['required', function($field, $value, $error){
                if(key_exists('forForm', $value)) $error(translate('This field is required'));
            }],
            'product_category' => ['required', function($field, $value, $error){
                if(key_exists('forForm', $value)) $error(translate('This field is required'));
            }],
            'barcode_symbology' => ['required', 'integer', 'in:128,39'],
            'product_cost' => ['required', 'int', 'min:1', 'lte:product_price'],
            'product_price' => ['required', 'int', 'min:1', 'gt:product_cost'],
            'product_unit' => ['required'],
            'sale_unit' => ['required'],
            'purchase_unit' => ['required'],
            'stock_alert' => ['required', 'int', 'min:1'],
            'note' => ['nullable', 'string'],
            'warehouse' => ['required'],
            'supplier' => ['required'],
            'product_quantity' => ['required', 'integer', 'min:1'],
            'stock_status' => ['required'],
            'currency_id' => ['required']
        ];
    }

    public function validated($key = null, $default = null)
    {
        $data = [
            ...$this->all(),
            'brand_id' => HelperController::isEncrypted($this->product_brand['value']),
            'product_category_id' => HelperController::isEncrypted($this->product_category['value']),
            'product_unit_id' => HelperController::isEncrypted($this->product_unit['value']),
            'product_sale_unit_id' => HelperController::isEncrypted($this->sale_unit['value']),
            'product_purchase_unit_id' => HelperController::isEncrypted($this->purchase_unit['value']),
            'currency_id' => HelperController::isEncrypted($this->currency_id),
            'cost' => $this->product_cost,
            'price' => $this->product_price,
            'image' => $this->file('image')?asset('storage/'.$this->file('image')->store('product_images','public')):null
        ];
        unset($data['product_brand']);
        unset($data['product_category']);
        unset($data['product_unit']);
        unset($data['sale_unit']);
        unset($data['purchase_unit']);
        unset($data['warehouse']);
        unset($data['supplier']);
        unset($data['product_quantity']);
        unset($data['stock_status']);
        unset($data['product_cost']);
        unset($data['product_price']);
        unset($data['status']);
        return $data;
    }
}
