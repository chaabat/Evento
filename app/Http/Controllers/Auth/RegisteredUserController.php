<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Organisateur;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function createOrganisateur(): View
    {
        return view('auth.registerOrganisateur');
    }

    public function createUtilisateur(): View
    {
        return view('auth.registerUtilisateur');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function storeOrganisateur(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'picture' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'picture' => $request->picture,
        ]);
        if ($request->hasFile('picture')) {
            $fileName = time() . '.' . $request->picture->extension();
            $request->picture->move(public_path('images/users'), $fileName);
            $user->picture = $fileName;
            $user->save();
        }


        $user->assignRole('organisateur');

        event(new Registered($user));
        Auth::login($user);

        return redirect()->route('organisateur');
    }

    public function storeUtilisateur(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'picture' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'picture' => $request->picture,
        ]);


        if ($request->hasFile('picture')) {
            $fileName = time() . '.' . $request->picture->extension();
            $request->picture->move(public_path('images/users'), $fileName);
            $user->picture = $fileName;
            $user->save();
        }



        $user->assignRole('utilisateur');

        event(new Registered($user));
        Auth::login($user);

        return redirect()->route('utilisateur');
    }
}
