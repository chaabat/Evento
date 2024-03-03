{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register.organisateur') }}">
        @csrf
        <input type="text" name="role" value="organisateur" class="hidden">
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

@extends('layouts.master')
@section('registerOrganisateur')
    <div class="w-full min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0"
        style="background:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('photos/event.jpg') }}') no-repeat center;background-size:cover">
        <a href=""><img src="{{ asset('photos/logoo.png') }}" alt="Logo"></a>

        <div class="w-full sm:max-w-md p-5 mx-auto">
            <form method="POST" action="{{ route('register.organisateur') }}" enctype="multipart/form-data">
                @csrf
                <input type="text" name="role" value="organisateur" class="hidden">
                <div class="flex justify-center items-center mb-4 space-x-6">
                    <div class="shrink-0">
                        <img id='preview_img' class="h-16 w-16 object-cover rounded-full"
                            src="https://lh3.googleusercontent.com/a-/AFdZucpC_6WFBIfaAbPHBwGM9z8SxyM1oV4wB4Ngwp_UyQ=s96-c"
                            alt="Current profile photo" />
                    </div>
                    <label class="block">
                        <span class="sr-only">Choose profile photo</span>
                        <input name="picture" type="file" onchange="loadFile(event)"
                            class="block w-full text-sm text-slate-500
                       file:mr-4 file:py-2 file:px-4
                       file:rounded-full file:border-0
                       file:text-sm file:font-semibold
                       file:bg-violet-50 file:text-violet-700
                       hover:file:bg-violet-100
                     " />
                    </label>
                </div>
                <div class="mb-4">
                    <label class="block mb-1 text-white font-mono font-bold" for="name">Name</label>
                    <input id="name" type="text" name="name"
                        class="py-2 px-3 border border-white focus:border-red-300 focus:outline-none focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm disabled:bg-gray-100 mt-1 block w-full"
                        value="{{ old('name') }}" required autofocus autocomplete="username" />
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

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

                <div class="mb-4">
                    <label class="block mb-1 text-white font-mono font-bold" for="password">confirmer le Mot de
                        passe</label>
                    <input id="password_confirmation" type="password" name="password_confirmation"
                        class="py-2 px-3 border border-bg-white focus:border-red-300 focus:outline-none focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm disabled:bg-gray-100 mt-1 block w-full"
                        required autocomplete="password_confirmation" />
                    @error('password_confirmation')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mt-6">
                    <button type="submit"
                        class=" font-mono font-bold w-full inline-flex items-center justify-center px-4 py-2 bg-purple-700 border border-transparent rounded-md font-semibold capitalize text-white  focus:outline-none disabled:opacity-25 transition">Registre</button>
                </div>
                <div class="mt-6 text-center">
                    <a href="/" class="underline text-white font-mono font-bold">Retour a l'accueille </a>
                </div>
            </form>
        </div>
    </div>
    <script>
        var loadFile = function(event) {

            var input = event.target;
            var file = input.files[0];
            var type = file.type;

            var output = document.getElementById('preview_img');


            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
@endsection
