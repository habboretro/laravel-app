<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'price' => $this->price,
            'type' => $this->type,
            'reward' => $this->reward,
            'category' => $this->category ?: 'No Category',
            'previous_price' => $this->previous_price,
            'previous_reward' => $this->previous_reward,
            'description' => $this->description,
        ];
    }
}
