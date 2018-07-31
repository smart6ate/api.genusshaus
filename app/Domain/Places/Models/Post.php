<?php

namespace Genusshaus\Domain\Places\Models;

use Genusshaus\App\Traits\GeneralTraits;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Smart6ate\Uploadcare\Traits\HasUploadcare;
use Spatie\Tags\HasTags;

class Post extends Model
{
    use  SoftDeletes, HasUploadcare, HasTags, GeneralTraits;

    protected $fillable = ['title', 'teaser', 'body', 'author', 'src'];

    public function place()
    {
        return $this->belongsTo(Place::class);
    }
}
