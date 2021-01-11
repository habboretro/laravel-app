<?php

namespace App\Http\Resources;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
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
            'slug' => $this->slug,
            'title' => $this->title,
            'short_story' => $this->short_story,
            'full_story' => $this->full_story,
            'image' => Storage::url($this->image),
            'user_id' => $this->user_id,
            'user' => new UserResource($this->user),
        ];
    }
}
