<?php

namespace Genusshaus\Domain\Users\Models;

use Genusshaus\Domain\Places\Models\Place;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Device extends Model
{
    use SoftDeletes;

    protected $fillable = ['push_token', 'last_activty'];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'last_activty',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($device) {
            $device->uuid = (string) Str::uuid();
        });
    }

    public function favourites()
    {
        return $this->belongsToMany(Place::class, 'favourites', 'device_id', 'place_id')->withTimeStamps();
    }
}
