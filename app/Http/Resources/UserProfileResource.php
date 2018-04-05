<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserProfileResource extends JsonResource
{
    function __construct($profile, $errors = [])
    {
        parent::__construct($profile);
        $this->errors = $errors;
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
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'summary' => $this->summary,
            'image' => $this->imagePublicUrl(),
            'circle' => new CircleResource($this->circle),
            'categories' => CategoryResource::collection($this->categories->sortBy('name')),
            'resources' => $this->resourcesGroupedByCategory(),
        ];
    }

    /**
     * Get additional data that should be returned with the resource array.
     *
     * @param \Illuminate\Http\Request  $request
     * @return array
     */
    public function with($request)
    {
        return [
            'errors' => $this->errors,
        ];
    }
}
