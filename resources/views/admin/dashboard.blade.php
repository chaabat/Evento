@extends('layouts.admin')
@section('home')
    <div class="p-4 sm:ml-64  h-screen overflow-y-scroll"
        style="background:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('photos/event.jpg') }}') no-repeat center;background-size:cover">
        <div class="  rounded-lg mt-14">


            <div class="mb-16 ">
                <p class=" text-center  text-2xl font-bold font-mono text-white sm:text-3xl">Voila votre statistiques !
                </p>
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
                        {{ $organisateurCount }}
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
                        {{ $eventCount }}
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
                        {{ $utilisateurCount }}
                    </div>
                </div>
            </div>
            </main>

        </div>
    </div>
@endsection
