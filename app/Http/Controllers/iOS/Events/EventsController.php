<?php

namespace Genusshaus\Http\Controllers\iOS\Events;

use Genusshaus\App\Controllers\Controller;
use Genusshaus\Domain\Places\Models\Event;
use Genusshaus\Http\Requests\iOS\Events\ShowEventsRequest;
use Genusshaus\Http\Resources\iOS\Events\EventsIndexRessource;
use Genusshaus\Http\Resources\iOS\Events\EventsShowRessource;

class EventsController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $events = Event::isPublished()->get();

        if ($events->count()) {

            return EventsIndexRessource::collection($events);
        }

        return response()->json([
        ], 204);

    }

    public function show(ShowEventsRequest $request)
    {
        $event = Event::where('uuid', '=', $request->uuid)->first();

        return new EventsShowRessource($event);
    }
}
