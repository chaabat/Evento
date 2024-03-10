 @extends('layouts.master')
 @section('registerUtilisateur')
     <div class="w-full min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0"
         style="background:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('photos/event.jpg') }}') no-repeat center;background-size:cover">
         <a href="#" class="flex items-center">
            <img src="https://www.svgrepo.com/show/499962/music.svg" class=" mr-3 sm:h-9" alt="Landwind Logo">
            <span class="self-center text-2xl font-bold font-mono  whitespace-nowrap text-white">Evento</span>
        </a>
         <div class="w-full sm:max-w-md p-5 mx-auto">
             <form method="POST" action="{{ route('register.utilisateur') }}" enctype="multipart/form-data">
                 @csrf
                 <div class="flex justify-center items-center mb-4 space-x-6">

                     <label class="block ">
                         <div class="shrink-0">
                             <img id='preview_img' class="h-20 w-20 object-cover rounded-full"
                                 src="{{ asset('photos/employes.png') }}" alt="Current profile photo" />
                         </div>
                         <span class="sr-only ">Choose profile photo</span>
                         <input name="picture" type="file" onchange="loadFile(event)"
                             class="block w-full text-sm text-slate-500
               file:mr-4 file:py-2 file:px-4
               file:rounded-full file:border-0
               file:text-sm file:font-semibold
               file:bg-violet-50 file:text-violet-700
               hover:file:bg-violet-100
               hidden
             " />
                     </label>
                 </div>
                 <div class="mb-4">
                     <label class="block mb-1 text-white font-mono font-bold" for="name">Name</label>
                     <input id="name" type="text" name="name"
                         class="py-2 px-3 border border-white focus:border-red-300 focus:outline-none focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm disabled:bg-gray-100 mt-1 block w-full"
                         value="{{ old('name') }}" required autofocus autocomplete="username" />
                     @error('name')
                         <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                     @enderror
                 </div>

                 <div class="mb-4">
                     <label class="block mb-1 text-white font-mono font-bold" for="email">Email-Address</label>
                     <input id="email" type="text" name="email"
                         class="py-2 px-3 border border-white focus:border-red-300 focus:outline-none focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm disabled:bg-gray-100 mt-1 block w-full"
                         value="{{ old('email') }}" required autofocus autocomplete="username" />
                     @error('email')
                         <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                     @enderror
                 </div>

                 <div class="mb-4">
                     <label class="block mb-1 text-white font-mono font-bold" for="password">Mot de passe</label>
                     <input id="password" type="password" name="password"
                         class="py-2 px-3 border border-bg-white focus:border-red-300 focus:outline-none focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm disabled:bg-gray-100 mt-1 block w-full"
                         required autocomplete="current-password" />
                     @error('password')
                         <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                     @enderror
                 </div>

                 <div class="mb-4">
                     <label class="block mb-1 text-white font-mono font-bold" for="password">confirmer le Mot de
                         passe</label>
                     <input id="password_confirmation" type="password" name="password_confirmation"
                         class="py-2 px-3 border border-bg-white focus:border-red-300 focus:outline-none focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm disabled:bg-gray-100 mt-1 block w-full"
                         required autocomplete="password_confirmation" />
                     @error('password_confirmation')
                         <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                     @enderror
                 </div>


                 <div class="mt-6">
                     <button type="submit"
                         class=" font-mono font-bold w-full inline-flex items-center justify-center px-4 py-2 bg-purple-700 border border-transparent rounded-md font-semibold capitalize text-white  focus:outline-none disabled:opacity-25 transition">Registre</button>
                 </div>
                 <div class="mt-6 text-center">
                     <a href="/" class="underline text-white font-mono font-bold">Retour a l'accueil</a>
                 </div>
             </form>
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
