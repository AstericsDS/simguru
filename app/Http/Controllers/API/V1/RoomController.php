<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use App\Http\Resources\V1\RoomResource;
use Spatie\QueryBuilder\Enums\FilterOperator;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = QueryBuilder::for(Room::class)
            ->allowedFilters([
                AllowedFilter::partial('name'),
                AllowedFilter::partial('campus.name'),
                AllowedFilter::partial('building.name'),
                AllowedFilter::operator('floor', FilterOperator::DYNAMIC),
                AllowedFilter::operator('length', FilterOperator::DYNAMIC),
                AllowedFilter::operator('width', FilterOperator::DYNAMIC),
                AllowedFilter::operator('height', FilterOperator::DYNAMIC),
                AllowedFilter::operator('capacity', FilterOperator::DYNAMIC),
                AllowedFilter::partial('category'),
            ])->get();
        return RoomResource::collection($rooms);
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
    public function show(Room $room)
    {
        return new RoomResource($room);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        //
    }
}
