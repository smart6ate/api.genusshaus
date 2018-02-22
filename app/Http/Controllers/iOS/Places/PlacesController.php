<?php

namespace Genusshaus\Http\Controllers\iOS\Places;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Places\Models\Place;
use Genusshaus\Http\Requests\iOS\Places\ShowPlacesRequest;
use Genusshaus\Http\Resources\iOS\Places\PlacesIndexRessource;
use Genusshaus\Http\Resources\iOS\Places\PlacesShowRessource;

class PlacesController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {

        $places = Place::isPublished()->get();

        if ($places->count()) {

            return PlacesIndexRessource::collection($places);
        }

        return response()->json([
        ], 204);


    }

    public function show(ShowPlacesRequest $request)
    {
        $place = Place::where('uuid', '=', $request->uuid)->first();

       return new PlacesShowRessource($place);

    }
}
