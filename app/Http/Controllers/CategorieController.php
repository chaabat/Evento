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
            'picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'name.min' => 'The name must have more than 3 characters.',
            'name.unique' => 'This name is already taken.',

        ]);
        try {
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



    public function update(Request $request)
    {

        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048',

            ]);
            $updateCategorie = Categorie::findOrFail($request->id);

            if ($request->hasfile('picture')) {

                if ($updateCategorie->picture) {
                    Storage::delete('public/' . $updateCategorie->picture);
                }
                $fileName = time() . '.' . $request->picture->extension();
                $request->picture->move(public_path('images'), $fileName);
                $picture = 'images/' . $fileName;


                $updateCategorie->update([
                    'name' => $request->name,
                    'picture' => $picture,
                ]);
            } else {


                $updateCategorie->update([
                    'name' => $request->name,
                ]);
            }


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
