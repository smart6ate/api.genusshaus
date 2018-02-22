<?php

namespace Genusshaus\Http\Resources\iOS\Places;

use Illuminate\Http\Resources\Json\Resource;

class PlacesIndexRessource extends Resource
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

            'type'       => $this->type,
            'icon_image' => $this->getIconImage(),
            'icon_color' => $this->getIconColor(),

            'uuid' => $this->uuid,

            'name'        => $this->name,
            'description' => $this->description,

            'geo_latitude'  => $this->location_latitude,
            'geo_longitude' => $this->location_longitude,

            'image' => $this->getPreviewImage(),
            'image_uuid' => $this->getPreviewImageUuid(),

            'created_at'          => $this->created_at->timestamp,
            'created_at_readable' => $this->created_at->diffForHumans(),

            'tags' => TagsIndexRessource::collection($this->tags),
        ];
    }
}
