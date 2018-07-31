<?php

namespace Genusshaus\Http\Controllers\iOS\Favourites;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Places\Models\Place;
use Genusshaus\Domain\Users\Models\Device;
use Genusshaus\Http\Requests\iOS\Favourites\AddFavouritesRequest;
use Genusshaus\Http\Requests\iOS\Favourites\GetFavouritesRequest;
use Genusshaus\Http\Requests\iOS\Favourites\RemoveFavouritesRequest;
use Genusshaus\Http\Resources\iOS\Places\PlacesIndexRessource;

class FavouritesController extends Controller
{
    public function index(GetFavouritesRequest $request)
    {
        $device = Device::where('uuid', '=', $request->device_uuid)->first();

        $places = $device->favourites;

        if ($places->count()) {

            return PlacesIndexRessource::collection($places);
        }

        return response()->json([
        ], 204);

    }

    public function add(AddFavouritesRequest $request)
    {
        $device = Device::where('uuid', '=', $request->device_uuid)->first();
        $place = Place::where('uuid', '=', $request->place_uuid)->first();

        $device->favourites()->detach($place);
        $device->favourites()->attach($place);

        return response()->json([
            'message'     => 'successfully favoured!',
            'device_uuid' => $request->device_uuid,
            'uuid'        => $request->place_uuid,
        ], 200);
    }

    public function remove(RemoveFavouritesRequest $request)
    {
        $device = Device::where('uuid', '=', $request->device_uuid)->first();
        $place = Place::where('uuid', '=', $request->place_uuid)->first();

        $device->favourites()->detach($place);

        return response()->json([
            'message'     => 'successfully unfavoured!',
            'device_uuid' => $request->device_uuid,
            'uuid'        => $request->place_uuid,
        ], 200);
    }
}
