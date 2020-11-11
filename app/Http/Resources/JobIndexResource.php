<?php

namespace App\Http\Resources;

use App\User;
use App\Http\Resources\AddressShowResource;
use Illuminate\Http\Resources\Json\JsonResource;

class JobIndexResource extends JsonResource
{
    private $user;

    /**
     * Overload resource constructor.
     *
     * @param  mixed  $resource
     * @return void
     */
    public function __construct($resource, $user)
    {
        // Ensure you call the parent constructor
        parent::__construct($resource);
        $this->resource = $resource;
        
        $this->user = $user;
    }

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
            'bookmark' => $this->bookmarks()
                ->where('bookmarkable_type', get_class($this))
                ->where('bookmarkable_id', $this->id)
                ->where('user_id', $this->user)
                ->first(),
            'created_at' => $this->created_at
        ];
    }
}
