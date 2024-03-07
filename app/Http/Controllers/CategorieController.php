<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class CategorieController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();
        return view(('admin.categorie'), compact('categories'));
    }

    public function store(Request $request)
    {
       
        $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:255'],
        ], [
            'name.min' => 'The name must have more than 3 characters.',
            'name.unique' => 'This name is already taken.',

        ]);
        try {
       
        $user = Auth::user();
        Categorie::create([
            'name' => $request->name,
            'user_id' => $user->id,
        ]);

        return redirect()->route('categories');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }



    public function update(Request $request)
    {

        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],

            ]);
            $updateCategorie = Categorie::findOrFail($request->id);

        
                $updateCategorie->update([
                    'name' => $request->name,
                ]);

            return redirect()->route('categories');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
  



    public function delete(Categorie $categorie)
    {
        $categorie->delete();
        return redirect()->route('categories');
    }
}
