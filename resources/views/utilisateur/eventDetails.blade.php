@extends('layouts.utilisateur')
@section('home')
    <div class=" py-8">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row -mx-4">
                <div class="md:flex-1 px-4">
                    <div class="h-[460px] rounded-lg bg-gray-300 dark:bg-gray-700 mb-4">
                        <img class="w-full h-full object-cover" src="{{ asset($event->picture) }}" alt="">
                    </div>

                    <div class="w-1/2 px-2">
                        <button
                            class="w-full bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-white py-2 px-4 rounded-full font-bold hover:bg-gray-300 dark:hover:bg-gray-600">
                            <a href="{{ route('utilisateurEvent') }}">
                                Retour </a> </button>
                    </div>
                </div>
                <div class="md:flex-1 px-4">
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">Titre : {{ $event->titre }}</h2>
                    <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed
                        ante justo. Integer euismod libero id mauris malesuada tincidunt.
                    </p>
                    <div class="flex mb-4">
                        <div class="mr-4">
                            <span class="font-bold text-gray-700 dark:text-gray-300">Price:</span>
                            <span class="text-gray-600 dark:text-gray-300">{{ $event->price }} MAD</span>
                        </div>
                        <div>
                            <span class="font-bold text-gray-700 dark:text-gray-300">Catégorie:</span>
                            <span class="text-gray-600 dark:text-gray-300">{{ $event->categorie->name }}</span>
                        </div>
                    </div>
                    <div class="mb-4">

                        <div class="flex items-center mt-2">
                            <div class="flex items-center p-2 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                                role="alert">
                                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                </svg>
                                <span class="sr-only">Info</span>
                                <div>
                                    {{ $event->totalPlaces }}
                                    <span class="font-medium">Places left !</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">

                        <h1 class="font-mono text-sm font-bold text-black">organisateur : </h1>
                        <div class="flex items-center mt-2">
                            <img class="w-10 h-10 object-cover rounded-full" alt="User avatar"
                                src="{{ asset('images/users/' . $event->user->picture) }}" />
                            <div class="pl-2">
                                <div class="font-medium font-mono text-black text-l">{{ $event->user->name }}
                                </div>

                            </div>
                        </div>
                    </div>
                    <div>
                        <span class="font-bold text-gray-700 dark:text-gray-300"> Description:</span>
                        <p class="text-gray-600 dark:text-gray-300 text-sm mt-2">
                            {{ $event->description }}
                        </p>
                    </div>
                    <div class="w-1/2 px-2">
                        <div class="flex items-center text-green-500 gap-2 mt-3">
                            <span class="ml- leading-none text-green-600">
                                <div>
                                    @if ($event->totalPlaces > 0)
                                        @if ($event->reservations->isEmpty())
                                            <div class="flex gap-2">
                                                <form action="{{ route('createReservation', ['eventId' => $event->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    <button type="submit"
                                                        class="w-full bg-purple-200 dark:bg-purple-700 text-purple-800 dark:text-white py-2 px-4 rounded-full font-bold hover:bg-purple-300 dark:hover:bg-purple-600">Reserve</button>
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
                                                        class="w-full bg-green-200 dark:bg-green-700 text-green-800 dark:text-white py-2 px-4 rounded-full font-bold hover:bg-green-300 dark:hover:bg-green-600">{{ $userReservation->statut }}</span>
                                                @elseif($userReservation->statut == 'Pending')
                                                    <span
                                                        class="w-full bg-yellow-200 dark:bg-yellow-700 text-yellow-800 dark:text-white py-2 px-4 rounded-full font-bold hover:bg-yellow-300 dark:hover:bg-yellow-600">{{ $userReservation->statut }}</span>
                                                @elseif($userReservation->statut == 'Rejected')
                                                    <span
                                                        class="w-full bg-red-200 dark:bg-red-700 text-red-800 dark:text-white py-2 px-4 rounded-full font-bold hover:bg-red-300 dark:hover:bg-red-600">{{ $userReservation->statut }}</span>
                                                @endif
                                            @else
                                                <div class="flex gap-2">
                                                    <form
                                                        action="{{ route('createReservation', ['eventId' => $event->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        <button type="submit"
                                                            class="w-full bg-purple-200 dark:bg-purple-700 text-purple-800 dark:text-white py-2 px-4 rounded-full font-bold hover:bg-purple-300 dark:hover:bg-purple-600">Reserve</button>
                                                    </form>
                                                </div>
                                            @endif
                                        @endif
                                    @else
                                    @endif
                                </div>
                            </span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
