<?php

namespace App\Http\Controllers;


use App\Models\Evenement;
use App\Models\Reservation;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function reservOrganisateur()
    {
        $user = Auth::id();
        $categories = Categorie::all();
        $evenements = Evenement::orderby('created_at', 'desc')
            ->get();

        return view('organisateur.reservation', compact('evenements', 'reservation'));
    }

    public function reservUtilisateur()
    {
        $reservation = Reservation::all();
        $evenements = Evenement::where('statut', "Accepted")
            ->orderby('created_at', 'desc')
            ->get();
        return view('utilisateur.reservation', compact('evenements', 'reservation'));
    }

    public function utilisateurEvent()
    {
        $reservation = Reservation::all();
        $evenements = Evenement::where('statut', "Accepted")
            ->orderby('created_at', 'desc')
            ->get();
        return view('utilisateur.evenement', compact('evenements', 'reservation'));
    }

    public function showDetails($id)
    {
        $event = Evenement::findOrFail($id);

        return view('utilisateur.eventDetails', compact('event'));
    }


    public function createReservation($eventId)
    {
        $evenement = Evenement::findOrFail($eventId);
        if ($evenement->mode === 'automatique' && $evenement->nombrePlace > 0) {
            Reservation::create([
                'titre' => $evenement->titre,
                'date' => now(),
                'statut' => 'Reserved',
                'nombrePlace' => $this->getNextPlaceNumber($evenement),
                'evenement_id' => $evenement->id,
                'user_id' => auth()->id(),
            ]);
            $evenement->decrement('nombrePlace');
        } else {
            if ($evenement->mode === 'manuelle' && $evenement->nombrePlace > 0) {
                Reservation::create([
                    'titre' => $evenement->titre,
                    'date' => now(),
                    'statut' => 'Pending',
                    'nombrePlace' => null,
                    'evenement_id' => $evenement->id,
                    'user_id' => auth()->id(),
                ]);
            }
        }
        return redirect()->route('utilisateurEvent');
    }

    private function getNextPlaceNumber($evenement)
    {
        $highestReservedPlace = Reservation::where('evenement_id', $evenement->id)
            ->where('statut', 'Accepted')
            ->max('nombrePlace');
        return $highestReservedPlace + 1;
    }

    public function viewReservations($eventId)
    {
        $eventReservations = Reservation::where('evenement_id', $eventId)->get();
        return view('organisateur.reservations', ['reservations' => $eventReservations]);
    }

    public function updateReservationStatus(Request $request, $reservationId)
    {
        $request->validate([
            'statut' => 'required|in:Reserved,Rejected',
        ]);
        $reservation = Reservation::findOrFail($reservationId);
        // dd($reservation);
        $reservation->statut = $request->statut;
        $reservation->nombrePlace = $this->getNextPlaceNumber($reservation->evenement);
        $reservation->evenement->decrement('nombrePlace');

        $reservation->save();
        return back();
    }


    public function generateTicket(Reservation $reservation, Evenement $event)
    {
        return view('client.ticket', compact('reservation', 'event'));
    }
}
