<?php

namespace Genusshaus\Domain\Places\Models;

use Illuminate\Database\Eloquent\Model;

class OpeningHour extends Model
{
    protected $fillable = ['weekday', 'open', 'close'];

    public function place()
    {
        return $this->belongsTo(Place::class);
    }
}
