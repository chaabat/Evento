@extends('layouts.organis')
@section('home')
    <div class="w-full min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0"
        style="background:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('photos/event.jpg') }}') no-repeat center;background-size:cover">


        <div class="w-full  px-4 mx-auto mb-[600px] ">

            <div class="rounded-full mb-0 px-4 py-3 border-4 border-purple-700 bg-white ">
                <div class="flex flex-wrap items-center text-white ">
                    <div class=" w-full px-4 max-w-full flex-grow flex-1">
                        <h3 class="font-bold text-base text-purple-700">Evenements</h3>
                    </div>
                    <div class=" w-full px-4 max-w-full flex-grow flex-1 text-right">
                        <span data-modal-target="crud-modal" data-modal-toggle="crud-modal">
                            <button id="add-button"
                                class="bg-purple-700 text-white text-sm font-mono font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1  "
                                type="button">Ajouter</button>
                        </span>
                    </div>
                </div>
            </div>


            @foreach ($evenements as $evenement)
                <div class="max-w-screen-lg mx-4 mt-24 overflow-hidden  shadow-lg rounded-xl sm:mx-auto">
                    <div
                        class="flex flex-col rounded-d  border-4 border-purple-700 overflow-hidden bg-white sm:flex-row md:h-80">


                        <div class="text-white p-8 sm:p-8 bg-[#2C2760] order-first ml-auto h-48 w-full sm:order-none sm:h-auto sm:w-1/2 lg:w-2/5 flex flex-col justify-between"
                            style="background:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset($evenement->picture) }}') no-repeat center;background-size:cover">
                            <div class="flex items-center mt-2">
                                <img class="w-10 h-10 object-cover rounded-full" alt="User avatar"
                                    src="{{ asset('images/users/' . $evenement->user->picture) }}" />
                                <div class="pl-2">
                                    <div class="font-medium font-mono text-white text-2xl">{{ $evenement->user->name }}
                                    </div>
                                    <div class="text-gray-600 text-xs font-mono text-white">confirmation
                                        :{{ $evenement->mode }}</div>
                                </div>
                            </div>
                            <div class="">
                                <small class="text-xl uppercase sm:text-xl font-mono text-white font-bold">Event
                                    :{{ $evenement->titre }}
                                </small>

                            </div>
                            <h2 class="flex items-center mt-8 text-sm text-gray-200 sm:mt-0 text-start">
                                {{ $evenement->date }}
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5 ml-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                </svg>

                            </h2>
                        </div>

                        <div class="flex w-full flex-col p-4 sm:w-1/2 sm:p-8 lg:w-3/5 text-[#2C2760] bg-white">

                            <div class="flex items-start justify-between mb-4">
                                <div class="text-sm font-medium uppercase sm:text-base"><a href="#"
                                        class="m-1 px-2 py-1 rounded bg-green-500">{{ $evenement->totalPlaces }}
                                        places</a>
                                </div>
                                <div class="text-sm font-medium uppercase sm:text-base">
                                    <a href="#"
                                        class="m-1 px-2 py-1 rounded bg-purple-700 text-white font-mono">Catégorie :
                                        {{ $evenement->categorie->name }}
                                    </a>
                                </div>
                                <div class="text-end">

                                    @if ($evenement->statut == 'Pending')
                                        <span
                                            class="m-1 px-2 py-1 rounded bg-orange-500  text-white font-mono">{{ $evenement->statut }}</span>
                                    @elseif($evenement->statut == 'Accepted')
                                        <span
                                            class="m-1 px-2 py-1 rounded bg-green-500 text-white font-mono">{{ $evenement->statut }}</span>
                                    @elseif($evenement->statut == 'Rejected')
                                        <span
                                            class="m-1 px-2 py-1 rounded bg-red-500 text-white font-mono">{{ $evenement->statut }}</span>
                                    @endif
                                </div>
                            </div>
                            <h2 class="text-xl font-medium text-black lg:text-xl font-mono ">Description : <br>
                                {{ $evenement->description }}</h2>



                            <div class="flex justify-center mt-8 sm:mt-auto">
                                <div class="flex space-x-4">
                                    <a href="#" class="editEventButton" data-modal-target="authentication-modal"
                                        data-modal-toggle="authentication-modal" data-event-id="{{ $evenement->id }}"
                                        data-event-categorie="{{ $evenement->categorie->id }}"
                                        data-event-titre="{{ $evenement->titre }}"
                                        data-event-description="{{ $evenement->description }}"
                                        data-event-lieu="{{ $evenement->lieu }}"
                                        data-event-places="{{ $evenement->totalPlaces }}"
                                        data-event-mode="{{ $evenement->mode }}" data-event-date="{{ $evenement->date }}"
                                        data-event-picture="{{ $evenement->picture }}"
                                        data-event-price="{{ $evenement->price }}">

                                        <img src="{{ asset('photos/editer.png') }}" class="h-10 w-10"> </a>

                                    <form action="{{ route('deleteEvenement', ['evenement' => $evenement->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">
                                            <img src="{{ asset('photos/supprimer.png') }}" class="h-10 w-10">
                                        </button>
                                    </form>
                                </div>
                            </div>

                        </div>

                    </div>
            @endforeach
            <div class="mt-8 flex justify-center bg-white font-mono">
                {{ $evenements->links('pagination::tailwind') }}
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

                    <form action="{{ route('addOrganisateur') }}" method="POST" enctype="multipart/form-data"
                        class="p-4 md:p-5">
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
                                <input type="text" name="titre"
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
                                <input name="date" type="datetime-local"
                                    min="{{ now()->timezone('Africa/Casablanca')->format('Y-m-d\TH:i') }}"
                                    max="{{ now()->timezone('Africa/Casablanca')->addMonth()->format('Y-m-d\TH:i') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            </div>
                            <div class="col-span-2">
                                <label for="lieu"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lieu</label>
                                <input type="text" name="lieu"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            </div>
                            <div class="col-span-2">
                                <label for="totalPlaces"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Places</label>

                                <input type="text" name="totalPlaces"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            </div>
                            <div class="col-span-2">
                                <label for="totalPlaces"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prix</label>

                                <input type="text" name="price"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            </div>
                            <div class="col-span-2">
                                <label for="mode"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mode</label>
                                <select name="mode"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-gray-100 border-gray-500 placeholder-gray-400 text-black focus:ring-primary-500 focus:border-primary-500">
                                    <option selected disabled="">choose mode of reservation</option>
                                    <option value="automatique">automatique</option>
                                    <option value="manuelle">manuelle</option>
                                </select>
                            </div>
                            <div class="col-span-2">
                                <label for="category"
                                    class="block mb-2 text-sm font-medium text-gray-900 text-black">Categorie</label>
                                <select name="categorie_id"
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

        {{-- Pop-up Modifier --}}

        <div id="authentication-modal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0  z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <div class="bg-purple-700 flex items-center justify-between p-4 md:p-5 border-b rounded-t  ">
                        <h3 class="text-lg  text-white  font-mono font-bold ">
                            Modifier un Evenement
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-toggle="authentication-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>

                    <form action="{{ route('updateEvenement') }}" method="POST" enctype="multipart/form-data"
                        class="p-4 md:p-5">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="event_id" id="event_id">

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
                                <textarea name="description" rows="3" id="description"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 bg-gray-100 border-gray-500 placeholder-gray-400 text-black focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Write Event description here"></textarea>
                            </div>
                            <div class="col-span-2">
                                <label for="date"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date</label>
                                <input name="date" id="date" type="datetime-local"
                                    min="{{ now()->timezone('Africa/Casablanca')->format('Y-m-d\TH:i') }}"
                                    max="{{ now()->timezone('Africa/Casablanca')->addMonth()->format('Y-m-d\TH:i') }}"
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
                                <label for="totalPlaces"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prix</label>

                                <input type="text" name="price" id="price"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            </div>
                            <div class="col-span-2">
                                <label for="mode"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mode</label>
                                <select id="mode" name="mode"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-gray-100 border-gray-500 placeholder-gray-400 text-black focus:ring-primary-500 focus:border-primary-500">
                                    <option selected disabled="">Choose mode of reservation</option>
                                    <option value="Automatique">Automatique</option>
                                    <option value="Manuelle">Manuelle</option>
                                </select>
                            </div>
                            <div class="col-span-2">
                                <label for="category"
                                    class="block mb-2 text-sm font-medium text-gray-900 text-black">Categorie</label>
                                <select id="categorie" name="categorie"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-gray-100 border-gray-500 placeholder-gray-400 text-black focus:ring-primary-500 focus:border-primary-500">
                                    <option selected disabled="">Select categorie</option>
                                    @foreach ($categories as $categorie)
                                        <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button type="submit" name="updateEvent"
                            class="bg-purple-700 text-white inline-flex items-center font-bold font-mono rounded-lg text-sm px-5 py-2.5 text-center  ">
                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Modifier Event
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editEventButtons = document.querySelectorAll('.editEventButton');
            const eventIdInput = document.getElementById('event_id');
            const titreInput = document.getElementById('titre');
            const descriptionInput = document.getElementById('description');
            const lieuInput = document.getElementById('lieu');
            const placesInput = document.getElementById('totalPlaces');
            const modeInput = document.getElementById('mode');
            const dateInput = document.getElementById('date');
            const categorieInput = document.getElementById('categorie');
            const prixInput = document.getElementById('price');
            const pictureInput = document.getElementById('picture');

            editEventButtons.forEach(function(button) {
                button.addEventListener('click', function(event) {
                    event.preventDefault();

                    const eventId = this.getAttribute('data-event-id');
                    const eventTitre = this.getAttribute('data-event-titre');
                    const eventDescription = this.getAttribute('data-event-description');
                    const eventLieu = this.getAttribute('data-event-lieu');
                    const eventPlaces = this.getAttribute('data-event-places');
                    const eventMode = this.getAttribute('data-event-mode');
                    const eventDate = this.getAttribute('data-event-date');
                    const eventCategorie = this.getAttribute('data-event-categorie');
                    const eventPrix = this.getAttribute('data-event-price');

                    eventIdInput.value = eventId;
                    titreInput.value = eventTitre;
                    descriptionInput.value = eventDescription;
                    lieuInput.value = eventLieu;
                    placesInput.value = eventPlaces;
                    modeInput.value = eventMode;

                    const formattedDate = new Date(eventDate).toISOString().slice(0, 16);
                    dateInput.value = formattedDate;
                    categorieInput.value = eventCategorie;
                    prixInput.value = eventPrix;

                    console.log(
                        eventMode, eventDate);
                    console.log(
                        modeInput.value, dateInput.value);
                });
            });
        });
    </script>
@endsection
