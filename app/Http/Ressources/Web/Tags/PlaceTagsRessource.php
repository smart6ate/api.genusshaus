<?php

namespace Genusshaus\Http\Resources\Web\Tags;

use Illuminate\Http\Resources\Json\Resource;

class PlaceTagsRessource extends Resource
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
            'id'   => $this->id,
            'name' => $this->slug,
        ];
    }
}
