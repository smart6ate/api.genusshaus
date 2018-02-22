<?php

namespace Genusshaus\Http\Resources\iOS\Beacons;

use Illuminate\Http\Resources\Json\Resource;

class BeaconsIndexRessource extends Resource
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
            'uuid'  => $this->uuid,
            'major' => $this->major,
            'minor' => $this->minor,
        ];
    }
}
