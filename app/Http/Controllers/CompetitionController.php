<?php

namespace App\Http\Controllers;

use App\Http\Resources\CompetitiontResource;
use App\Models\Competition;
use Illuminate\Http\Request;

class CompetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $competitions = Competition::all();
        $competitions = CompetitiontResource::collection($competitions);
        return response()->json(['success' =>true, 'data' => $competitions],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $competitions = Competition::store($request);
        return response()->json(['success' =>true, 'data' => $competitions],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $competition = Competition::find($id);
        return response()->json(['success' =>true, 'data' => $competition],201);
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
        $competition = Competition::find($id);
        $competition->delete();
    }
}
