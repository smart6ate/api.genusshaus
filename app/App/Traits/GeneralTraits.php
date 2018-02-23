<?php

namespace Genusshaus\App\Traits;

use Carbon\Carbon;

trait GeneralTraits
{
    public function scopeIsActive($query)
    {
        return $query->where('active', true);
    }

    public function scopeIsInactive($query)
    {
        return $query->where('active', false);
    }

    public function scopeIsPublished($query)
    {
        return $query->where('published', true);
    }

    public function scopeIsUnpublished($query)
    {
        return $query->where('published', false);
    }

    public function getPreviewImage()
    {
        if ($this->uploadcares()->count()) {
            return $this->uploadcares->first()->url;
        }
        return '';
    }

    public function getPreviewImageUuid()
    {
        if ($this->uploadcares()->count()) {
            return $this->uploadcares->first()->uuid;
        }
        return '';
    }
}
