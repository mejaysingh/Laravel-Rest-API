<?php

namespace App\Http\Resources\v3;

use Illuminate\Http\Resources\Json\JsonResource;

class PersonResource extends JsonResource
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
            'firstName' => $this->first_name,
            'lastName' => $this->last_name,
            'phone' => $this->phone,
            'email' => $this->email,
            'city' => $this->city,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at
        ];
    }
}
