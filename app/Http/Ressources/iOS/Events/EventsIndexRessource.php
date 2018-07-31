<?php

namespace Genusshaus\Http\Resources\iOS\Events;

use Illuminate\Http\Resources\Json\Resource;

class EventsIndexRessource extends Resource
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
            'uuid'          => $this->uuid,
            'name'          => $this->name,
            'description' => $this->description,
            'place_uuid'    => $this->place->uuid,
            'place'    => $this->place->name,
            'from'          => ($this->start)->timestamp,
            'from_readable' => optional($this->start)->diffForHumans(),
            'image'         => $this->getPreviewImage(),
            'image_uuid' => $this->getPreviewImageUuid(),

        ];
    }
}
