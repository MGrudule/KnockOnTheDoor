<?php

namespace App\Http\Resources;

use App\UserResourceCategory;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // group by category and take only resource names
        $groupedResources = UserResourceCategory::select('id', 'title')->get()->all();
        foreach ($groupedResources as $resourceGroup) {
            $resources = $resourceGroup->resources()->
                where(['user_id' => $this->id])->
                get()->all();
            $resourceGroup->names = array_column($resources, 'title');
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'summary' => $this->summary,
            'circle' => new CircleResource($this->circle),
            'categories' => CategoryResource::collection($this->categories),
            'resources' => $groupedResources,
        ];
    }
}
