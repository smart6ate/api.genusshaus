<?php

namespace Genusshaus\Http\Resources\iOS\Places;

use Genusshaus\Domain\Places\Models\Post;
use Genusshaus\Http\Resources\iOS\Beacons\BeaconsIndexRessource;
use Genusshaus\Http\Resources\iOS\Posts\PostsIndexRessource;
use Illuminate\Http\Resources\Json\Resource;

class BeaconsShowPostsRessource extends Resource
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
        $place = $this->place;
        $beacons = $place->beacons;
        $posts = Post::where('place_id', '=', $place->id)->isPublished()->get();

        return [
            'place_uuid' => $this->place->uuid,
            'place_name' => $this->place->name,

            'uuid'  => $this->uuid,
            'major' => $this->major,
            'minor' => $this->minor,

            'articles' => PostsIndexRessource::collection($posts),
            'beacons'  => BeaconsIndexRessource::collection($beacons),
        ];
    }
}
