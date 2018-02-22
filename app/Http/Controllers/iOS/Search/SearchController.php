<?php

namespace Genusshaus\Http\Controllers\iOS\Search;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Places\Models\Place;
use Genusshaus\Http\Requests\iOS\Logs\LogPhraseRequest;
use Genusshaus\Http\Requests\iOS\Search\SearchPlacesRequest;
use Genusshaus\Http\Resources\iOS\Places\PlacesSearchRessource;

class SearchController extends Controller
{
    public function search(SearchPlacesRequest $request)
    {
        $places = Place::withAllTags($request->tags)
            ->orderBy('name', 'asc')
            ->get();

        if ($places->count()) {

            return PlacesSearchRessource::collection($places);
        }

        return response()->json([
        ], 204);
    }

    public function log(LogPhraseRequest $request)
    {
        return response()->json([
        ], 200);
    }
}
