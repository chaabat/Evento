<?php

namespace App\Http\Controllers;


use App\Models\Evenement;
use App\Models\Reservation;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{

    public function viewReservations()
    {
        $userId = Auth::id();
        $organisateur = Evenement::where('user_id', $userId)->pluck('id');

        $eventReservations = Reservation::whereIn('evenement_id', $organisateur)
            ->whereNotIn('user_id', function ($query) {
                $query->select('id')->from('users')->whereNotNull('deleted_at');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(2);

        return view('organisateur.reservations', ['reservations' => $eventReservations]);
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
        $userId = Auth::id();
        $event = Evenement::findOrFail($id);

        return view('utilisateur.eventDetails', compact('event'));
    }


    public function createReservation($eventId)
    {
        $evenement = Evenement::findOrFail($eventId);

        if ($evenement->totalPlaces > 0) {
            if ($evenement->mode === 'Automatique') {
                $nombrePlace = $this->getNextPlaceNumber($evenement);
                $evenement->decrement('totalPlaces');
            } else {

                $nombrePlace = 0;
            }

            Reservation::create([
                'titre' => $evenement->titre,
                'date' => now(),
                'statut' => ($evenement->mode === 'Automatique') ? 'Reserved' : 'Pending',
                'nombrePlace' => $nombrePlace,
                'evenement_id' => $evenement->id,
                'user_id' => auth()->id(),
            ]);
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



    public function updateReservationStatus(Request $request, $reservationId)
    {
        $request->validate([
            'statut' => 'required|in:Reserved,Rejected',
        ]);
        $reservation = Reservation::findOrFail($reservationId);

        $reservation->statut = $request->statut;
        $reservation->nombrePlace = $this->getNextPlaceNumber($reservation->evenement);
        $reservation->evenement->decrement('totalPlaces');

        $reservation->save();
        return back();
    }


    public function generateTicket(Reservation $reservation, Evenement $event)
    {
        return view('utilisateur.ticket', compact('reservation', 'event'));
    }
}
