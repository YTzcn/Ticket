<?php

namespace App\Http\Controllers;

use App\Models\ImportanceLevel;
use App\Models\Ticket;
use App\Models\Message;
use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Container\RewindableGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Illuminate\Events\queueable;

class TicketController extends Controller
{

    public function index()
    {
        $unitTickets = Ticket::with('status')->with('unit')->with('user')->with('importanceLevel')->where('unit_id', '=', Auth::user()->unit_id)->get();
        $userTickets = Ticket::with('status')->with('unit')->with('user')->with('importanceLevel')->where('user_id', '=', Auth::user()->id)->get();
        return view('front.ticket.index', compact('userTickets'), compact('unitTickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $importances = ImportanceLevel::all();
        $units = Unit::all();
        return view('front.ticket.newTicket', compact('importances'), compact('units'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newTicket = new Ticket();
        $newTicket->title = $request->title;
        $newTicket->importance_level_id = $request->importance_level_id;
        $newTicket->unit_id = $request->unit_id;
        $newTicket->user_id = Auth()->user()->id;
        $newTicket->status_id = 1;
        $newTicket->created_at = Carbon::now();
        $newTicket->updated_at = Carbon::now();
        $newTicket->save();
        $ticketMessage = new Message();
        $ticketMessage->ticket_id = $newTicket->id;
        $ticketMessage->user_id = Auth()->User()->id;
        $ticketMessage->content = $request->message;
        $ticketMessage->created_at = Carbon::now();
        $ticketMessage->updated_at = Carbon::now();
        $ticketMessage->save();
        return redirect()->route('ticket.show', $newTicket->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ticket = Ticket::with('status')->with('unit')->with('importanceLevel')->find($id);
        if ($ticket->status->id == 1 && Auth::user()->unit_id == $ticket->unit_id) {
            $ticket->status_id = 2;
        }
        $ticket->save();
        $messages = Message::where('ticket_id', '=', $id)->with('user')->get();
        return view('front.ticket.detail', compact('ticket'), compact('messages'));
    }

    public function endTicekt(string $id)
    {
        $ticket = Ticket::find($id);
        $ticket->status_id = 3;
        $ticket->save();
        return redirect()->route('ticket.show', $ticket->id);
    }

    public function addMessage(Request $request)
    {
        $message = new Message();
        $message->ticket_id = $request->ticket_id;
        $message->user_id = Auth::user()->id;
        $message->content = $request->message;
        $message->created_at = Carbon::now();
        $message->updated_at = Carbon::now();
        $message->save();
        return redirect()->route('ticket.show', $request->ticket_id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
        //
    }
}
