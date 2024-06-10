<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MatchSchedule;
use App\Models\Ticket;
use App\Models\User;
use Auth;

class TicketController extends Controller
{
    public function showBookingForm($match)
    {
        $match = MatchSchedule::findOrFail($match);
        $ticket = Ticket::where('TicketID', $match->TicketID)->first();

        return view('matches.book', compact('match', 'ticket'));
    }

    public function show($ticket_id)
    {
        $ticket = Ticket::find($ticket_id);

        if (!$ticket) {
            abort(404, 'Ticket not found');
        }

        return view('tickets.show', compact('ticket'));
    }


    public function bookTickets(Request $request, $match)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $match = MatchSchedule::findOrFail($match);
        $ticket = Ticket::where('TicketID', $match->TicketID)->first();
        $user = Auth::user();
        $totalPrice = $request->quantity * $ticket->Price;

        if ($user->saldo < $totalPrice) {
            return redirect()->back()->with('error', 'Saldo Anda tidak cukup untuk membeli tiket.');
        }

        // Mengurangkan saldo user
        $user->saldo -= $totalPrice;
        $user->save();

        // Mengurangkan jumlah tiket yang tersedia
        $ticket->Quantity -= $request->quantity;
        $ticket->save();

        // Simpan informasi pembelian tiket
        // Tambahkan relasi `tickets` pada model `User`
        $user->tickets()->create([
            'match_id' => $match->MatchID,
            'quantity' => $request->quantity,
            'price' => $ticket->Price,
        ]);

        return redirect()->route('matches.index')->with('success', 'Tiket berhasil dibeli!');
    }
}

