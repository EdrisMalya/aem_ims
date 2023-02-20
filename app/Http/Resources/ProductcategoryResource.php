<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductcategoryResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => encrypt($this->id),
            'name' => $this->name,
            'logo' => $this->logo,
            'created_at' => $this->created_at,
        ];
    }
}
