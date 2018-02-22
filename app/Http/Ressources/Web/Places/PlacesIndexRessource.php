<?php

namespace Genusshaus\Http\Resources\Web\Places;

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
            'uuid'      => $this->uuid,
            'name'      => $this->name,
            'image_url' => $this->uploadcares->first()->url,
        ];
    }
}
