<x-layouts.guest>
    <div class="relative h-screen overflow-hidden bg-indigo-900">
        <img src="https://www.tailwind-kit.com/images/landscape/5.svg" class="absolute object-cover w-full h-full" />
        <div class="absolute inset-0 bg-black opacity-25">
        </div>
        <header class="absolute top-0 left-0 right-0 z-20">
            <nav class="container px-6 py-4 mx-auto md:px-12">
                <div class="items-center justify-between md:flex">
                    <div class="flex items-center justify-between">
                        <a href="/" class="text-white uppercase font-bold">
                            {{ $meta['app_name'] ?? config('app.name') }}
                        </a>
                        <div class="md:hidden">
                            <button class="text-white focus:outline-none">
                                <svg class="w-12 h-12" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4 6H20M4 12H20M4 18H20" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    @if (Route::has('login'))
                        <div class="items-center hidden md:flex">
                            <a class="mx-3 text-lg text-white uppercase cursor-pointer hover:text-gray-300">
                                About us
                            </a>
                            <a class="mx-3 text-lg text-white uppercase cursor-pointer hover:text-gray-300">
                                Calendar
                            </a>
                            <a class="mx-3 text-lg text-white uppercase cursor-pointer hover:text-gray-300">
                                Contact us
                            </a>
                            @auth
                                <a href="{{ url('/dashboard') }}"
                                    class="mx-3 text-lg text-white uppercase cursor-pointer hover:text-gray-300">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ url('/login') }}"
                                    class="mx-3 text-lg text-white uppercase cursor-pointer hover:text-gray-300">
                                    Login
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ url('/register') }}"
                                        class="mx-3 text-lg text-white uppercase cursor-pointer hover:text-gray-300">
                                        Register
                                    </a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </nav>
        </header>
        <div class="container relative z-10 flex items-center px-6 py-32 mx-auto md:px-12 xl:py-40">
            <div class="relative z-10 flex flex-col items-start lg:w-3/5 xl:w-2/5">
                <span class="font-bold text-yellow-400 uppercase">
                    lorem ipsum
                </span>
                <h1 class="mt-4 text-6xl font-bold leading-tight text-white sm:text-7xl">
                    Let yourself be carried
                    <br />
                    by nature
                </h1>
                <a href="#"
                    class="block px-4 py-3 mt-10 text-lg font-bold text-gray-800 uppercase bg-white rounded-lg hover:bg-gray-100">
                    Start Now
                </a>
            </div>
        </div>
    </div>

</x-layouts.guest>
