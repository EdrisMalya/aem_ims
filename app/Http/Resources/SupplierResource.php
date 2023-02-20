<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SupplierResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => encrypt($this->id),
            'name' => $this->name,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'province_id' => $this->province_id,
            'address' => $this->address,
            'province' => new ProvinceResource($this->province),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
