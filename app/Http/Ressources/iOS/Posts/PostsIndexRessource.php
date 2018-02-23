<?php

namespace Genusshaus\Http\Resources\iOS\Posts;

use Illuminate\Http\Resources\Json\Resource;

class PostsIndexRessource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'uuid'                   => $this->uuid,
            'title'                  => $this->title,
            'teaser'                 => $this->teaser,
            'image'                  => $this->getPreviewImage(),
            'image_uuid'             => $this->getPreviewImageUuid(),
            'author'                 => $this->author,
            'source'                 => $this->src,
            'created_at'             => optional($this->created_at)->timestamp,
            'created_at_readable'    => optional($this->created_at)->diffForHumans(),
        ];
    }
}
