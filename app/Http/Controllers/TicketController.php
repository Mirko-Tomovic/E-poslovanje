<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\Journey;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $numberOfTickets = $request['ticketNumber'];
        $journeyId = $request['journeyId'];
        $journey = Journey::where("id", "=", $journeyId )->firstOrFail();  

        $availableTickets = $journey->tickets_available;
        if($numberOfTickets > $availableTickets){
            return back()->with("error", "There are not as many tickets available as you request!");
        }
        
        for ($i=0; $i < $numberOfTickets; $i++) { 
            $storedTicket = Ticket::create(["journey_id" => $request['journeyId'], "user_id" => auth()->user()->id]);            
        }
        $journey->tickets_available = $availableTickets - $numberOfTickets;
        $journey->save();
        return back()->with('success', $numberOfTickets . ' ticket(s) successfully bought!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
