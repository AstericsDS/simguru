<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Resources\V1\PendingUpdateResource;
use App\Models\PendingUpdate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PendingUpdateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PendingUpdateResource::collection(PendingUpdate::paginate(10));
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
    public function show(PendingUpdate $update)
    {
        return new PendingUpdateResource($update);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PendingUpdate $pendingUpdate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PendingUpdate $pendingUpdate)
    {
        //
    }
}
