<?php

namespace App\Http\Requests;

use App\Http\Controllers\HelperController;
use Illuminate\Foundation\Http\FormRequest;

class PurhcaseRequest extends FormRequest
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
            'supplier' => ['required'],
            'products' => ['required'],
            'payment_type' => ['required'],
            'warehouse' => ['required'],
            'order_tax' => ['required', 'int', 'min:0'],
            'discount' => ['required', 'int', 'min:0'],
            'shipping' => ['required', 'int', 'min:0'],
            'due' => ['required', 'int', 'min:0'],
            'grand_total' => ['required', 'numeric', 'min:0'],
            'status' => ['required'],
            'purchase_date' => ['required', 'string', 'date'],
        ];
    }

    public function validated($key = null, $default = null)
    {
        $data = [...$this->all()];
        $data['warehouse_id'] = HelperController::isEncrypted($data['warehouse']['value']);
        $data['supplier_id'] = HelperController::isEncrypted($data['supplier']['value']);
        $data['payment_type_id'] = HelperController::isEncrypted($data['payment_type']['value']);
        unset($data['products']);
        unset($data['warehouse']);
        unset($data['supplier']);
        unset($data['payment_type']);
        unset($data['only_change_due']);
        return $data;
    }
}
