<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
{

    public static $wrap = 'services';

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'type' => 'servi',
            'id' => $this->id(),
            'attributes' => [
                'name' => $this->name(),
                'description' => $this->description(),
                'created_at' => $this->created_at,
            ]
        ];
    }
}
