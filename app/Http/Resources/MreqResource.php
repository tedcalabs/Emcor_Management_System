<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MreqResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'address' => $this->address,
            'phone' => $this->phone,
            'description' => $this->description,
            'created_at' => $this->created_at,
        ];
    }
}
