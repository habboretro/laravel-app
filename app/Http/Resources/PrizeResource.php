<?php

namespace App\Http\Resources;

use App\Http\Resources\BoxResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Resources\Json\JsonResource;

class PrizeResource extends JsonResource
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
            'box_id' => $this->box_id,
            'prize_type' => $this->prize_type,
            'prize' => $this->prize,
            'percentage' => $this->percentage,
            'image' => Storage::url($this->image),
            'quantity' => $this->quantity,
            // 'box' => new BoxResource($this->box),
        ];
    }
}
