<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
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
            'body' => $this->body,
            'user' => new UserResource($this->user),
            'subject' => new SubjectResource($this->subject),
            'categories' => CategoryResource::collection($this->categories),
            'tags' => array_column($this->tags->all(), 'tag'),
            'comment_count' => $this->comments->count(),
            'date' => $this->created_at,
        ];
    }

}
