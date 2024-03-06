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
                                class="bg-purple-700 text-white text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                role="button">
                                Ajouter
                            </button>


                        </span>
                    </div>
                </div>
            </div>


            <div
                class="p-2 reserve-wrapper grid grid-cols-1 gap-6 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1 w-full relative">
                <div class=" relative  py-6 px-6 rounded-3xl my-4 shadow-xl  "
                    style="background:linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 1)), url('{{ asset('photos/event.jpg') }}') no-repeat center;background-size:cover">

                    <div class=" text-white flex items-center justify-between left-4 -top-6">
                        <div class="flex items-center text-sm">
                            <div class="relative w-16 h-16 mr-3 rounded-full md:block">
                                <img src="" class="object-cover w-full h-full rounded-full " alt="">
                                <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                    <img src="">
                                </div>
                            </div>
                            <div>
                                <p class="font-bold font-mono text-xl text-white">name</p>
                                <p class="text-m font-mono text-white font-bold">

                                </p>
                            </div>
                        </div>

                        <div class="p-4 bg-white text-black rounded-lg font-bold">
                            <p>trff</p>
                        </div>
                    </div>

                    <div class="mt-8">
                        <div class="flex space-x-3 text-white text-xl font-bold">

                            <div class="flex-col justify-between items-center">
                                <h1 class="text-4xl">servn</h1>
                                <p>desvri</p>
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
        {{-- @endforeach --}}
    </div>




    </div>
@endsection
