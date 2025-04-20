<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "Post ID" => $this->id,
            "Post Title" => $this->title,
            "Post Content" => $this->content,
            "User" => new UserResource($this->user),
            "Created At" => $this->created_at,
            "Updated At" => $this->updated_at,
        ];
    }
}
