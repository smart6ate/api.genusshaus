<?php

namespace Genusshaus\Domain\Places\Models;

use Genusshaus\App\Traits\GeneralTraits;
use Genusshaus\Domain\Moderators\Models\Beacon;
use Genusshaus\Domain\Users\Models\Device;
use Genusshaus\Domain\Users\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Smart6ate\Uploadcare\Traits\HasUploadcare;
use Spatie\Tags\HasTags;

class Place extends Model
{
    use SoftDeletes, HasUploadcare, HasTags, GeneralTraits;

    protected $fillable = [
        'region_id',
        'type',
        'name',
        'description',
        'active',
        'location_street',
        'location_postcode',
        'location_city',
        'location_latitude',
        'location_longitude',
        'contact_name',
        'contact_email',
        'contact_avatar',
        'contact_web',
        'contact_phone',
        'contact_facebook',
        'contact_instagram',
        'contact_twitter',
        'image_processed',
        'is_sent_for_review',
        'active',
        'published',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            $post->uuid = (string) Str::uuid();
        });
    }

    public function getRouteKeyName()
    {
        return 'id';
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function beacons()
    {
        return $this->hasMany(Beacon::class);
    }

    public function openingHours()
    {
        return $this->hasMany(OpeningHour::class)->orderBy('weekday', 'asc');
    }

    public function favourites()
    {
        return $this->belongsToMany(Device::class, 'favourites');
    }

    public function getIconImage()
    {
        if ($this->type === 'premium') {
            return 'https://ucarecdn.com/d05ffa9e-af69-4c05-b8e8-63d62c27927e/';
        }

        return 'https://ucarecdn.com/92469039-7119-472a-bc02-75f45637e353/';
    }

    public function getIconColor()
    {
        if ($this->type === 'basic') {
            return 'ffffff';
        }

        return '000000';
    }
}
