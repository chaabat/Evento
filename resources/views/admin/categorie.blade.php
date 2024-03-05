@extends('layouts.admin')
@section('categorie')
    <div class="p-4 sm:ml-64  h-screen overflow-y-scroll"
        style="background:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('photos/event.jpg') }}') no-repeat center;background-size:cover">
        <div class="  rounded-lg mt-14">
            <div class="rounded-t mb-0 px-4 py-3 border-0 bg-purple-700 ">
                <div class="flex flex-wrap items-center text-white ">
                    <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                        <h3 class="font-bold font-mono text-xl text-white">Categories</h3>
                    </div>
                    <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                        <span data-modal-target="crud-modal" data-modal-toggle="crud-modal">
                            <button id="add-button"
                                class="bg-white text-purple-700 text-sm font-mono font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1  "
                                type="button">Ajouter</button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="mx-auto max-w-screen-xl px-4 w-full mt-12 mb-12">
                <div class="grid w-full sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach ($categories as $categorie)
                    <div
                        class="relative flex flex-col shadow-md rounded-xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 max-w-sm">
                        <div class="h-auto overflow-hidden">
                            <div class="h-44 overflow-hidden relative">
                                <img src="{{ asset($categorie->picture) }}" class="h-44 w-full" alt="">
                            </div>
                        </div>
                        <div class="bg-white py-4 px-3">
                            <h1 class="text-3xl text-black text-center mb-2 font-bold font-mono">{{$categorie->name}}</h1>
                            <div class="flex justify-between">

                                <span data-modal-target="crud-modal-update" data-modal-toggle="crud-modal-update">
                                    <a href="#" class="text-blue-500 hover:text-blue-700 edit-category"><img
                                            src="{{ asset('photos/editer.png') }}" class="h-10 w-10"></a>
                                </span>


                                <form action="{{ route('deleteCategorie', ['categorie' => $categorie->id]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="text-red-500 hover:text-red-700"><img
                                            src="{{asset('photos/supprimer.png') }}" class="h-10 w-10"></button>
                                </form>
                            </div>
                        </div>
                    </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- Pop-up Ajouter --}}
    <div id="crud-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">

            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="bg-purple-700 flex items-center justify-between p-4 md:p-5 border-b rounded-t  ">
                    <h3 class="text-lg  text-white  font-mono font-bold ">
                        Ajouter une Categorie
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

                <form action="{{route('addCategorie')}}" method="POST" enctype="multipart/form-data" class="p-4 md:p-5">
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
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom</label>
                            <input type="text" name="name" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        </div>
                    </div>
                    <input type="submit" value="Ajouter"
                        class="bg-purple-700 text-white inline-flex items-center font-bold font-mono rounded-lg text-sm px-5 py-2.5 text-center  ">


                </form>
            </div>
        </div>
    </div>
    <script>
        var loadFile = function(event) {

            var input = event.target;
            var file = input.files[0];
            var type = file.type;

            var output = document.getElementById('preview_img');


            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
@endsection
