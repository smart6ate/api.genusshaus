<?php

namespace Genusshaus\Domain\Moderators\Models;

use Genusshaus\Domain\Places\Models\Place;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Beacon extends Model
{
    use SoftDeletes;

    protected $fillable = ['estimote_id', 'major', 'minor'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($beacon) {
            $beacon->uuid = (string) Str::uuid();
        });
    }

    public function place()
    {
        return $this->belongsTo(Place::class);
    }
}
