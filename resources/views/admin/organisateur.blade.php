@extends('layouts.admin')
@section('home')
    <div class="p-4 sm:ml-64  h-screen overflow-y-scroll"
        style="background:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('photos/event.jpg') }}') no-repeat center;background-size:cover">
        <div class="  rounded-lg mt-14">

            <p class="mt-[80px] text-center  text-2xl font-bold font-mono text-white sm:text-3xl"> la liste des
                Organisateurs
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
                                @forelse ($organisateurs as $organisateur)
                                    <tr class="text-gray-700">
                                        <td class="px-4 py-3 text-ms font-bold border">{{ $organisateur->id }}</td>
                                        <td class="px-4 py-3 border">
                                            <div class="flex items-center text-sm">

                                                <div>
                                                    <p class="px-4 py-3 text-ms font-bold ">{{ $organisateur->name }}</p>

                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 text-ms font-bold border">{{ $organisateur->email }}</td>
                                        <td class="px-4 py-3 text-ms font-bold border">{{ $organisateur->created_at }}</td>

                                        <td class="px-4 py-3 text-xs border">

                                            @if ($organisateur->trashed())
                                                <button
                                                    class="bg-green-600 text-white p-2 rounded-md mt-4 hover:bg-green-800 w-full"><a
                                                        href="{{ route('activateOrganisateur', ['id' => $organisateur->id]) }}">Debloquer
                                                    </a></button>
                                            @else
                                                <button
                                                    class="bg-red-600 text-white p-2 rounded-md mt-4 hover:bg-red-800 w-full"><a
                                                        href="{{ route('deleteOrganisateur', ['id' => $organisateur->id]) }}">Bloquer
                                                    </a></button>
                                            @endif

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-4">Il y'a aucun organisateurs</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-8 flex justify-center bg-white font-mono">
                        {{ $organisateurs->links('pagination::tailwind') }}
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
