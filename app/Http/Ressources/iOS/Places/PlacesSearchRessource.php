<?php

namespace Genusshaus\Http\Resources\iOS\Places;

use Illuminate\Http\Resources\Json\Resource;

class PlacesSearchRessource extends Resource
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
            'uuid' => $this->uuid
        ];
    }
}
