<?php

namespace Genusshaus\Http\Resources\iOS\Places;

use Genusshaus\Domain\Ressources\Models\Event;
use Genusshaus\Domain\Ressources\Models\Post;
use Illuminate\Http\Resources\Json\Resource;

class PlacesShowRessource extends Resource
{
    public function toArray($request)
    {
        $articles = Post::where('place_id', '=', $this->id)->get();
        $events = Event::where('place_id', '=', $this->id)->get();

        return [

            'type'       => $this->type,
            'icon_color' => $this->getIconColor(),
            'icon_image' => $this->getIconImage(),

            'uuid' => $this->uuid,

            'name'        => $this->name,
            'description' => $this->description,

            'street'   => $this->location_street,
            'postcode' => $this->location_postcode,
            'place'    => $this->location_city,

            'geo_latitude'  => $this->location_latitude,
            'geo_longitude' => $this->location_longitude,

            'created_at'               => $this->created_at->timestamp,
            'created_at_diffForHUmans' => $this->created_at->diffForHumans(),

            'image' => $this->getPreviewImage(),
            'image_uuid' => $this->getPreviewImageUuid(),

            'icon' => $this->getIconImage(),

            'tags' => TagsIndexRessource::collection($this->tags),
            'contact' => [

                'name'      => $this->contact_name,

                'avatar_uuid'    => md5($this->contact_avatar),
                'avatar'    => 'https://www.gravatar.com/avatar/'. $this->uuid .'?s=250&d=mm',

                'Web'       => $this->contact_web,
                'email'     => $this->contact_email,
                'phone'     => $this->contact_phone,
                'facebook'  => $this->contact_facebook,
                'twitter'   => $this->contact_twitter,
                'instagram' => $this->contact_instagram,

            ],

            'openings' => OpeningHoursIndexRessource::collection($this->openingHours),

            'articles' => PostsIndexRessource::collection($articles),

            'events'   => EventsShowRessource::collection($events),

        ];
    }
}
