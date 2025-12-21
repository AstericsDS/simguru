<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use App\Http\Resources\V1\EventResource;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = QueryBuilder::for(Event::class)
            ->allowedIncludes(['room', 'room.building', 'room.building.campus'])
            ->allowedFilters([
                AllowedFilter::partial('room.building.campus.name'),
                AllowedFilter::partial('room.building.name'),
                AllowedFilter::partial('room.name'),
                AllowedFilter::partial('event_name'),
                AllowedFilter::partial('reserved_by'),
                AllowedFilter::partial('day'),
                AllowedFilter::partial('lecturer'),
                AllowedFilter::partial('major'),
                AllowedFilter::partial('description'),
            ])
            ->with('room.building.campus')
            ->get();
        return EventResource::collection($events);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
