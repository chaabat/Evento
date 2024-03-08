 <nav class="relative px-4 py-4 flex justify-between items-center bg-white">
     <div class="flex flex-wrap items-center justify-between w-full p-4 mx-auto">
         <div class="flex items-center space-x-4">
             <a href="#" class="flex items-center">
                 <img src="https://www.svgrepo.com/show/499962/music.svg" class="h-6 mr-3 sm:h-9" alt="Landwind Logo">
                 <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Evento</span>
             </a>
             <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
                 <ul
                     class="hidden absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 lg:flex lg:mx-auto lg:flex lg:items-center lg:w-auto lg:space-x-6">
                     <li class="text-l text-black hover:text-purple-700 font-mono font-bold">
                         <a href="{{ route('organisateur') }}" aria-current="page">Home</a>
                     </li>
                     <li class="text-l text-black hover:text-purple-700 font-mono font-bold">
                         <a href="{{ route('reservation') }}">
                            Réservations</a>
                     </li>
                     <li class="text-l text-black hover:text-purple-700 font-mono font-bold">
                         <a href="{{ route('profile.edit') }}">Profile</a>
                     </li>

                 </ul>
             </div>

         </div>
         <div class="flex items-center">

             <div class="w-8 h-8 flex  overflow-hidden border-2 border-gray-400 rounded-full">
                 <img src="{{ asset('photos/calendrier.png') }}" class="object-cover w-full h-full" alt="avatar">
             </div>
             {{-- <h3>{{ Auth::user()->name }}</h3> --}}


             </button>
             <form method="POST" action="{{ route('logout') }}">
                 @csrf
                 <a href="{{ route('logout') }}"><button type="submit"
                         class="hidden mx-4 text-gray-600 transition-colors duration-300 transform lg:block dark:text-gray-200 hover:text-gray-700 dark:hover:text-gray-400 focus:text-gray-700 dark:focus:text-gray-400 focus:outline-none"
                         aria-label="show notifications">
                         <svg class="w-6 h-6 text-gray-500 hover:text-red-600 " aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                             <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M16 12H4m12 0-4 4m4-4-4-4m3-4h2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3h-2" />
                         </svg>
                     </button></a>
             </form>
         </div>
         <button data-collapse-toggle="navbar-cta" type="button" id="open-menu-button"
             class="inline-flex items-center justify-center w-10 h-10 p-2 text-sm text-white bg-purple-700 rounded-lg md:hidden   focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
             aria-controls="navbar-cta" aria-expanded="false">
             <span class="sr-only">Open main menu</span>
             <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 17 14">
                 <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                     d="M1 1h15M1 7h15M1 13h15" />
             </svg>
         </button>
     </div>

     </div>
 </nav>

 <div id="menu-container" class="hidden bg-white w-full h-screen fixed top-0 left-0 md:hidden">
     <div class="flex justify-end p-4">
         <button type="button" id="close-menu-button" class="text-gray-600 hover:text-gray-800 focus:outline-none">
             <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 24 24">
                 <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                     d="M6 18L18 6M6 6l12 12"></path>
             </svg>
         </button>
     </div>
     <ul class="flex flex-col p-4 mt-4 text-2xl font-extrabold divide-y divide-black md:p-0">
         <li class="text-l text-black hover:text-purple-700 font-mono font-bold">
             <a href="{{ route('organisateur') }}" class="text-l text-black hover:text-purple-700 font-mono font-bold"
                 aria-current="page">Home</a>
         </li>
         <li class="text-l text-black hover:text-purple-700 font-mono font-bold">
             <a href="{{ route('reservation') }}">
                Réservations</a>
         </li>
         <li class="text-l text-black hover:text-purple-700 font-mono font-bold">
             <a href="{{ route('profile.edit') }}">Profile</a>
         </li>
         <li class="text-2xl mt-12 text-black hover:text-red-700 font-mono font-bold">
             <form method="POST" action="{{ route('logout') }}">
                 @csrf
                 <a href="{{ route('logout') }}"><button type="submit">Logout</button></a>
             </form>
         </li>
     </ul>
 </div>

 </div>
 <hr class=" border-2 border-purple-700 ">

 <script>
     const openMenuButton = document.getElementById('open-menu-button');
     const closeMenuButton = document.getElementById('close-menu-button');
     const menuContainer = document.getElementById('menu-container');

     openMenuButton.addEventListener('click', function() {
         menuContainer.classList.remove('hidden');
     });

     closeMenuButton.addEventListener('click', function() {
         menuContainer.classList.add('hidden');
     });
 </script>
