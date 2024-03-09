@extends('layouts.admin')
@section('home')
    <div class="p-4 sm:ml-64  h-screen overflow-y-scroll"
        style="background:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('photos/event.jpg') }}') no-repeat center;background-size:cover">
        <div class="  rounded-lg mt-20">
            <div class="mb-12 ">
                <p class=" text-center  text-2xl font-bold font-mono text-white sm:text-3xl">Voila votre statistiques !
                </p>
            </div>

            <div class="flex items-center justify-center space-x-4 mt-4 mb-4 ">
                <div class="bg-purple-700 p-6 rounded-lg">
                    <div class="flex flex-row space-x-4 items-center">
                        <div id="stats-1">
                            <img src="{{ asset('photos/calendrier.png') }}" class="h-12" alt="">

                        </div>
                        <div>
                            <p class="text-white text-l font-medium uppercase font-mono text-bold">Catégorie Populaire
                            </p>
                            <p class="text-white font-bold text-2xl inline-flex items-center space-x-2">
                                {{ $mostUsedCategory }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="bg-purple-700 p-6 rounded-lg">
                    <div class="flex flex-row space-x-4 items-center">
                        <div id="stats-1">
                            <img src="{{ asset('photos/evenment.png') }}" class="h-12" alt="">
                        </div>
                        <div>
                            <p class="text-white text-l font-medium uppercase font-mono text-bold ">l'evénement le plus
                                réservés
                            </p>
                            <p class="text-white font-bold text-2xl inline-flex items-center space-x-2">
                                {{ $eventWithMostReservations }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>



            <div class="flex flex-col items-center justify-between lg:flex-row lg:items-start">

                <div
                    class="w-full flex-1 mt-8 p-8 order-2 bg-[#FEFEFF] opacity-80 shadow-xl rounded-3xl sm:w-96 lg:w-full lg:order-1 lg:rounded-r-none">
                    <img src="{{ asset('photos/organis.png') }}" class="object-cover w-32 h-32 mx-auto rounded-full"
                        alt="Avatar" />

                    <div class="py-8 text-center">
                        <h2 class="mb-4 text-2xl font-bold text-black font-mono ">Organisateurs</h2>
                    </div>

                    <div
                        class="flex items-center justify-center px-4 py-3 text-xl text-center text-white bg-purple-700 font-mono rounded-xl">
                        Totale : {{ $organisateurCount }}
                    </div>
                    <div
                        class="mt-2 flex items-center justify-center px-4 py-3 text-xl text-center text-white bg-purple-700 font-mono rounded-xl">
                        Le plus active :{{ $mostActiveOrganisateur }}
                    </div>
                </div>

                <div
                    class="items-center flex-1 order-1 w-full px-8 py-8 text-gray-400 bg-white shadow-2xl sm:py-16 rounded-3xl sm:w-96 lg:w-full lg:order-2 lg:mt-0">

                    <img src="{{ asset('photos/evenment.png') }}" class="object-cover w-32 h-32 mx-auto rounded-full"
                        alt="Avatar" />

                    <div class="py-8 text-center">
                        <h2 class="mb-4 text-2xl font-bold text-black font-mono ">Événements</h2>
                    </div>

                    <div
                        class="flex items-center justify-center px-4 py-4 text-2xl text-center text-white bg-purple-700 font-mono rounded-xl">
                        Totale : {{ $eventCount }}
                    </div>
                    <div
                        class="mt-2 flex items-center justify-center px-4 py-4 text-2xl text-center text-white bg-purple-700 font-mono rounded-xl">
                        Populaire : {{ $mostReservedEvent }}
                    </div>
                </div>

                <div
                    class="w-full flex-1 mt-8 p-8 order-3 bg-[#FEFEFF] opacity-80 shadow-xl rounded-3xl sm:w-96 lg:w-full lg:order-3 lg:rounded-l-none">
                    <img src="{{ asset('photos/utilisat.png') }}" class="object-cover w-32 h-32 mx-auto rounded-full"
                        alt="Avatar" />

                    <div class="py-8 text-center">
                        <h2 class="mb-4 text-2xl font-bold text-black font-mono ">Utilisateurs</h2>
                    </div>

                    <div
                        class="flex items-center justify-center px-4 py-3 text-xl text-center text-white bg-purple-700 font-mono rounded-xl">
                        Totale : {{ $utilisateurCount }}
                    </div>
                    <div
                        class="mt-2 flex items-center justify-center px-4 py-3 text-xl text-center text-white bg-purple-700 font-mono rounded-xl">
                        Le plus active :{{ $mostActiveClient }}
                    </div>
                </div>
            </div>
            </main>

        </div>
    </div>
@endsection
