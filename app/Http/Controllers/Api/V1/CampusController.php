<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Campus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use App\Http\Resources\V1\CampusResource;

class CampusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $campuses = QueryBuilder::for(Campus::class)
                    ->allowedFilters([
                        AllowedFilter::partial('name')
                    ])->get();
        return CampusResource::collection($campuses);
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
    public function show(Campus $campus)
    {
        return new CampusResource($campus);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Campus $campus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Campus $campus)
    {
        //
    }
}
