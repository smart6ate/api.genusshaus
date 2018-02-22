<?php

namespace Genusshaus\Http\Resources\iOS\Devices;

use Illuminate\Http\Resources\Json\Resource;

class DevicesIndexRessource extends Resource
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
            'uuid'         => $this->uuid,
            'push_token'   => $this->push_token,
            'last_activty' => optional($this->last_activity)->diffForHumans(),
        ];
    }
}
