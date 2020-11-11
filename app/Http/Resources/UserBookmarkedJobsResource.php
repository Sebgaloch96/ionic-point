<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserBookmarkedJobsResource extends JsonResource
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
            'uuid' => $this->bookmarkable->uuid,
            'title' => $this->bookmarkable->title,
            'description' => substr($this->bookmarkable->description, 0, 100) . '...',
            'address' => new AddressShowResource($this->bookmarkable->address),
            'bookmark' => $this,
            'created_at' => $this->bookmarkable->created_at
        ];
    }
}
