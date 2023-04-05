<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InventoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'warehouse' => new WarehouseResource($this->warehouse),
            'supplier' => new SupplierResource($this->supplier),
            'product' => new ProductResource($this->product),
            'base_unit' => new BaseunitResource($this->base_unit),
            'quantity' => $this->quantity,
        ];
    }
}
