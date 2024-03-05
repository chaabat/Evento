<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategorieController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();
        return view(('admin.categorie'),compact('categories'));
    }

    public function store(Request $request)
    {
        try {
            $attributes = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
    
            $fileName = time() . '.' . $request->picture->extension();
            $request->picture->move(public_path('images'), $fileName);
            $picture = 'images/' . $fileName; 
            
            $user = Auth::user();
            Categorie::create([
                'name' => $request->name,
                'picture' => $picture, 
                'user_id' => $user->id,
            ]);
    
            return redirect()->route('categories');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
    

    public function delete(Categorie $categorie){
        $categorie->delete();
        return redirect()->route('categories');
    }
}