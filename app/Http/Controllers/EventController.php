<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        return response()->json(['success' =>true, 'data' => $events],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $events = Event::create([
            'typeOfSport'=> request('typeOfSport'),
            'description'=> request('description'),
        ]);
        return response()->json(['success' =>true, 'data' => $events],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $events = Event::find($id);
        return $events;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $event = Event::find($id);
        $event-> update([
            'typeOfSport'=>request('typeOfSport'),
            'description'=>request('description'),
        ]);
        return response()->json(['success' =>true, 'data' => $event],201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::find($id);
        $event->delete();
    }
}
