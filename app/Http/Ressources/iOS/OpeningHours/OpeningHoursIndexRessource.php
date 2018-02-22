<?php

namespace Genusshaus\Http\Resources\iOS\OpeningHours;

use Illuminate\Http\Resources\Json\Resource;

class OpeningHoursIndexRessource extends Resource
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
            'id'      => $this->id,
            'weekday' => $this->weekday,
            'open'    => substr($this->open, 0, -3),
            'close'   => substr($this->close, 0, -3),
        ];
    }
}
