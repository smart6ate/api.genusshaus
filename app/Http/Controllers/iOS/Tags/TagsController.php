<?php

namespace Genusshaus\Http\Controllers\iOS\Devices;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Http\Resources\iOS\Tags\TagsIndexRessource;
use Spatie\Tags\Tag;

class TagsController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $tags = Tag::all();

        if ($tags->count()) {

            return TagsIndexRessource::collection($tags);
        }

    }
}
