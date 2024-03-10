<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Evenement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;



class EvenementController extends Controller
{
    public function index()
    {
        $user = Auth::id();
        $categories = Categorie::all();
        $evenements = Evenement::where('user_id', $user)
            ->orderby('created_at', 'desc')
            ->paginate(2);
        return view('organisateur.home', compact('evenements'), compact('categories'));
    }

    public function eventUp()
    {
        $user = Auth::id();
        $categories = Categorie::all();
        $evenements = Evenement::where('user_id', $user)
            ->orderby('created_at', 'desc')
            ->get();

        return view('organisateur.updateEvent', compact('evenements'), compact('categories'));
    }


    public function create(Request $request)
    {
        try {
            $request->validate([
                'titre' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string'],
                'lieu' => ['required', 'string', 'max:255'],
                'totalPlaces' => 'required',
                'price' => 'required',
                'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'mode' => ['required', 'string', 'in:automatique,manuelle'],
                'categorie_id' => 'required',
            ]);

          
            if ($request->hasFile('picture') && $request->file('picture')->isValid()) {
                $fileName = time() . '.' . $request->picture->extension();
                $request->picture->move(public_path('images'), $fileName);
                $picture = 'images/' . $fileName;
            } else {
            
                $picture = null; 
            }

            $user = auth()->user();

            Evenement::create([
                'titre' => $request->titre,
                'description' => $request->description,
                'date' => now()->toDateString(),
                'lieu' => $request->lieu,
                'picture' => $picture,
                'totalPlaces' => $request->totalPlaces,
                'mode' => $request->mode,
                'price' => $request->price,
                'user_id' => $user->id,
                'categorie_id' => $request->categorie_id,
            ]);

            return redirect()->route('addOrganisateur');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }






    public function updateEvent(Request $request)
    {
        try {
            $request->validate([
                'titre' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string'],
                'lieu' => ['required', 'string'],
                'date' => 'required',
                'totalPlaces' => ['required', 'integer'],
                'price' => ['required', 'integer'],
                'picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                'mode' => ['required', 'in:Automatique,Manuelle'],
            ]);

            $event = Evenement::findOrFail($request->event_id);
            // dd($event);

            if ($request->hasFile('picture')) {
                $fileName = time() . '.' . $request->picture->extension();
                $request->picture->move(public_path('images'), $fileName);
                $picture = 'images/' . $fileName;

                $event->update(['picture' => $picture]);
            }
            $event->update([
                'titre' => $request->titre,
                'description' => $request->description,
                'lieu' => $request->lieu,
                'totalPlaces' => $request->totalPlaces,
                'mode' => $request->mode,
                'date' => $request->date,
                'price' => $request->price,
                'categorie_id' => $request->categorie,
                'statut' => "Pending",
            ]);

            return redirect()->route('organisateur')->with('success', 'Event updated successfully');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }






    public function delete(Evenement $evenement)
    {
        $evenement->delete();
        return redirect()->route('organisateur');
    }
}
