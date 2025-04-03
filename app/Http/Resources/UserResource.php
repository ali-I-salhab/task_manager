<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [

            "name"=> $this->name,
            "email"=> $this->email,
            "created_at"=>$this->created_at->format('y-m-d'),
            "profile"=>new ProfileResource($this->whenLoaded("profile"))

        ];
    }
}
