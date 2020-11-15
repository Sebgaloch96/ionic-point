<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressShowResource extends JsonResource
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
            'address_line_1' => $this->address_line_1,
            'address_line_2' => $this->address_line_2, 
            'address_line_3' => $this->address_line_3,
            'country' => $this->country,
            'city' => $this->city,
            'postcode' => $this->postcode,
            'lat' => $this->lat,
            'lon' => $this->lon
        ];
    }
}
