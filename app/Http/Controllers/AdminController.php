<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\user;
use App\Models\Categorie;
use App\Models\Evenement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;


class AdminController extends Controller
{
    public function index()
    {
        $organisateurRole = Role::where('name', 'organisateur')->first();
        $organisateurCount = $organisateurRole->users()->count();

        $utilisateurRole = Role::where('name', 'utilisateur')->first();
        $utilisateurCount = $utilisateurRole->users()->count();

        $eventCount = Evenement::count();

        return view('admin.dashboard', compact(['organisateurCount', 'utilisateurCount', 'eventCount']));
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
        return redirect()->route('adminOrganisateur');
    }



    public function activeOrganisateur(string $id)
    {
        $organisateur = User::withTrashed()->findOrFail($id);
        $organisateur->restore();
        return redirect()->route('adminOrganisateur');
    }

    public function deleteUtilisateur(Request $request)
    {
        $id = $request->id;
        $utilisateur = User::findOrFail($id);

        $utilisateur->delete();
        return redirect()->route('adminUtilisateur');
    }

    public function activeUtilisateur(string $id)
    {
        $utilisateur = User::withTrashed()->findOrFail($id);
        $utilisateur->restore();
        return redirect()->route('adminUtilisateur');
    }

    public function deleteEvent(Evenement $evenement)
    {

        $evenement->delete();
        return redirect()->route('evenments');
    }


    public function stats()
{
    $mostReservedEvent = Evenement::select('titre')
    ->withCount('reservations')
    ->orderBy('reservations_count', 'desc')
    ->value('titre');
    $mostActiveOrganisateur = User::select('name')->
    Role::where('name', 'utilisateur')->first()
    ->withCount('evenements')
    ->orderBy('evenements_count', 'desc')
    ->value('name');

    $mostActiveClient = User::select('name')->
    Role::where('name', 'utilisateur')->first()
    ->withCount('reservations')
    ->orderBy('reservations_count', 'desc')
    ->value('name');
    $eventWithMostReservations = Evenement::select('titre')
    ->withCount('reservations')
    ->orderBy('reservations_count', 'desc')
    ->value('titre');
    $mostUsedCategory = Categorie::select('name')
    ->withCount('events')
    ->orderBy('events_count', 'desc')
    ->value('name');


    return view('admin.dashboard', compact('clientCount','organisateurCount','totalEvents','mostReservedEvent','mostActiveOrganisateur','mostActiveClient'));
}
}
