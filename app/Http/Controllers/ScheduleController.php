<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedules = Schedule::all();
        return response()->json(['success' =>true, 'data' => $schedules],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $schedule = Schedule::create([
            'date'=> request('date'),
            'event_id'=>request(('event_id'))
        ]);
        return response()->json(['success' =>true, 'data' => $schedule],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $schedule = Schedule::find($id);
        return $schedule;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $schedule = Schedule::find($id);
        $schedule-> update([
            'date'=>request('date'),
            'event_id'=>request('event_id')
        ]);
        return response()->json(['success' =>true, 'data' => $schedule],201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $schedule = Schedule::find($id);
        $schedule->delete();
    }
}
