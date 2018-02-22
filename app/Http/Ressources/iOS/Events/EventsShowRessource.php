<?php

namespace Genusshaus\Http\Resources\iOS\Events;

use Illuminate\Http\Resources\Json\Resource;

class EventsShowRessource extends Resource
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
            'uuid'        => $this->uuid,
            'name'        => $this->name,
            'description' => $this->description,

            'location' => [
                'place_uuid'    => $this->place->uuid,
                'place_name'    => $this->place->name,
                'street'      => $this->place->location_street,
                'postcode'      => $this->place->location_postcode,
                'place'         => $this->place->location_city,
                'geo_latitude'      => $this->place->location_latitude,
                'geo_longitude'     => $this->place->location_longitude,
            ],

            'from'          => ($this->start)->timestamp,
            'from_readable' => optional($this->start)->diffForHumans(),
            'image'         => $this->getPreviewImage(),
            'image_uuid' => $this->getPreviewImageUuid(),

            'tags' => TagsIndexRessource::collection($this->tags),

        ];
    }
}
