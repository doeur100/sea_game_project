<?php

namespace App\Http\Controllers;

use App\Models\Venue;
use Illuminate\Http\Request;

class VenueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $venue = Venue::all();
        return response()->json(['success' =>true, 'data' => $venue],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $venue = Venue::create([
            'zone'=> request('zone'),
            'address'=> request('address'),
        ]);
        return response()->json(['success' =>true, 'data' => $venue],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $venue = Venue::find($id);
        return response()->json(['success' =>true, 'data' => $venue],201);
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
        $venue = Venue::find($id);
        $venue->delete();
    }
}
