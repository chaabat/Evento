<?php

namespace App\Http\Controllers;

use App\Models\admin;
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

    public function utilisateurs()
    {
        return view('admin.utilisateur');
    }

    public function organisateurs()
    {
        return view('admin.organisateur');
    }
}
