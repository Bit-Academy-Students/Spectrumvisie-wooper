<footer id="contact" class="bg-gray-900 text-white mt-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">

            <div>
                <div class="flex items-center gap-2 mb-4">
                    <a href="{{ url('/') }}" class="flex items-center gap-2">
                        <img
                            src="{{ asset('images/JouwAutismeLogo.png') }}"
                            alt="Jouwautisme.nl"
                            class="h-10 w-auto"
                        >
                    </a>
                </div>

                <p class="text-gray-400 mb-4">
                    Samen maken we het verschil voor mensen met autisme en hun families.
                </p>

                <div class="flex gap-3">
                    <a href="#" class="h-9 w-9 flex items-center justify-center rounded-full border border-gray-700 text-gray-400 hover:text-white hover:bg-gray-800 transition">
                        f
                    </a>
                    <a href="#" class="h-9 w-9 flex items-center justify-center rounded-full border border-gray-700 text-gray-400 hover:text-white hover:bg-gray-800 transition">
                        X
                    </a>
                    <a href="#" class="h-9 w-9 flex items-center justify-center rounded-full border border-gray-700 text-gray-400 hover:text-white hover:bg-gray-800 transition">
                        IG
                    </a>
                    <a href="#" class="h-9 w-9 flex items-center justify-center rounded-full border border-gray-700 text-gray-400 hover:text-white hover:bg-gray-800 transition">
                        in
                    </a>
                </div>
            </div>

            <div>
                <h3 class="mb-4 font-semibold">Snelle links</h3>
                <ul class="space-y-2 text-sm">
                    <li>
                        <a href="#over-ons" class="text-gray-400 hover:text-white transition-colors">
                            Over ons
                        </a>
                    </li>
                    <li>
                        <a href="#hulpbronnen" class="text-gray-400 hover:text-white transition-colors">
                            Hulpbronnen
                        </a>
                    </li>
                    <li>
                        <a href="#verhalen" class="text-gray-400 hover:text-white transition-colors">
                            Verhalen
                        </a>
                    </li>
                    <li>
                        <a href="#contact" class="text-gray-400 hover:text-white transition-colors">
                            Contact
                        </a>
                    </li>
                </ul>
            </div>

            <div>
                <h3 class="mb-4 font-semibold">Ondersteuning</h3>
                <ul class="space-y-2 text-sm">
                    <li>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            Veelgestelde vragen
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            Helpdesk
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            Privacyverklaring
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            Algemene voorwaarden
                        </a>
                    </li>
                </ul>
            </div>

            <div>
                <h3 class="mb-4 font-semibold">Nieuwsbrief</h3>
                <p class="text-gray-400 mb-4 text-sm">
                    Ontvang de laatste updates en tips direct in je inbox.
                </p>

                <form action="#" method="post" class="flex gap-2">
                    <input
                        type="email"
                        name="email"
                        placeholder="Je e-mail"
                        class="w-full rounded-md border border-gray-700 bg-gray-800 px-3 py-2 text-sm text-white placeholder:text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                    <button
                        type="submit"
                        class="inline-flex items-center justify-center rounded-md bg-blue-600 px-3 py-2 text-sm font-medium hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                        ✉
                    </button>
                </form>
            </div>
        </div>

        <div class="border-t border-gray-800 pt-6 text-center text-xs text-gray-500">
            <p>&copy; {{ date('Y') }} JouwAutisme. Alle rechten voorbehouden.</p>
        </div>
    </div>
</footer>
