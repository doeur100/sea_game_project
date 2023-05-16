<?php

namespace App\Http\Controllers;

use App\Http\Resources\TicketResource;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = Ticket::all();
        $tickets = TicketResource::collection($tickets);
        return response()->json(['success' =>true, 'data' => $tickets],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tickets = Ticket::create([
            'user_id'=> request('user_id'),
            'schedule_id'=> request('schedule_id'),
            'venue_id'=> request('venue_id')
        ]);
        return response()->json(['success' =>true, 'data' => $tickets],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ticket = Ticket::find($id);
        $ticket = new TicketResource($ticket);
        return response()->json(['success' =>true, 'data' => $ticket],201);
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
        $team = Ticket::find($id);
        $team->delete();
    }
}
