@extends('layouts.utilisateur')
@section('home')

    <div style="background:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('photos/event.jpg') }}') no-repeat center;background-size:cover"
        class=" ">


        <div class="max-w-md  w-full h-full mx-auto z-10 bg-blue-900 rounded-3xl">
            <div class="flex flex-col">
                <div class="bg-white relative drop-shadow-2xl  rounded-3xl p-4 m-4">
                    <div class="flex-none sm:flex">
                        <div class=" relative h-32 w-32   sm:mb-0 mb-3 hidden">
                            <img src="https://tailwindcomponents.com/storage/avatars/njkIbPhyZCftc4g9XbMWwVsa7aGVPajYLRXhEeoo.jpg"
                                alt="aji" class=" w-32 h-32 object-cover rounded-2xl">
                            <a href="#"
                                class="absolute -right-2 bottom-2   -ml-3  text-white p-1 text-xs bg-green-400 hover:bg-green-500 font-medium tracking-wider rounded-full transition ease-in duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="h-4 w-4">
                                    <path
                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                    </path>
                                </svg>
                            </a>
                        </div>
                        <div class="flex-auto justify-evenly">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center  my-1">

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
                                <div class="ml-auto text-xl font-mono text-black">Votre ticket</div>
                            </div>
                            <div class="border-b border-dashed border-b-2 my-5"></div>
                            <div class="flex items-center">
                                <div class="flex flex-col">
                                    <div class="flex-auto text-xs text-gray-400 my-1">
                                        <span class="mr-1 font-mono text-black font-bold">Catégorie</span>
                                    </div>
                                    <div class="w-full flex-none text-lg text-blue-800 font-bold leading-none">
                                        {{ $event->categorie->name }}</div>

                                </div>
                                <div class="flex flex-col mx-auto">

                                </div>
                                <div class="flex flex-col ">
                                    <div class="flex-auto text-xs text-gray-400 my-1">
                                        <span class="mr-1 font-mono text-black font-bold">Titre </span>
                                    </div>
                                    <div class="w-full flex-none text-lg text-blue-800 font-bold leading-none">
                                        {{ $event->titre }}</div>

                                </div>
                            </div>
                            <div class="border-b border-dashed border-b-2 my-5 pt-5">
                                <div class="absolute rounded-full w-5 h-5 bg-blue-900 -mt-2 -left-2"></div>
                                <div class="absolute rounded-full w-5 h-5 bg-blue-900 -mt-2 -right-2"></div>
                            </div>
                            <div class="flex items-center mb-5 p-5 text-sm">
                                <div class="flex flex-col">


                                </div>

                            </div>
                            <div class="flex items-center mb-4 px-5">
                                <div class="flex flex-col text-sm">
                                    <span class="text-center font-mono text-black ">Prix</span>
                                    <div class="font-semibold">{{ $event->price }} MAD</div>

                                </div>
                                <div class="flex flex-col mx-auto text-sm">


                                </div>
                                <div class="flex flex-col text-sm">
                                    <span class="text-center font-mono text-black ">Date</span>
                                    <div class="font-semibold">{{ $event->date }}</div>

                                </div>
                            </div>
                            <div class="border-b border-dashed border-b-2 my-5 pt-5">
                                <div class="absolute rounded-full w-5 h-5 bg-blue-900 -mt-2 -left-2"></div>
                                <div class="absolute rounded-full w-5 h-5 bg-blue-900 -mt-2 -right-2"></div>
                            </div>
                            <div class="flex items-center px-5 pt-3 text-sm">
                                <div class="flex flex-col">
                                    <span class="font-mono text-black font-bold">Participant</span>

                                </div>
                                <div class="flex flex-col mx-auto">


                                </div>
                                <div class="flex flex-col">
                                    <span
                                        class="font-mono text-xl text-blue-900 font-bold">{{ $reservation->user->name }}</span>

                                </div>
                            </div>
                            <div class="flex flex-col py-5  justify-center text-sm ">
                                <img src="https://www.svgrepo.com/show/499962/music.svg" class="h-14 mr-3 "
                                    alt="Landwind Logo">
                                <span
                                    class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Evento</span>

                                <div class="barcode h-14 w-0 inline-block mt-4 relative left-auto"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection
