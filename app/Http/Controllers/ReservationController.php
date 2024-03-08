<?php

namespace App\Http\Controllers;


use App\Models\Evenement;
use App\Models\Reservation;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    // public function reservOrganisateur()
    // {

    //     $user = Auth::id();
    //     $categories = Categorie::all();
    //     $evenements = Evenement::where('user_id', $user);
    //     $eventReservations = Reservation::where('evenement_id', $user)->get();

           


    //     return view('organisateur.reservations', compact('evenements'), compact('categories'),['reservations' => $eventReservations]);
    // }

    public function viewReservations()
    {
        $user = Auth::id();
        $eventReservations = Reservation::where('evenement_id', $user)->get();
        return view('organisateur.reservations', ['reservations' => $eventReservations]);
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
        // dd($eventId);
        if ($evenement->mode === 'Automatique' && $evenement->totalPlaces > 0) {
            Reservation::create([
                'titre' => $evenement->titre,
                'date' => now(),
                'statut' => 'Reserved',
                'nombrePlace' => $this->getNextPlaceNumber($evenement),
                'evenement_id' => $evenement->id,
                'user_id' => auth()->id(),
            ]);
            $evenement->decrement('totalPlaces');
        } else {
            if ($evenement->mode === 'Manuelle' && $evenement->totalPlaces > 0) {
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
