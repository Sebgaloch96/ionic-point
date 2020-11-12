<?php

namespace App\Http\Resources;

use App\Http\Resources\AddressShowResource;
use Illuminate\Http\Resources\Json\JsonResource;

class JobIndexResource extends JsonResource
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
            'uuid' => $this->uuid,
            'title' => $this->title,
            'description' => substr($this->description, 0, 100) . '...',
            'address' => new AddressShowResource($this->address),
            'isBookmarked' => $this->isBookmarked(),
            'created_at' => $this->created_at
        ];
    }
}
