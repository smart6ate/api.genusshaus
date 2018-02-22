<?php

namespace Genusshaus\Http\Controllers\Web;


use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Places\Models\Place;
use Genusshaus\Http\Resources\Web\Places\PlacesIndexRessource;
use Genusshaus\Http\Resources\Web\Places\PlacesShowRessource;

/*use Recombee\RecommApi\Requests\ItemBasedRecommendation;*/

class PlacesController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $places = Place::where('published', '=', true)->latest()->take(9)->get();

        return PlacesIndexRessource::collection($places);
    }

    public function show(Place $place)
    {
        return new PlacesShowRessource($place);
    }

    public function recommendations(Place $place)
    {
        $recommendations = $this->getItemBasedRecommendation($place, 6);

        $new = Place::where('id', '=', 'abc')->get();

        foreach ($recommendations as $recommendation) {
            $latest = Place::where('uuid', $recommendation)->get();

            $new->add($latest);
        }

        $places = $new->flatten();

        return PlacesIndexRessource::collection($places);
    }

   /* public function getItemBasedRecommendation(Place $place, $count)
    {
        return app()->recombee->send(new ItemBasedRecommendation($place->uuid, $count));
    }*/
}
