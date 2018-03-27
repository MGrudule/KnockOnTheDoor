<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'categories' => CategoryResource::collection($this->categories),
            'resources' => [ [
                'id' => 1,
                'title' => "I have",
                'names' => array_column($this->resources1->all(), 'title'),
            ],[
                'id' => 2,
                'title' => "I can",
                'names' => array_column($this->resources2->all(), 'title'),
            ],[
                'id' => 3,
                'title' => "I'm interested in",
                'names' => array_column($this->resources3->all(), 'title'),
            ] ],
        ];
    }
}
