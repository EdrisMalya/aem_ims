<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AssignedProductsResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'product_amount' => $this->product_amount,
            'quantity' => $this->quantity,
            'discount_type' => $this->discount_type,
            'discount' => $this->discount,
            'product' => $this->whenLoaded('product', fn()=>new ProductResource($this->product))
        ];
    }
}
