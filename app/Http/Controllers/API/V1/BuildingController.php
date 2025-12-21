<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Building;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use App\Http\Requests\StoreBuildingRequest;
use App\Http\Resources\V1\BuildingResource;
use Spatie\QueryBuilder\Enums\FilterOperator;

class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buildings = QueryBuilder::for(Building::class)
            ->allowedFilters([
                AllowedFilter::partial('name'),
                AllowedFilter::partial('campus.name'),
                AllowedFilter::operator('building_area', FilterOperator::DYNAMIC),
                AllowedFilter::operator('land_area', FilterOperator::DYNAMIC),
                AllowedFilter::operator('floor', FilterOperator::DYNAMIC),
            ])
            ->allowedSorts('building_area', 'land_area', 'floor')
            ->get();
        return BuildingResource::collection($buildings);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBuildingRequest $request)
    {
        return new BuildingResource(Building::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Building $building)
    {
        return new BuildingResource($building);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Building $building)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Building $building)
    {
        $delete = Building::find($building->id)->toArray();
        if ($building->delete()) {
            return response()->json(['message' => 'Success', 'deleted' => $delete]);
        } else {
            return response()->json(['message' => 'Failed']);
        }
    }
}
