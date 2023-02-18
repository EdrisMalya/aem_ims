<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SystemSettingResource extends JsonResource
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
            'id' => encrypt($this->id),
            'logo' => $this->logo,
            'name' => $this->name,
            'phone_number' => $this->phone_number,
            'address' => $this->address,
            'date_format' => $this->date_format,
            'currency' => new CurrencyResource($this->currency),
            'province' => new CurrencyResource($this->province),
            'warehouse' => new CurrencyResource($this->warehouse),
            'customer' => new CurrencyResource($this->customer),
        ];
    }
}
