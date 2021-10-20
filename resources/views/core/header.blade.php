<nav class="bg-gray-800">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <!-- Mobile menu button-->
                <button type="button"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex-shrink-0 flex items-center">
                    <img class="block h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-500.svg" alt="{{config('app.name')}}">
                    <h2 class="ml-3 block text-white text-2xl font-bold italic">{{config('app.name')}}</h2>
                </div>
                <div class="hidden sm:block sm:ml-6">
                    <div class="flex space-x-4">
                        <a href="{{route('home')}}" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium"
                            aria-current="page">Home</a>
                    </div>
                </div>
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                <div class="hidden sm:block">
                    <p class="text-gray-100">Hi, {{auth()->user()->name}}</p>
                </div>
                <a href="{{route('auth.logout')}}" class="bg-gray-800 ml-3 p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                    <span class="sr-only">Logout</span>
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.25 22.5009H1.50002V1.50096H11.25C11.664 1.50096 12 1.16493 12 0.750979C12 0.337025 11.6639 0.001 11.25 0.001H0.749979C0.336025 0.001 0 0.336963 0 0.750979V23.2509C0 23.6649 0.336025 24.0009 0.749979 24.0009H11.2499C11.6639 24.0009 11.9999 23.6648 11.9999 23.2509C12 22.8369 11.6639 22.5009 11.25 22.5009Z" fill="currentColor"/>
                        <path d="M23.7824 11.4765L18.6075 6.22726C18.3142 5.93101 17.8395 5.93176 17.5469 6.22726C17.2537 6.52276 17.2537 7.00274 17.5469 7.29824L21.447 11.2545H6.00227C5.58825 11.2545 5.25229 11.5935 5.25229 12.012C5.25229 12.4305 5.58831 12.7695 6.00227 12.7695H21.447L17.5469 16.7258C17.2537 17.022 17.2537 17.5013 17.5469 17.7968C17.8402 18.093 18.3149 18.093 18.6075 17.7968L23.7817 12.5475C24.0712 12.2558 24.0742 11.7675 23.7824 11.4765Z" fill="currentColor"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <div class="sm:hidden" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="{{route('home')}}" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium"
                aria-current="page">Home</a>

            {{-- <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Patients</a> --}}
        </div>
    </div>
</nav>