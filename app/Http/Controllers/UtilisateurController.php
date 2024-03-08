<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Evenement;


class UtilisateurController extends Controller
{
    public function index(Request $request)
    {
        $query = Evenement::where('statut', 'Accepted')->with('categorie');
    
        if ($request->filled('filterTitle')) {
            $query->where('titre', 'like', '%' . $request->input('filterTitle') . '%');
        }
    
        if ($request->filled('filterCategorie')) {
            $query->where('categorie_id', $request->input('filterCategorie'));
        }
    
        if ($request->filled('filterDate')) {
            $query->whereDate('date', $request->input('filterDate'));
        }
    
        $events = $query->paginate(2);
        $categories = Categorie::all();
    
        $searched = ($request->filled('filterTitle') || $request->filled('filterCategorie') || $request->filled('filterDate'));
    
        return view('utilisateur.home', [
            'events' => $events,
            'categories' => $categories,
            'searched' => $searched,
        ]);
    }
    

}
