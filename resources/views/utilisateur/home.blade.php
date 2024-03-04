
@extends('layouts.utilisateur')
@section('home')

<div class="relative bg-blue-500 m-8 rounded-3xl">
    <header class="text-white">
        <div
            class="relative flex max-w-screen-xl flex-col overflow-hidden px-32 py-8 sm:mx-auto sm:flex-row sm:items-center">
            <a href="#" class="cursor-pointer whitespace-nowrap font-black flex items-start">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="fill-current text-red-900 w-10 h-10">
                    <path
                        d="M14 8.94737L22 14V16L14 13.4737V18.8333L17 20.5V22L12.5 21L8 22V20.5L11 18.8333V13.4737L3 16V14L11 8.94737V3.5C11 2.67157 11.6716 2 12.5 2C13.3284 2 14 2.67157 14 3.5V8.94737Z">
                    </path>
                </svg>
                <span class="font-semibold text-sm ml-1">Business <br> Flight <span
                        class="font-medium">Direct</span></span>
            </a>
            <input type="checkbox" class="peer hidden" id="navbar-open" />
            <label class="absolute top-5 right-7 cursor-pointer sm:hidden" for="navbar-open">
                <span class="sr-only">Toggle Navigation</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </label>
            <nav aria-label="Header Navigation"
                class="flex max-h-0 w-full flex-col items-center justify-between overflow-hidden transition-all peer-checked:mt-8 peer-checked:max-h-56 sm:ml-24 sm:max-h-full sm:flex-row sm:items-start">
                <ul class="flex flex-col items-center space-y-2 sm:ml-auto sm:flex-row sm:space-y-0">
                    <li class=" sm:mr-12"><a href="#">Business Class</a></li>
                    <li class="sm:mr-12"><a href="#">First Class</a></li>
                    <li class="sm:mr-12"><a href="#">Contact Us</a></li>
                    <li class="sm:mr-12"><a href="#">FAQ</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="mx-auto flex max-w-5xl flex-col px-4">
        <h1 class="mt-10 text-center md:text-start text-3xl font-bold text-white sm:mt-20 sm:text-5xl">Best Priced
            Business Class</h1>
        <p class="mt-3 sm:mt-4 text-center md:text-start text-white">
            Simple Booking. Easy Savings.
        </p>

        <form class="mt-10 mx-4">

            <div class="flex flex-col md:flex-row mx-auto space-y-2 md:space-y-0 max-w-lg md:max-w-full">
                <div class="relative w-full flex items-center">
                    <span class="p-2 bg-gray-50 md:rounded-l-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6">
                            <path
                                d="M21.949 10.112C22.1634 10.9122 21.6886 11.7347 20.8884 11.9491L5.2218 16.1469C4.77856 16.2657 4.31138 16.0676 4.08866 15.6664L1.46582 10.9417L2.91471 10.5535L5.3825 12.998L10.4778 11.6328L5.96728 4.55914L7.89913 4.0415L14.8505 10.4611L20.1119 9.05131C20.9121 8.8369 21.7346 9.31177 21.949 10.112ZM4.00013 19.0002H20.0001V21.0002H4.00013V19.0002Z">
                            </path>
                        </svg>
                    </span>
                    <input class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 outline-none"
                        placeholder="From" required>

                </div>
                <div class="relative w-full flex items-center">
                    <span class="p-2 bg-gray-50">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6">
                            <path
                                d="M20.949 14.8881C20.7346 15.6883 19.9121 16.1632 19.1119 15.9488L3.44528 11.751C3.00205 11.6322 2.69653 11.227 2.70424 10.7682L2.79514 5.36509L4.24403 5.75332L5.15891 9.10429L10.2542 10.4696L9.88479 2.08838L11.8166 2.60602L14.6269 11.6412L19.8883 13.051C20.6885 13.2654 21.1634 14.0879 20.949 14.8881ZM4.00008 18.9999H20.0001V20.9999H4.00008V18.9999Z">
                            </path>
                        </svg>
                    </span>
                    <input class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 outline-none"
                        placeholder="To" required>
                </div>
                <div class="relative w-full flex items-center">
                    <span class="p-2 bg-gray-50">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6">
                            <path
                                d="M17 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H7V1H9V3H15V1H17V3ZM4 9V19H20V9H4ZM6 13H11V17H6V13Z">
                            </path>
                        </svg>
                    </span>
                    <input class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 outline-none"
                        placeholder="Date of departure" required>
                </div>
                <div class="relative w-full flex items-center">
                    <span class="p-2 bg-gray-50">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6">
                            <path
                                d="M17 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H7V1H9V3H15V1H17V3ZM4 9V19H20V9H4ZM6 13H11V17H6V13Z">
                            </path>
                        </svg>
                    </span>
                    <input class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 outline-none"
                        placeholder="Return" required>
                </div>
                <button type="submit"
                    class="p-2.5 w-full justify-center flex items-center text-sm font-medium h-full text-white bg-red-500 md:rounded-r-lg border border-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300">
                    Search flights
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5 text-white ml-2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                    </svg>
                </button>
            </div>
        </form>
    </div>
    <div class="flex flex-col md:flex-row items-center justify-around rounded-b-3xl bg-yellow-400 py-6 mt-32">
        <div class="flex flex-col sm:flex-row items-center space-x-5">
            <span class="text-3xl font-bold flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-10 h-10 mr-2">
                    <path
                        d="M21 16.42V19.9561C21 20.4811 20.5941 20.9167 20.0705 20.9537C19.6331 20.9846 19.2763 21 19 21C10.1634 21 3 13.8366 3 5C3 4.72371 3.01545 4.36687 3.04635 3.9295C3.08337 3.40588 3.51894 3 4.04386 3H7.5801C7.83678 3 8.05176 3.19442 8.07753 3.4498C8.10067 3.67907 8.12218 3.86314 8.14207 4.00202C8.34435 5.41472 8.75753 6.75936 9.3487 8.00303C9.44359 8.20265 9.38171 8.44159 9.20185 8.57006L7.04355 10.1118C8.35752 13.1811 10.8189 15.6425 13.8882 16.9565L15.4271 14.8019C15.5572 14.6199 15.799 14.5573 16.001 14.6532C17.2446 15.2439 18.5891 15.6566 20.0016 15.8584C20.1396 15.8782 20.3225 15.8995 20.5502 15.9225C20.8056 15.9483 21 16.1633 21 16.42Z">
                    </path>
                </svg>
                08951238423842
            </span>
            <p class="text-sm font-medium mt-2 sm:mt-0"><span class="font-bold">Save 100% Off a Booking Right
                    Now!</span>.
                <br> Call in
                and spell out the code: WEB23</p>
        </div>
        <button type="button"
            class="mt-4 md:mt-0 text-white bg-[#050708] hover:bg-[#050708]/80 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:hover:bg-[#050708]/40 dark:focus:ring-gray-600">
            Call Me Back
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                class="w-5 h-5 ml-6 md:ml-2 xl:ml-10 -mr-1 text-white fill-current">
                <path
                    d="M21 16.42V19.9561C21 20.4811 20.5941 20.9167 20.0705 20.9537C19.6331 20.9846 19.2763 21 19 21C10.1634 21 3 13.8366 3 5C3 4.72371 3.01545 4.36687 3.04635 3.9295C3.08337 3.40588 3.51894 3 4.04386 3H7.5801C7.83678 3 8.05176 3.19442 8.07753 3.4498C8.10067 3.67907 8.12218 3.86314 8.14207 4.00202C8.34435 5.41472 8.75753 6.75936 9.3487 8.00303C9.44359 8.20265 9.38171 8.44159 9.20185 8.57006L7.04355 10.1118C8.35752 13.1811 10.8189 15.6425 13.8882 16.9565L15.4271 14.8019C15.5572 14.6199 15.799 14.5573 16.001 14.6532C17.2446 15.2439 18.5891 15.6566 20.0016 15.8584C20.1396 15.8782 20.3225 15.8995 20.5502 15.9225C20.8056 15.9483 21 16.1633 21 16.42Z">
                </path>
            </svg>
        </button>
    </div>
</div>  
@endsection
       
 