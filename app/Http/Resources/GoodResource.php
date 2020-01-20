<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GoodResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'is_visible' => $this->is_visible,
            'image_name' => $this->image_name,
            'sizes' => SizeResource::collection($this->sizes),
            'ingredients' => []
        ];
    }
}
