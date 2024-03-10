<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\user;
use App\Models\Categorie;
use App\Models\Reservation;
use App\Models\Evenement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;


class AdminController extends Controller
{
    public function index()
    {
        $organisateurCount = User::role('organisateur')->count();

        $utilisateurCount = User::role('utilisateur')->count();

        $mostReservedEvent = Evenement::withCount('reservations')
            ->orderBy('reservations_count', 'desc')
            ->value('titre');

        $mostActiveOrganisateur = User::role('organisateur')
            ->withCount('evenements')
            ->orderBy('evenements_count', 'desc')
            ->value('name');

        $mostActiveClient = User::role('utilisateur')
            ->withCount('reservations')
            ->orderBy('reservations_count', 'desc')
            ->value('name');

        $eventWithMostReservations = Evenement::withCount('reservations')
            ->orderBy('reservations_count', 'desc')
            ->value('titre');

        $mostUsedCategory = Categorie::withCount('events')
            ->orderBy('events_count', 'desc')
            ->value('name');

        $eventCount = Evenement::count();

        return view('admin.dashboard', compact('organisateurCount', 'utilisateurCount', 'mostReservedEvent', 'eventCount', 'mostActiveOrganisateur', 'mostActiveClient', 'eventWithMostReservations', 'mostUsedCategory'));
    }


    public function evenments()
    {
        $user = Auth::id();
        $categories = Categorie::all();
        $evenements = Evenement::all();


        return view('admin.evenement', compact('evenements'), compact('categories'));
    }

    public function updateStatus(Request $request, $eventId)
    {
        $request->validate([
            'statut' => 'required|in:Accepted,Rejected',
        ]);
        $event = Evenement::findOrFail($eventId);
        $event->statut = $request->statut;
        $event->save();
        return back();
    }

    public function utilisateurs()
    {
        $utilisateurRole = Role::where('name', 'utilisateur')->firstOrFail();

        $utilisateurs = $utilisateurRole->users()->withTrashed()->paginate(5);

        return view('admin.utilisateur', compact('utilisateurs'));
    }

    public function organisateurs()
    {
        $organisateurRole = Role::where('name', 'organisateur')->firstOrFail();

        $organisateurs = $organisateurRole->users()->withTrashed()->paginate(5);

        return view('admin.organisateur', compact('organisateurs'));
    }


    public function deleteOrganisateur(Request $request)
    {
        $id = $request->id;
        $organisateur = User::findOrFail($id);

        $organisateur->delete();

        Evenement::where('user_id', $organisateur->id)->delete();
        Reservation::whereIn('evenement_id', function ($query) use ($organisateur) {
            $query->select('id')->from('evenements')->where('user_id', $organisateur->id);
        })->delete();
        return redirect()->back();
    }



    public function activeOrganisateur(string $id)
    {
        $organisateur = User::withTrashed()->findOrFail($id);

        $organisateur->restore();

        Evenement::withTrashed()
            ->where('user_id', $organisateur->id)
            ->restore();

        Reservation::withTrashed()
            ->whereIn('evenement_id', function ($query) use ($organisateur) {
                $query->select('id')->from('evenements')->where('user_id', $organisateur->id);
            })
            ->restore();

        return redirect()->back()->with('success', 'Organisateur and associated events/restaurants restored successfully');
    }


    public function deleteEvent(Evenement $evenement)
    {

        $evenement->delete();
        return redirect()->route('evenments');
    }
}
