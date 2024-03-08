@extends('layouts.utilisateur')
@section('home')


    <div class="flex justify-center items-center w-full">
        <div
            class="flex justify-center items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl w-full">
            <div class="flex flex-col justify-between p-4 leading-normal">
                <div class="flex items-center mb-2 ">
                    <a href="{{ route('utilisateurEvent') }}"
                        class="inline-flex items-center justify-center h-8 w-8 text-lg text-indigo-500"><i
                            class="bx bx-arrow-back"></i></a>
                </div>
                <div class="flex justify-between gap-10 ">

                    <h5 class="flex justify-center mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        Your Ticket Information </h5>
                    <div class="">

                        <div class="flex items-center text-green-500 mt-2">
                            <span class="ml-2 leading-none text-green-600">
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

                </div>
                <p class="mb-3 font-normal text-gray-700"> Categorie : {{ $event->categorie->nom }} </p>
                <p class="font-normal text-gray-700"> Titre de l'evenement : {{ $event->titre }} </p>
                <div class="flex items-center justify-between gap-4">
                    <div class="flex text-indigo-500 items-center gap-2 mt-3">
                        Nom du participant :
                        <p class="text-gray-700">{{ $reservation->user->name }} </p>
                    </div>
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
    <div class="max-w-md w-full h-full mx-auto z-10 bg-blue-900 rounded-3xl">
        <div class="flex flex-col">
            <div class="bg-white relative drop-shadow-2xl  rounded-3xl p-4 m-4">
                <div class="flex-none sm:flex">
                    <div class=" relative h-32 w-32   sm:mb-0 mb-3 hidden">
                        <img src="https://tailwindcomponents.com/storage/avatars/njkIbPhyZCftc4g9XbMWwVsa7aGVPajYLRXhEeoo.jpg"
                            alt="aji" class=" w-32 h-32 object-cover rounded-2xl">
                        <a href="#"
                            class="absolute -right-2 bottom-2   -ml-3  text-white p-1 text-xs bg-green-400 hover:bg-green-500 font-medium tracking-wider rounded-full transition ease-in duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4">
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
                                        $userReservation = $event->reservations->where('user_id', Auth::id())->first();
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
                                    <span class="mr-1 ">MO</span><span>19 22</span>
                                </div>
                                <div class="w-full flex-none text-lg text-blue-800 font-bold leading-none">COK</div>
                                <div class="text-xs">Cochi</div>

                            </div>
                            <div class="flex flex-col mx-auto">
                                <img src="https://image.winudf.com/v2/image1/Y29tLmJldHMuYWlyaW5kaWEudWlfaWNvbl8xNTU0NTM4MzcxXzA0Mw/icon.png?w=&amp;fakeurl=1"
                                    class="w-20 p-1">

                            </div>
                            <div class="flex flex-col ">
                                <div class="flex-auto text-xs text-gray-400 my-1">
                                    <span class="mr-1">MO</span><span>19 22</span>
                                </div>
                                <div class="w-full flex-none text-lg text-blue-800 font-bold leading-none">DXB</div>
                                <div class="text-xs">Dubai</div>

                            </div>
                        </div>
                        <div class="border-b border-dashed border-b-2 my-5 pt-5">
                            <div class="absolute rounded-full w-5 h-5 bg-blue-900 -mt-2 -left-2"></div>
                            <div class="absolute rounded-full w-5 h-5 bg-blue-900 -mt-2 -right-2"></div>
                        </div>
                        <div class="flex items-center mb-5 p-5 text-sm">
                            <div class="flex flex-col">
                                <span class="text-sm">Flight</span>
                                <div class="font-semibold">Airbus380</div>

                            </div>
                            <div class="flex flex-col ml-auto">
                                <span class="text-sm">Gate</span>
                                <div class="font-semibold">B3</div>

                            </div>
                        </div>
                        <div class="flex items-center mb-4 px-5">
                            <div class="flex flex-col text-sm">
                                <span class="">Board</span>
                                <div class="font-semibold">11:50AM</div>

                            </div>
                            <div class="flex flex-col mx-auto text-sm">
                                <span class="">Departs</span>
                                <div class="font-semibold">11:30Am</div>

                            </div>
                            <div class="flex flex-col text-sm">
                                <span class="">Arrived</span>
                                <div class="font-semibold">2:00PM</div>

                            </div>
                        </div>
                        <div class="border-b border-dashed border-b-2 my-5 pt-5">
                            <div class="absolute rounded-full w-5 h-5 bg-blue-900 -mt-2 -left-2"></div>
                            <div class="absolute rounded-full w-5 h-5 bg-blue-900 -mt-2 -right-2"></div>
                        </div>
                        <div class="flex items-center px-5 pt-3 text-sm">
                            <div class="flex flex-col">
                                <span class="">Passanger</span>
                                <div class="font-semibold">Ajimon</div>

                            </div>
                            <div class="flex flex-col mx-auto">
                                <span class="">Class</span>
                                <div class="font-semibold">Economic</div>

                            </div>
                            <div class="flex flex-col">
                                <span class="">Seat</span>
                                <div class="font-semibold">12 E</div>

                            </div>
                        </div>
                        <div class="flex flex-col py-5  justify-center text-sm ">
                            <h6 class="font-bold text-center">Boarding Pass</h6>

                            <div class="barcode h-14 w-0 inline-block mt-4 relative left-auto"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
