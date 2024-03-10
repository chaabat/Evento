{{-- <x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}


@extends('layouts.master')
@section('confirmation')
    <div class="w-full min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0"
        style="background:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('photos/event.jpg') }}') no-repeat center;background-size:cover">
        <a href="#" class="flex items-center">
            <img src="https://www.svgrepo.com/show/499962/music.svg" class=" mr-3 sm:h-9" alt="Landwind Logo">
            <span class="self-center text-2xl font-bold font-mono  whitespace-nowrap text-white">Evento</span>
        </a>
        <div class="w-full sm:max-w-md p-5 mx-auto">
            <form method="POST" action="{{ route('password.store') }}">
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="mb-4">
                    <label class="block mb-1 text-white font-mono font-bold" for="email">Email-Address</label>
                    <input id="email" type="text" name="email"
                        class="py-2 px-3 border border-white focus:border-red-300 focus:outline-none focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm disabled:bg-gray-100 mt-1 block w-full"
                        :value="old('email', $request - > email)" required autofocus autocomplete="username" />
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

                <div class="mb-4">
                    <label class="block mb-1 text-white font-mono font-bold" for="password">Confirmer le Mot de
                        passe</label>
                    <input id="password_confirmation" type="password" name="password_confirmation"
                        class="py-2 px-3 border border-bg-white focus:border-red-300 focus:outline-none focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm disabled:bg-gray-100 mt-1 block w-full"
                        required autocomplete="new-password" />
                    @error('password_confirmation')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>



                <div class="mt-6">
                    <button type="submit"
                        class=" font-mono font-bold w-full inline-flex items-center justify-center px-4 py-2 bg-purple-700 border border-transparent rounded-md font-semibold capitalize text-white  focus:outline-none disabled:opacity-25 transition">Reset
                        Password</button>
                </div>
                <div class="mt-6 text-center">
                    <a href="/" class="underline text-white font-mono font-bold">Retour a l'accueille </a>
                </div>
            </form>
        </div>
    </div>
@endsection
