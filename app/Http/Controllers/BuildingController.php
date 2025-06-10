<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBuildingRequest;
use App\Http\Resources\BuildingResource;
use App\Models\Building;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return BuildingResource::collection(Building::all());
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
        if($building->delete()) {
            return response()->json(['message' => 'Success', 'deleted' => $delete]);
        } else {
            return response()->json(['message' => 'Failed']);
        }
    }
}
