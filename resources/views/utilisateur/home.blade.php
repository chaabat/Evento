@extends('layouts.utilisateur')
@section('home')
    <div style="background:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('photos/event.jpg') }}') no-repeat center;background-size:cover"
        class="py-52 px-1 md:px-8 text-center  text-white font-bold text-2xl md:text-3xl overflow-auto font-mono ">
        <h1 class="text-center md:text-start text-3xl font-bold text-white sm:mt-20 sm:text-5xl">Best Priced</h1>
        <p class="mt-3 sm:mt-4 text-center md:text-start text-white font-mono">
            Simple Booking. Easy Savings.
        </p>

        <form class="mt-10 mx-4">

            <div class="flex flex-col md:flex-row mx-auto space-y-2 md:space-y-0 max-w-lg md:max-w-full">
                <div class=" w-full flex items-center">
                    <span class="p-2 bg-gray-50 md:rounded-l-lg">
                        <img src="{{ asset('photos/titre.png') }}" class="h-6" alt="">
                    </span>
                    <input class="block p-2.5 w-full  text-sm text-gray-900 bg-gray-50 outline-none" placeholder="Titre"
                        required>

                </div>
                <div class=" w-full flex items-center">
                    <span class="p-2 bg-gray-50">
                        <img src="{{ asset('photos/categorie.png') }}" class="h-6" alt="">

                    </span>
                    <input class="block p-2.5 w-full  text-sm text-gray-900 bg-gray-50 outline-none" placeholder="Categorie"
                        required>
                </div>
                <div class=" w-full flex items-center">
                    <span class="p-2 bg-gray-50">
                        <img src="{{ asset('photos/date.png') }}" class="h-6" alt="">

                    </span>
                    <input class="block p-2.5 w-full  text-sm text-gray-900 bg-gray-50 outline-none"
                        placeholder="Date d'evenment" required>
                </div>

                <button type="submit"
                    class="p-2.5 w-full justify-center flex items-center text-sm font-medium h-full text-white bg-purple-700 md:rounded-r-lg  hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-red-300">
                    Trouvez Votre Réservations
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5 text-white ml-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                    </svg>
                </button>
            </div>
        </form>
    </div>
    </div>
    
@endsection
