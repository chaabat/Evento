{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

@extends('layouts.master')
@section('login')
    <div class="w-full min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0"
        style="background:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('photos/event.jpg') }}') no-repeat center;background-size:cover">
        <a href=""><img src="{{ asset('photos/logoo.png') }}" alt="Logo"></a>

        <div class="w-full sm:max-w-md p-5 mx-auto">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-4">
                    <label class="block mb-1 text-white font-mono font-bold" for="email">Email-Address</label>
                    <input id="email" type="text" name="email"
                        class="py-2 px-3 border border-white focus:border-red-300 focus:outline-none focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm disabled:bg-gray-100 mt-1 block w-full"
                        value="{{ old('email') }}" required autofocus autocomplete="username" />
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block mb-1 text-white font-mono font-bold" for="password">Mot de passe</label>
                    <input id="password" type="password" name="password"
                        class="py-2 px-3 border border-bg-white focus:border-red-300 focus:outline-none focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm disabled:bg-gray-100 mt-1 block w-full"
                        required autocomplete="current-password" />
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6 flex items-center justify-between">
                    <div class="flex items-center">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox"
                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                name="remember">
                            <span class="ms-2 text-sm text-white font-mono font-bold ">{{ __('Remember me') }}</span>
                        </label>
                    </div>
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-white font-mono font-bold  hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>

                <div class="mt-6">
                    <button type="submit"
                        class=" font-mono font-bold w-full inline-flex items-center justify-center px-4 py-2 bg-purple-700 border border-transparent rounded-md font-semibold capitalize text-white  focus:outline-none disabled:opacity-25 transition">Connexion</button>
                </div>
                <div class="mt-6 text-center">
                    <a href="/" class="underline text-white font-mono font-bold">Retour a l'accueil</a>
                </div>
            </form>
        </div>
    </div>
@endsection
