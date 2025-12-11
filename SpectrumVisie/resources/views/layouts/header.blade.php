<header class="sticky top-0 z-50 bg-white border-b border-gray-200">
    <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-start flex-shrink-0">
                <a href="{{ url('/') }}" class="flex items-center">
                    <img src="{{ asset('images/JouwAutismeLogo.png') }}" alt="Jouwautisme.nl" class="h-10 w-auto">
                </a>
            </div>


            <div class="hidden md:flex flex-1 justify-center">
                <div class="flex items-center gap-8 text-sm">
                    <a href="{{ url('/') }}" class="text-gray-700 hover:text-blue-600 transition-colors">
                        Home
                    </a>

                    <a href="{{ url('/trainer') }}" class="text-gray-700 hover:text-blue-600 transition-colors">
                        Trainer worden
                    </a>

                    <a href="{{ url('/about') }}" class="text-gray-700 hover:text-blue-600 transition-colors">
                        Over ons
                    </a>

                    <a href="{{ url('/platform') }}" class="text-gray-700 hover:text-blue-600 transition-colors">
                        Platform
                    </a>

                    @if (Auth::user())
                        @if (Auth::user()->role_id == 1)
                            <a href="{{ url('/admin/dashboard') }}"
                                class="block px-2 py-1 text-gray-700 hover:text-blue-600">
                                Dashboard
                            </a>
                        @endif
                    @endif
                </div>
            </div>


            <div class="flex items-center gap-4">
                <div class="relative">
                    <button type="button"
                        class="inline-flex items-center justify-center rounded-full border border-gray-300 bg-white p-2 text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                        data-user-menu-toggle>
                        <span class="sr-only">Open gebruikersmenu</span>
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                d="M12 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                d="M6 20a6 6 0 1 1 12 0H6z" />
                        </svg>
                    </button>

                    <div class="hidden absolute right-0 mt-2 w-44 rounded-md bg-white shadow-lg ring-1 ring-black/5 py-1 text-sm"
                        data-user-menu>
                        @guest
                            <a href="{{ url('/login') }}" class="block px-3 py-2 text-gray-700 hover:bg-gray-100">
                                Inloggen
                            </a>
                            <a href="{{ url('/register') }}" class="block px-3 py-2 text-gray-700 hover:bg-gray-100">
                                Account aanmaken
                            </a>
                        @endguest

                        @auth
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left px-3 py-2 text-gray-700 hover:bg-gray-100">
                                    Uitloggen
                                </button>
                            </form>
                        @endauth
                    </div>
                </div>

                <button type="button"
                    class="md:hidden inline-flex items-center justify-center rounded-md p-2 text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                    data-mobile-menu-toggle>
                    <span class="sr-only">Open navigatie</span>
                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>


        <div class="md:hidden hidden border-t border-gray-200 py-4 space-y-2" data-mobile-menu>
            <a href="{{ url('/') }}" class="block px-2 py-1 text-gray-700 hover:text-blue-600">
                Home
            </a>

            <a href="{{ url('/trainer') }}" class="block px-2 py-1 text-gray-700 hover:text-blue-600">
                Trainer worden
            </a>

            <a href="{{ url('/about') }}" class="block px-2 py-1 text-gray-700 hover:text-blue-600">
                Over ons
            </a>

            <a href="{{ url('/platform') }}" class="block px-2 py-1 text-gray-700 hover:text-blue-600">
                Platform
            </a>




            <div class="border-t border-gray-200 pt-3 mt-2 px-2">
                <a href="{{ url('/login') }}" class="block py-1 text-gray-700 hover:text-blue-600">
                    Inloggen
                </a>
                <a href="{{ url('/register') }}" class="block py-1 text-gray-700 hover:text-blue-600">
                    Account aanmaken
                </a>
            </div>
        </div>
    </nav>
</header>
