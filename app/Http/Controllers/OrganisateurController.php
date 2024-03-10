<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrganisateurController extends Controller
{

    public function index()
    {
        return view('organisateur.home');
    }

    public  function statistique()
    {
        $user = Auth::user();
        if ($user) {
            $organisateur = $user->id;
            $totalEvents = $user->evenements->count();
            $EventsAccepted = $user->evenements->where('statut', 'Accepted')->count();
            $EventsRejected = $user->evenements->where('statut', 'Rejected')->count();
            $EventsPending = $user->evenements->where('statut', 'Pending')->count();
            $eventReservations = DB::table('evenements')
                ->select('evenements.id', 'evenements.titre', DB::raw('count(reservations.id) as reservations_count'))
                ->leftJoin('reservations', 'evenements.id', '=', 'reservations.evenement_id')
                ->where('evenements.user_id', $organisateur)
                ->groupBy('evenements.id', 'evenements.titre')
                ->get();
            $totalReservationsForEvents = $eventReservations->sum('reservations_count');

        return view('organisateur.statistiques', compact('totalEvents', 'eventReservations', 'EventsAccepted', 'EventsRejected', 'EventsPending','totalReservationsForEvents'));
        }
        return null;
    }
}
