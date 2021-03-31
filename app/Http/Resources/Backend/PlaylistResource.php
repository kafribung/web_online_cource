<?php

namespace App\Http\Resources\Backend;

use App\Models\Category;
use Illuminate\Http\Resources\Json\JsonResource;

class PlaylistResource extends JsonResource
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
            'title'  => $this->title,
            'img'    => $this->takeImg,
            'slug'   => $this->slug,
            'price'  => $this->price,
            'description' => $this->description,
            'user'   => $this->user->name,
            'category_id' => [],
        ];
    }
}
