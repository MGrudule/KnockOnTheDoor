<?php

namespace App\Http\Resources;

use App\UserResourceCategory;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResourceResource extends JsonResource
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
            "name" => $this->name,
            // "id" => $this->id,
            // "title" => UserResourceCategory::find($this->category_id)->title,
            // "names" => ResourceResource::collection($this->resources),
        ];
    }
}
