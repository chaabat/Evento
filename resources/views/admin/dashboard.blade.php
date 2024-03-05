@extends('layouts.admin')
@section('home')
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
                            <a href="#" id="add-button"
                                class="bg-white text-purple-700 text-sm font-mono font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1  "
                                type="button">Ajouter</a>
                        </span>
                    </div>
                </div>
            </div>
            <div class="mx-auto max-w-screen-xl px-4 w-full mt-12 mb-12">
                <div class="grid w-full sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    {{-- @foreach ($categorie as $cate) --}}
                    <div
                        class="relative flex flex-col shadow-md rounded-xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 max-w-sm">
                        <div class="h-auto overflow-hidden">
                            <div class="h-44 overflow-hidden relative">
                                <img src="{{ asset('photos/titre.png') }}" class="h-44 w-full" alt="">
                            </div>
                        </div>
                        <div class="bg-white py-4 px-3">
                            <h1 class="text-3xl text-black text-center mb-2 font-bold font-mono">nom</h1>
                            <div class="flex justify-between">

                                <span data-modal-target="crud-modal-update" data-modal-toggle="crud-modal-update">
                                    <a href="#" class="text-blue-500 hover:text-blue-700 edit-category"><img
                                            src="{{ asset('photos/editer.png') }}" class="h-10 w-10"></a>
                                </span>


                                <form action="#" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="text-red-500 hover:text-red-700"><img
                                            src="{{ asset('photos/supprimer.png') }}" class="h-10 w-10"></button>
                                </form>
                            </div>
                        </div>
                    </div>

                    {{-- @endforeach --}}
                </div>
            </div>
        </div>
    </div>
@endsection
