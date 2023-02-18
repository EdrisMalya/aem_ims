<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WarehouseResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => encrypt($this->id),
            'name' => $this->name,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'address' => $this->address,
            'province_id' => $this->province_id,
            'status' => (boolean)$this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'province' => new ProvinceResource($this->province)
        ];
    }
}
