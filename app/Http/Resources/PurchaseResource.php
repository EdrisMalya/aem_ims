<?php

namespace App\Http\Resources;

use App\Models\Supplier;
use Illuminate\Http\Resources\Json\JsonResource;

class PurchaseResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => encrypt($this->id),
            'reference' => 'PU_'.$this->id,
            'supplier' => $this->whenLoaded('supplier', fn()=>new SupplierResource($this->supplier)),
            'warehouse' => $this->whenLoaded('warehouse', fn()=>new WarehouseResource($this->warehouse)),
            'payment_type' => $this->whenLoaded('payment_type', fn()=>new PaymentTypeResource($this->payment_type)),
            'currency' => $this->whenLoaded('currency', fn()=>new CurrencyResource($this->currency)),
            'status' => $this->status,
            'grand_total' => number_format($this->grand_total),
            'int_grand_total' => $this->grand_total,
            'purchased_on' => $this->purchase_date,
            'assigned_products' => $this->whenLoaded('assigned_products', fn()=> AssignedProductsResource::collection($this->assigned_products)),
            'order_tax' => $this->order_tax,
            'discount' => $this->discount,
            'shipping' => $this->shipping,
            'due' => number_format($this->due),
            'int_due' => $this->due,
        ];
    }
}
