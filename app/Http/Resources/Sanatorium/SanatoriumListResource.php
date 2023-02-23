<?php

namespace App\Http\Resources\Sanatorium;

use Illuminate\Http\Resources\Json\JsonResource;

class SanatoriumListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'user_id' => $this->user_id,
            'deleted_at' => $this->deleted_at
        ];
    }
}
