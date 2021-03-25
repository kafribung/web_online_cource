<?php

namespace App\Http\Resources\Backend;

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
            'price'  => number_format($this->price, 2),
            'description' => $this->description,
            'user'   => $this->user->name,
        ];
    }
}
