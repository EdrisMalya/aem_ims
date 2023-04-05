<?php

namespace App\Http\Resources;

use App\Models\AssignedProducts;
use App\Models\Inventory;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => encrypt($this->id),
            'name' => $this->name,
            'code' => $this->code,
            'name_with_code' => $this->name.' ('.$this->code.')',
            'image' => $this->image,
            'brand' => $this->whenLoaded('brand',fn()=>new BrandResource($this->brand)),
            'category' => $this->whenLoaded('category',fn()=>new ProductcategoryResource($this->category)),
            'price' => $this->currency->symbol.' '.number_format($this->price),
            'cost' => $this->currency->symbol.' '.number_format($this->cost),
            'net_cost' => $this->net_cost,
            'int_price' => $this->price,
            'barcode_symbology' => $this->barcode_symbology,
            'int_cost' => $this->cost,
            'unit' => $this->whenLoaded('unit', fn () => new BaseunitResource($this->unit)),
            'sale_unit' => $this->whenLoaded('sale_unit', fn () => new BaseunitResource($this->sale_unit)),
            'purchase_unit' => $this->whenLoaded('purchase_unit', fn () => new BaseunitResource($this->purchase_unit)),
            'in_stock' => Inventory::query()->where('product_id', $this->id)->sum('quantity'),
            'inventory' => $this->whenLoaded('inventory', fn ()=> InventoryResource::collection($this->inventory)),
            'stock_alert' => $this->stock_alert,
            'note' => $this->note,
            'qty' => 1,
            'discount_type'=> 'fixed',
            'discount' => 0,
            'currency_symbol' => $this->currency->symbol,
            'created_at' => $this->created_at,
        ];
    }
}
