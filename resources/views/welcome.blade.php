<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Envento</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="">
    <script src="https://cdn.tailwindcss.com"></script>




</head>

<body class="antialiased">
    @include('incFiles.homeNav')




    <section class="">
        <div class="bg-white text-white py-20"
            style="background:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('photos/event.jpg') }}') no-repeat center;background-size:cover">
            <div class="container mx-auto flex flex-col md:flex-row items-center my-12 md:my-24">
                <div class="flex flex-col w-full lg:w-1/3 justify-center items-start p-8">
                    <h1 class="titre text-3xl md:text-5xl p-2 text-purple-700 tracking-loose font-mono">Evento</h1>

                    <p class="text-sm md:text-base text-white mb-4 font-mono">Explore your favourite events and
                        register now to showcase your talent and win exciting prizes.</p>

                </div>
                <div class="p-8 mt-12 mb-6 md:mb-0 md:mt-0 ml-0 md:ml-12 lg:w-2/3  justify-center">
                    <div class="h-48 flex flex-wrap content-center">
                        <div>

                            <video class="inline-block h-[500px] rounded border-4 border-white mt-22 hidden xl:block"
                                src="https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerJoyrides.mp4"
                                type="video/mp4" autoplay muted loop></video>
                        </div>

                    </div>
                </div>
    </section>

    <div id="crud-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">

            <div class="relative bg-purple-700 rounded-lg shadow dark:bg-gray-700">
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h2 class="font-semibold text-xl  text-white  font-bold font-mono">Enregistrer en tant que
                    </h2>

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
                <div class="flex flex-col items-center justify-center bg-white p-12">
                    <img src="{{ asset('photos/event.jpg') }}" class="h-[100px] " alt="">

                    <div class="mt-3 md:flex md:items-center md:-mx-2">
                        <a href="{{ route('register.organisateur') }}"
                            class="text-white bg-purple-700 hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-purple-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">
                            <div class="flex items-center">
                                <img src="{{ asset('photos/voyageur.png') }}" class="h-8 w-8" alt="">

                                <span class="mx-2">
                                    Organisateur
                                </span>
                            </div>
                        </a>
                        <a href="{{ route('register.utilisateur') }}"
                            class="text-white bg-purple-700 hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-purple-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">
                            <div class="flex items-center">
                                <img src="{{ asset('photos/taxi.png') }}" class="h-8 w-8" alt="">
                                <span class="mx-2">
                                    Utilisateur
                                </span>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>

    </div>
    @include('incFiles.homeFooter')


</body>

</html>
