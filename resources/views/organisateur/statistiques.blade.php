@extends('layouts.organis')
@section('home')
    <div class="h-full p-6"
        style="background:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('photos/event.jpg') }}') no-repeat center;background-size:cover">

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4">
            <div class="bg-slate-50 p-5 m-2 rounded-md flex justify-between items-center shadow">
                <div>
                    <h3 class="font-bold font-mono ">Total des événements</h3>
                    <p class="text-purple-700 font-bold font-mono text-xl">{{ $totalEvents }}</p>
                </div>
                <i class="fa-solid fa-users p-4 bg-purple-400 rounded-md"></i>
            </div>

            <div class="bg-slate-50 p-5 m-2 flex justify-between items-center shadow">
                <div>
                    <h3 class="font-bold font-mono">Les événements accepté </h3>
                    <p class="text-purple-700 font-bold font-mono text-xl">{{ $EventsAccepted }}</p>
                </div>
                <i class="fa-solid fa-users p-4 bg-green-400 rounded-md"></i>
            </div>

            <div class="bg-slate-50 p-5 m-2 flex justify-between items-center shadow">
                <div>
                    <h3 class="font-bold font-mono">Les événements en attente</h3>

                    <p class="text-purple-700 font-bold font-mono text-xl">{{ $EventsPending }}</p>
                </div>
                <i class="fa-solid fa-users p-4 bg-yellow-400 rounded-md"></i>
            </div>

            <div class="bg-slate-50 p-5 m-2 flex justify-between items-center shadow">
                <div>
                    <h3 class="font-bold font-mono">Les événements rejeté</h3>

                    <p class="text-purple-700 font-bold font-mono text-xl">{{ $EventsRejected }}</p>
                </div>
                <i class="fa-solid fa-users p-4 bg-red-400 rounded-md"></i>
            </div>
        </div>

        <div class="bg-white rounded-lg p-4 shadow-md my-4">
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-left border-b-2 w-full">
                            <h2 class="text-xl font-bold text-black font-mono ">Total Reservations :
                                <span
                                    class="text-xl font-mono font-bold text-purple-700">{{ $totalReservationsForEvents }}</span>
                            </h2>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($eventReservations as $eventReservation)
                        <tr class="border-b w-full">
                            <td class="px-4 py-2 text-left font-mono   ">
                                <div>
                                    <h2 class="font-mono text-black text-l font-bold">Evenement :</h2>
                                    <span
                                        class="font-mono text-purple-700 font-bold text-xl">{{ $eventReservation->titre }}</span>
                                </div>
                            </td>
                            <td class="px-4 py-2 font-mono  ">

                                <div class="flex ">
                                    <h2 class="font-mono text-black text-l font-bold">Nombre de réservations:</h2>
                                    <span
                                        class="font-mono text-purple-700 font-bold text-xl text-center">{{ $eventReservation->reservations_count }}</span>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    </div>
@endsection
