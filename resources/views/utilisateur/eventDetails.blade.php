@extends('layouts.utilisateur')
@section('home')
    <div style="background:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('photos/event.jpg') }}') no-repeat center;background-size:cover"
        class="py-52 px-1 md:px-8 text-center  text-white font-bold text-2xl md:text-3xl overflow-auto font-mono ">
        <div class="flex justify-center items-center w-full">
            <div
                class="flex justify-center items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl w-full">
                <div class="flex flex-col justify-between p-4 leading-normal">
                    <div class="flex items-center mb-2">
                        <a href="{{ route('utilisateurEvent') }}"
                            class="inline-flex items-center justify-center h-8 w-8 text-lg text-indigo-500"><i
                                class="bx bx-arrow-back"></i></a>
                        <h4 class="ml-2 text-xl text-gray-500">Categorie : {{ $event->categorie->name }}</h4>
                    </div>
                    <h5 class=" flex justify-center mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        Title : {{ $event->titre }} </h5>

                    <p class="mb-3 font-normal text-gray-700">{{ $event->description }} </p>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center mt-3">
                            <div class="flex items-center p-2 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                                role="alert">
                                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                </svg>
                                <span class="sr-only">Info</span>
                                <div>
                                    <span class="font-medium">Only</span> {{ $event->totalPlaces }}
                                    <span class="font-medium">Places left !</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center text-green-500 gap-2 mt-3">
                            <span class="ml- leading-none text-green-600">
                                <div>
                                    @if ($event->reservations->isEmpty())
                                        <div class="flex gap-2">
                                            <form action="{{ route('createReservation', ['eventId' => $event->id]) }}"
                                                method="post">
                                                @csrf
                                                <button type="submit"
                                                    class="rounded px-4 py-1 text-xs bg-blue-500 text-blue-100 hover:bg-blue-600 duration-300">Reserve</button>
                                            </form>
                                        </div>
                                    @else
                                        @php
                                            $userReservation = $event->reservations
                                                ->where('user_id', Auth::id())
                                                ->first();
                                        @endphp

                                        @if ($userReservation)
                                            @if ($userReservation->statut == 'Reserved')
                                                <span
                                                    class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-green-400 border border-green-400">{{ $userReservation->statut }}</span>
                                            @elseif($userReservation->statut == 'Pending')
                                                <span
                                                    class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-yellow-400 border border-yellow-400">{{ $userReservation->statut }}</span>
                                            @elseif($userReservation->statut == 'Rejected')
                                                <span
                                                    class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-red-400 border border-red-400">{{ $userReservation->statut }}</span>
                                            @endif
                                        @else
                                            <div class="flex gap-2">
                                                <form action="{{ route('createReservation', ['eventId' => $event->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    <button type="submit"
                                                        class="rounded px-4 py-1 text-xs bg-blue-500 text-blue-100 hover:bg-blue-600 duration-300">Reserve</button>
                                                </form>
                                            </div>
                                        @endif
                                    @endif
                                </div>
                            </span>
                            </span>
                        </div>
                    </div>

                    <div class="flex items-center justify-between gap-4">
                        <div class="flex items-center gap-2 mt-3">
                            <span class="inline-flex  items-center justify-end h-8 w-8 text-lg text-indigo-500"><i
                                    class="bx bx-user"></i></span>
                            <p class="ml-2 text-indigo-500">{{ $event->user->name }} </p>
                        </div>
                        <div class="flex items-center text-green-500 gap-2 mt-3">
                            <span class="ml- leading-none text-gray-600">Joins us at : </span>
                            <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="leading-none"> {{ $event->date }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
