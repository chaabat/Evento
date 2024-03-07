<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Evenement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class EvenementController extends Controller
{
    public function index()
    {
        $user = Auth::id();
        $categories = Categorie::all();
        $evenements = Evenement::where('user_id', $user)
            ->orderby('created_at', 'desc')
            ->get();
        return view('organisateur.home', compact('evenements'), compact('categories'));
    }

    // public function viewAll()
    // {
    //     $user = Auth::id();
    //     $categories = Categorie::all();
    //     $evenements = Evenement::all();
    //     // dd($evenements);
    //     return view('admin.allEvents', compact('evenements'), compact('categories'));
    // }
    public function create(Request $request)
    {
        try {
            $request->validate([
                'titre' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string'],
                'lieu' => ['required', 'string', 'max:255'],
                'totalPlaces' => 'required',
                'price' => 'required',
                'mode' => ['required', 'string', 'in:automatique,manuelle'],
                'categorie_id' => 'required',
            ]);

            $user = auth()->user();

            Evenement::create([
                'titre' => $request->titre,
                'description' => $request->description,
                'date' => now()->toDateString(),
                'lieu' => $request->lieu,
                'totalPlaces' => $request->totalPlaces,
                'mode' => $request->mode,
                'price' => $request->price,
                'user_id' => $user->id,
                'categorie_id' =>$request->categorie_id,
            ]);

            return redirect()->route('addOrganisateur');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
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
}
