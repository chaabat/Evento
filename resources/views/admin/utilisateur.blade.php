@extends('layouts.admin')
@section('home')
    <div class="p-4 sm:ml-64  h-screen overflow-y-scroll"
        style="background:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('photos/event.jpg') }}') no-repeat center;background-size:cover">
        <div class="  rounded-lg mt-14">
            <p class="mt-[80px] text-center  text-2xl font-bold font-mono text-white sm:text-3xl">la liste des
                Utilisateurs
            </p>

            <section class="container mx-auto p-6 font-mono flex justify-end">

                <div class="w-[90%] mb-8 overflow-hidden rounded-lg shadow-lg">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr
                                    class="text-md font-bold tracking-wide text-left text-white bg-purple-700 uppercase border-b border-gray-600">
                                    <th class="px-4 py-3">ID</th>
                                    <th class="px-4 py-3">Name</th>
                                    <th class="px-4 py-3">Email</th>
                                    <th class="px-4 py-3">Date de création</th>
                                    <th class="px-4 py-3">Delete</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                @forelse ($utilisateurs as $utilisateur)
                                    <tr class="text-gray-700">
                                        <td class="px-4 py-3 text-ms font-bold border">{{ $utilisateur->id }}</td>
                                        <td class="px-4 py-3 border">
                                            <div class="flex items-center text-sm">
                                                <div class="relative w-8 h-8 mr-3 rounded-full md:block">
                                                    <img class="object-cover w-full h-full rounded-full"
                                                        src="{{ asset($utilisateur->picture) }}" alt=""
                                                        loading="lazy" />

                                                </div>
                                                <div>
                                                    <p class="px-4 py-3 text-ms font-bold ">{{ $utilisateur->name }}</p>

                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 text-ms font-bold border">{{ $utilisateur->email }}</td>
                                        <td class="px-4 py-3 text-ms font-bold border">{{ $utilisateur->created_at }}</td>

                                        <td class="px-4 py-3 text-xs border">
                                            <form action="{{ route('deleteOrganisateur', ['id' => $utilisateur->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="bg-red-600 text-white p-2 rounded-md mt-4 hover:bg-red-800 w-full">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-4">Il y'a aucun utilisateurs </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="mt-8 flex justify-center">
                    {{ $utilisateurs->links('pagination::tailwind') }}
                </div>
            </section>
        </div>
    </div>
@endsection
