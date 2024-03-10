
@extends('layouts.master')
@section('forgot-password')
    <div class="w-full min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0"
        style="background:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('photos/event.jpg') }}') no-repeat center;background-size:cover">
        <a href="#" class="flex items-center">
            <img src="https://www.svgrepo.com/show/499962/music.svg" class=" mr-3 sm:h-9" alt="Landwind Logo">
            <span class="self-center text-2xl font-bold font-mono  whitespace-nowrap text-white">Evento</span>
        </a>
        <div class="w-full sm:max-w-md p-5 mx-auto">
            <form method="POST" action="{{ route('password.email') }}">
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





                <div class="mt-6">
                    <button type="submit"
                        class=" font-mono font-bold w-full inline-flex items-center justify-center px-4 py-2 bg-purple-700 border border-transparent rounded-md font-semibold capitalize text-white  focus:outline-none disabled:opacity-25 transition">Email
                        Password Reset Link</button>
                </div>
                <div class="mt-6 text-center">
                    <a href="{{ route('login') }}" class="underline text-white font-mono font-bold">Retour a login </a>
                </div>
            </form>
        </div>
    </div>
@endsection
