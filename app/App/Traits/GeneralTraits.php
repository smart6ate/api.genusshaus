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
        return 'https://ucarecdn.com/57e60dd2-dffd-4913-b25e-1f12d3dc9bb3/-/crop/502x335/26,0/-/preview/';
    }

    public function getPreviewImageUuid()
    {
        if ($this->uploadcares()->count()) {
            return $this->uploadcares->first()->uuid;
        }
        return 'image-' . Carbon::now()->timestamp;
    }
}
