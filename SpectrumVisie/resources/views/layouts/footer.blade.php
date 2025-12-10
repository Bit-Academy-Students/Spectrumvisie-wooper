<footer class="bg-gray-900 text-white mt-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        <div class="flex justify-center mb-8">
            <a href="{{ url('/') }}" class="flex items-center">
                <img
                    src="{{ asset('images/JouwAutismeLogo.png') }}"
                    alt="Jouwautisme.nl"
                    class="h-12 w-auto">
            </a>
        </div>

        <div class="flex justify-center mb-8">
            <div class="flex flex-wrap items-center gap-8 text-sm">
                <a href="{{ url('/') }}"
                    class="text-gray-400 hover:text-white transition-colors">
                    Home
                </a>

                <a href="{{ url('/trainer') }}"
                    class="text-gray-400 hover:text-white transition-colors">
                    Trainer worden
                </a>

                <a href="{{ url('/about') }}"
                    class="text-gray-400 hover:text-white transition-colors">
                    Over ons
                </a>

                <a href="{{ url('/platform') }}"
                    class="text-gray-400 hover:text-white transition-colors">
                    Platform
                </a>
            </div>
        </div>

        <div class="border-t border-gray-800 pt-6 text-center text-xs text-gray-500">
            <p>&copy; {{ date('Y') }} JouwAutisme. Alle rechten voorbehouden.</p>
        </div>
    </div>
</footer>