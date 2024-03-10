@extends('layouts.admin')
@section('home')
    <div class="p-4 sm:ml-64  h-screen overflow-y-scroll"
        style="background:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('photos/event.jpg') }}') no-repeat center;background-size:cover">




        {{-- ticket --}}

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
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-5 h-5 ml-2">
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
                                <a href="#" class="m-1 px-2 py-1 rounded bg-purple-700 text-white font-mono">Catégorie
                                    :
                                    {{ $evenement->categorie->name }}
                                </a>
                            </div>
                            <div class="text-end">


                                <form action="{{ route('deleteEvent', ['evenement' => $evenement->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">
                                        <img src="{{ asset('photos/supprimer.png') }}" class="h-10 w-10">
                                    </button>
                                </form>
                            </div>
                        </div>
                        <h2 class="text-xl font-medium text-black lg:text-xl font-mono ">Description : <br>
                            {{ $evenement->description }}</h2>



                        <div class="flex justify-center mt-8 sm:mt-auto">
                            <div class="flex flex-col space-x items-center mt-8">
                                <div>
                                    @if ($evenement->statut == 'Pending')
                                        <div class="flex gap-2">
                                            <form action="{{ route('updateStatus', $evenement->id) }}" method="post">
                                                @csrf
                                                @method('patch')
                                                <input type="hidden" name="statut" value="Accepted">
                                                <button type="submit"
                                                    class="rounded px-4 py-1 text-xs bg-green-500 text-green-100 hover:bg-green-600 duration-300">Accept</button>
                                            </form>

                                            <form action="{{ route('updateStatus', $evenement->id) }}" method="post">
                                                @csrf
                                                @method('patch')
                                                <input type="hidden" name="statut" value="Rejected">
                                                <button type="submit"
                                                    class="rounded px-4 py-1 text-xs bg-red-600 text-red-100 hover:bg-red-700 duration-300">Reject</button>
                                            </form>
                                        </div>
                                    @elseif($evenement->statut == 'Accepted')
                                        <span
                                            class="m-1 px-2 py-1 rounded bg-green-500  text-white font-mono">{{ $evenement->statut }}</span>
                                    @elseif($evenement->statut == 'Rejected')
                                        <span
                                            class="m-1 px-2 py-1 rounded bg-red-500  text-white font-mono">{{ $evenement->statut }}</span>
                                    @endif
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
        @endforeach

    </div>
    <div class="mt-8 flex justify-center bg-white font-mono">
        {{ $evenements->links('pagination::tailwind') }}
    </div>
    </div>
@endsection
