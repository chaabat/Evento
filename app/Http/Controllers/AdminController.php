<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\user;
use App\Models\Evenement;
use Illuminate\Http\Request;
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

        return view('admin.evenement');
    }

    public function utilisateurs()
    {
        $utilisateurRole = Role::where('name', 'utilisateur')->firstOrFail();

        $utilisateurs = $utilisateurRole->users()->paginate(5);

        return view('admin.utilisateur', compact('utilisateurs'));
    }

    public function organisateurs()
    {
        $organisateurRole = Role::where('name', 'organisateur')->firstOrFail();

        $organisateurs = $organisateurRole->users()->paginate(5);

        return view('admin.organisateur', compact('organisateurs'));
    }

    public function deleteOrganisateur(Request $request)
    {
        $id = $request->id;
        $organisateur = User::findOrFail($id);

        $organisateur->delete();
        return redirect()->route('adminOrganisateur');
    }
}
