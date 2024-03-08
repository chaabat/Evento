@extends('layouts.organis')
@section('home')
    <div class="w-full min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0"
        style="background:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('photos/event.jpg') }}') no-repeat center;background-size:cover">
        {{-- ticket --}}

        {{-- @foreach ($reservations as $reservation)
            <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">

                <div
                    class="h-fit bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">

                    <div class="flex flex-col items-center justify-between p-2 leading-normal">
                        <h5 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $reservation->evenement->titre }}</h5>
                    </div>
                    <div class="flex flex-col p-4 gap-2 ">
                        <div>
                            @if ($reservation->statut == 'Pending')
                                <div class="flex justify-center gap-2">
                                    <form action="{{ route('updateReservationStatus', $reservation->id) }}" method="post">
                                        @csrf
                                        @method('patch')
                                        <input type="hidden" name="statut" value="Reserved">
                                        <button type="submit"
                                            class="rounded px-4 py-1 text-xs bg-green-500 text-green-100 hover:bg-green-600 duration-300">Accept</button>
                                    </form>

                                    <form action="{{ route('updateReservationStatus', $reservation->id) }}" method="post">
                                        @csrf
                                        @method('patch')
                                        <input type="hidden" name="statut" value="Rejected">
                                        <button type="submit"
                                            class="rounded px-4 py-1 text-xs bg-red-600 text-red-100 hover:bg-red-700 duration-300">Reject</button>
                                    </form>
                                </div>
                            @elseif($reservation->statut == 'Reserved')
                                <span
                                    class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-green-400 border border-green-400">{{ $reservation->statut }}</span>
                            @elseif($reservation->statut == 'Rejected')
                                <span
                                    class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-red-400 border border-red-400">{{ $reservation->statut }}</span>
                            @endif
                        </div>
                        <div class="flex items-center gap-2">
                            Date d'evenement :
                            <span class=" text-green-500 ml-1 leading-none"> {{ $reservation->evenement->date }}
                            </span>
                        </div>
                        <div class="flex items-center">
                            Nom et Prenom :
                            <p class="ml-2"> {{ $reservation->user->name }}</p>
                        </div>
                        @if ($reservation->numplace)
                            <div class="flex items-center">
                                N° de place :
                                <p class="ml-2"> {{ $reservation->numplace }}</p>
                            </div>
                        @endif
                    </div>

                </div>

            </div>
        @endforeach --}}

        {{-- ticket --}}

        @foreach ($reservations as $reservation)
            <div class="max-w-screen-lg mx-4 mt-24 overflow-hidden shadow-lg rounded-xl sm:mx-auto">
                <div class="flex flex-row rounded-d border-4 border-purple-700 overflow-hidden bg-white md:h-80">


                    <div class="text-white p-8 sm:p-8 bg-[#2C2760] order-first ml-auto h-48 w-full sm:order-none sm:h-auto sm:w-1/2 lg:w-2/5 flex flex-col justify-between"
                        style="background:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('photos/back.jpg') }}') no-repeat center;background-size:cover">
                        <div class="flex items-center mt-2">
                            <img class="w-16 h-16 object-cover rounded-full" alt="User avatar"
                                src="{{ asset('images/users/' . $reservation->user->picture) }}" />

                        </div>

                        <h2 class="flex items-center mt-8 text-sm text-gray-200 sm:mt-0 text-start">
                            {{ $reservation->evenement->date }}
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-5 h-5 ml-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                            </svg>

                        </h2>
                    </div>

                    <div class="flex w-full flex-col p-4 sm:w-1/2 sm:p-8 lg:w-3/5 text-[#2C2760] bg-white">

                        <div class="flex items-start justify-between mb-4">
                            <div class="text-sm font-medium uppercase sm:text-base"><a href="#"
                                    class="m-1 px-2 py-1 rounded bg-green-500">
                                    @if ($reservation->numplace)
                                        <div class="flex items-center">
                                            N° de place :
                                            <p class="ml-2"> {{ $reservation->evenement->nombrePlace }}</p>
                                        </div>
                                    @endif
                                    places
                                </a>
                            </div>

                        </div>
                        <div class="pl-2">
                            <div class="font-medium font-mono text-black text-center mt-4 uppcase font-bold text-2xl">
                                {{ $reservation->user->name }}
                            </div>

                        </div>
                        <h2 class="text-xl font-medium text-black lg:text-xl font-mono mt-8 ">Evenement :
                            {{ $reservation->evenement->titre }}</h2>



                        <div class="flex justify-center mt-8 sm:mt-auto">
                            <div class="flex space-x-4">
                                <div>
                                    @if ($reservation->statut == 'Pending')
                                        <div class="flex justify-center gap-2">
                                            <form action="{{ route('updateReservationStatus', $reservation->id) }}"
                                                method="post">
                                                @csrf
                                                @method('patch')
                                                <input type="hidden" name="statut" value="Reserved">
                                                <button type="submit"
                                                    class="rounded px-4 py-1 text-xs bg-green-500 text-green-100 hover:bg-green-600 duration-300">Accept</button>
                                            </form>

                                            <form action="{{ route('updateReservationStatus', $reservation->id) }}"
                                                method="post">
                                                @csrf
                                                @method('patch')
                                                <input type="hidden" name="statut" value="Rejected">
                                                <button type="submit"
                                                    class="rounded px-4 py-1 text-xs bg-red-600 text-red-100 hover:bg-red-700 duration-300">Reject</button>
                                            </form>
                                        </div>
                                    @elseif($reservation->statut == 'Reserved')
                                        <span
                                            class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-green-400 border border-green-400">{{ $reservation->statut }}</span>
                                    @elseif($reservation->statut == 'Rejected')
                                        <span
                                            class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-red-400 border border-red-400">{{ $reservation->statut }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
        @endforeach

    </div>
    </div>
@endsection
