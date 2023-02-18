<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CurrencyResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => encrypt($this->id),
            'name' => $this->name,
            'code' => $this->code,
            'symbol' => $this->symbol,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
