<?php

namespace App\Http\Controllers\Api\V1;

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
                    AllowedFilter::callback('building_name', function($query, $value){
                        $query->whereHas('building', function($q) use ($value){
                            $q->where('name', 'like', "%{$value}%");
                        });
                    }),
                    AllowedFilter::callback('campus_name', function($query, $value){
                        $query->whereHas('campus', function($q) use ($value){
                            $q->where('name', 'like', "%{$value}%");
                        });
                    }),
                    AllowedFilter::operator('capacity', FilterOperator::DYNAMIC)
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
