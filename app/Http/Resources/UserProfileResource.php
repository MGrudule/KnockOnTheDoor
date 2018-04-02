<?php

namespace App\Http\Resources;

use App\UserResourceCategory;
use Illuminate\Http\Resources\Json\JsonResource;

class UserProfileResource extends JsonResource
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
            'email' => $this->email,
            'summary' => $this->summary,
            'circle' => new CircleResource($this->circle),
            'categories' => CategoryResource::collection($this->categories->sortBy('name')),
            'resources' => $this->resourcesGroupedByCategory(),
        ];
    }

}
