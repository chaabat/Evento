@extends('layouts.organis')
@section('home')
    <div class="w-full min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0"
        style="background:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('photos/event.jpg') }}') no-repeat center;background-size:cover">


        <div class="w-full  px-4 mx-auto mb-[600px] ">
            <div class="rounded-full mb-0 px-4 py-3 border-4 border-purple-700 bg-white ">
                <div class="flex flex-wrap items-center text-white ">
                    <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                        <h3 class="font-bold text-base text-purple-700">Evenements</h3>
                    </div>
                    <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                        <span data-modal-target="crud-modal" data-modal-toggle="crud-modal">
                            <button id="add-button"
                                class="bg-purple-700 text-white text-sm font-mono font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1  "
                                type="button">Ajouter</button>
                        </span>
                    </div>
                </div>
            </div>


            <div
                class="p-2 reserve-wrapper grid grid-cols-1 gap-6 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1 w-full relative">
                <div class=" relative  py-6 px-6 rounded-3xl my-4 shadow-xl  "
                    style="background:linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 1)), url('{{ asset('photos/event.jpg') }}') no-repeat center;background-size:cover">
                    @foreach ($evenements as $evenement)
                        <div class=" text-white flex items-center justify-between left-4 -top-6">
                            <div class="flex items-center text-sm">
                                <div class="relative w-16 h-16 mr-3 rounded-full md:block">
                                    <img src="" class="object-cover w-full h-full rounded-full " alt="">
                                    <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                        <img src="">
                                    </div>
                                </div>
                                <div>
                                    <p class="font-bold font-mono text-xl text-white">{{ $evenement->user->name }}</p>
                                    <p class="font-bold font-mono text-xl text-white">{{ $evenement->mode }}</p>
                                    <p class="text-m font-mono text-white font-bold">{{ $evenement->categorie->name }}</p>
                                    <p class="text-m font-mono text-white font-bold">{{ $evenement->lieu }}</p>
                                    <p class="text-m font-mono text-white font-bold">{{ $evenement->totalPlaces }}</p>
                                    <p class="text-m font-mono text-white font-bold">{{ $evenement->date }}</p>
                                </div>
                            </div>


                            <div class="p-4 bg-white text-black rounded-lg font-bold">
                                @if ($evenement->statut == 'Pending')
                                    <span
                                        class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-yellow-300 border border-yellow-300">
                                        {{ $evenement->statut }}</span>
                                @elseif($evenement->statut == 'Accepted')
                                    <span
                                        class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-green-400 border border-green-400">{{ $evenement->statut }}</span>
                                @endif
                            </div>

                        </div>

                        <div class="mt-8">
                            <div class="flex space-x-3 text-white text-xl font-bold">

                                <div class="flex-col justify-between items-center">
                                    <h1 class="text-4xl">{{ $evenement->titre }}</h1>
                                    <p>{{ $evenement->description }}</p>
                                </div>
                            </div>
                            <div class="flex space-x-3 text-white font-bold text-xl my-3">
                            </div>
                            <div class="flex justify-between">
                                <div class="my-2">
                                    <button type="button"
                                        class="reserve-button text-[#023e8a] bg-white focus:ring-4 focus:outline-none focus:ring-blue-400 /50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-blue-400 /50 dark:hover:bg-blue-400 /30 me-2 mb-2">
                                        <img src="{{ asset('pictures/reservation.png') }}" class="h-6 w-6" alt="">

                                        Réserver
                                        </a>
                                </div>

                                <div class="my-2">
                                    <a href=" "
                                        class="text-[#023e8a] bg-white focus:ring-4 focus:outline-none focus:ring-blue-400 /50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-blue-400 /50 dark:hover:bg-blue-400 /30 me-2 mb-2">
                                        <img src="{{ asset('pictures/conversation.png') }}" class="h-6 w-6" alt="">
                                        Envoyer un message
                                    </a>

                                </div>
                            </div>

                        </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    </div>

    {{-- Ajouter Pop-up --}}
    <div id="crud-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0  z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">

            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="bg-purple-700 flex items-center justify-between p-4 md:p-5 border-b rounded-t  ">
                    <h3 class="text-lg  text-white  font-mono font-bold ">
                        Ajouter un événements
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                <form action="{{route('addOrganisateur')}}" method="POST" enctype="multipart/form-data" class="p-4 md:p-5">
                    @csrf
                    @method('post')

                    <div class="grid gap-4 mb-4 grid-cols-2 ">
                        <div class="col-span-2">
                            <label class="block ">
                                <div class="flex flex-auto max-h-48 w-2/5 mx-auto mt-4">
                                    <img id='preview_img' class="has-mask h-36 object-center rounded-full"
                                        src="{{ asset('photos/calendrier.png') }}" alt="Current profile photo">
                                    <input id="picture" name="picture" type="file" class="hidden"
                                        onchange="loadFile(event)">
                                </div>
                            </label>

                        </div>
                        <div class="col-span-2">
                            <label for="Titre"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titre</label>
                            <input type="text" name="titre" id="titre"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        </div>
                        <div class="col-span-2">
                            <label for="description"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                            <textarea name="description" rows="3"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 bg-gray-100 border-gray-500 placeholder-gray-400 text-black focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Write Event description here"></textarea>
                        </div>
                        <div class="col-span-2">
                            <label for="date"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date</label>
                            <input type="date" name="date" id="date"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        </div>
                        <div class="col-span-2">
                            <label for="lieu"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lieu</label>
                            <input type="text" name="lieu" id="lieu"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        </div>
                        <div class="col-span-2">
                            <label for="totalPlaces"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Places</label>

                            <input type="text" name="totalPlaces" id="totalPlaces"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        </div>
                        <div class="col-span-2">
                            <label for="mode"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mode</label>
                            <select id="mode" name="mode"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-gray-100 border-gray-500 placeholder-gray-400 text-black focus:ring-primary-500 focus:border-primary-500">
                                <option selected disabled="">choose mode of reservation</option>
                                <option value="automatique">automatique</option>
                                <option value="manuelle">manuelle</option>
                            </select>
                        </div>
                        <div class="col-span-2">
                            <label for="category"
                                class="block mb-2 text-sm font-medium text-gray-900 text-black">Categorie</label>
                            <select id="category" name="categorie_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-gray-100 border-gray-500 placeholder-gray-400 text-black focus:ring-primary-500 focus:border-primary-500">
                                <option selected disabled="">Select categorie</option>
                                @foreach ($categories as $categorie)
                                    <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit" name="addEvent"
                    class="bg-purple-700 text-white inline-flex items-center font-bold font-mono rounded-lg text-sm px-5 py-2.5 text-center  ">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Add new Event
                </button>
                    @if ($errors->has('name') || $errors->has('picture'))
                        <div>{{ $errors->first() }}</div>
                        <script>
                            document.getElementById('crud-modal').classList.toggle('hidden');
                        </script>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection
