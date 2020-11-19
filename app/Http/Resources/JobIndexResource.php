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
            'reference' => $this->reference,
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status,
            'length_of_job' => $this->length_of_job,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'address' => new AddressShowResource($this->address),
            'isBookmarked' => $this->isBookmarked(),
            'created_at' => $this->created_at
        ];
    }
}
