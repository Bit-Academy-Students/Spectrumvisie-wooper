<!doctype html>
<html lang="nl">

<head>
    <meta charset="utf-8">
    <title>JouwAutisme – Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-background text-foreground flex flex-col">
    @include('layouts.header')

    <main class="flex-1">

        <section id="home" class="relative bg-gradient-to-br from-blue-50 via-purple-50 to-pink-50 overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24">
                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    <div class="space-y-6">
                        <div class="inline-block px-4 py-2 bg-blue-100 text-blue-700 rounded-full text-sm font-medium">
                            Welkom bij JouwAutisme
                        </div>

                        <h1 class="text-3xl sm:text-4xl lg:text-5xl xl:text-6xl font-semibold text-slate-900">
                            Begrijpen, ondersteunen en groeien met autisme
                        </h1>

                        <p class="text-gray-700 text-base sm:text-lg lg:text-xl max-w-xl">
                            Ontdek informatie, hulp en een gemeenschap voor mensen met autisme, hun families en
                            zorgverleners. Samen maken we het verschil.
                        </p>

                        <div class="flex flex-col sm:flex-row gap-4">
                            <a href="#materiaal"
                                class="inline-flex items-center justify-center px-6 py-3 rounded-md text-sm font-medium
                                      bg-blue-600 text-white hover:bg-blue-700 transition-colors">
                                Start hier
                                <span class="ml-2 text-lg">➜</span>
                            </a>

                            <a href="#over"
                                class="inline-flex items-center justify-center px-6 py-3 rounded-md text-sm font-medium
                                      border border-gray-300 text-gray-800 bg-white hover:bg-gray-50 transition-colors">
                                Meer informatie
                            </a>
                        </div>

                        <div class="flex flex-wrap gap-8 pt-4">
                            <div>
                                <div class="text-3xl font-semibold text-blue-600">10.000+</div>
                                <div class="text-gray-600 text-sm">Geholpen families</div>
                            </div>
                            <div>
                                <div class="text-3xl font-semibold text-purple-600">50+</div>
                                <div class="text-gray-600 text-sm">Professionals</div>
                            </div>
                            <div>
                                <div class="text-3xl font-semibold text-pink-600">24/7</div>
                                <div class="text-gray-600 text-sm">Ondersteuning</div>
                            </div>
                        </div>
                    </div>

                    <div class="relative">
                        <div class="aspect-square rounded-2xl overflow-hidden shadow-2xl bg-slate-200">
                            <img
                                src="https://jouwautisme.nl/wp-content/uploads/2025/03/Tieners-Bew-Iconen-vierkant-600x600.jpg"
                                alt="Community support"
                                class="w-full h-full object-cover">
                        </div>

                        <div class="pointer-events-none absolute -top-4 -right-4 w-24 h-24 bg-blue-200 rounded-full opacity-50 blur-2xl"></div>
                        <div class="pointer-events-none absolute -bottom-4 -left-4 w-32 h-32 bg-purple-200 rounded-full opacity-50 blur-2xl"></div>
                    </div>
                </div>
            </div>
        </section>

        <section id="materiaal" class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <article
                        class="border-none bg-white shadow-lg hover:shadow-xl transition-shadow duration-300 cursor-pointer group rounded-xl p-5">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                            <span class="text-blue-600 text-xl">📘</span>
                        </div>
                        <h3 class="text-base font-semibold mb-1">Informatie &amp; Educatie</h3>
                        <p class="text-sm text-gray-600">
                            Uitgebreide bronnen over autisme, kenmerken, diagnose en behandeling.
                        </p>
                    </article>

                    <article
                        class="border-none bg-white shadow-lg hover:shadow-xl transition-shadow duration-300 cursor-pointer group rounded-xl p-5">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                            <span class="text-purple-600 text-xl">👥</span>
                        </div>
                        <h3 class="text-base font-semibold mb-1">Gemeenschap</h3>
                        <p class="text-sm text-gray-600">
                            Verbind met anderen, deel ervaringen en vind steun in onze community.
                        </p>
                    </article>

                    <article
                        class="border-none bg-white shadow-lg hover:shadow-xl transition-shadow duration-300 cursor-pointer group rounded-xl p-5">
                        <div class="w-12 h-12 bg-pink-100 rounded-lg flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                            <span class="text-pink-600 text-xl">❤️</span>
                        </div>
                        <h3 class="text-base font-semibold mb-1">Professionele Hulp</h3>
                        <p class="text-sm text-gray-600">
                            Toegang tot gekwalificeerde therapeuten en begeleiders.
                        </p>
                    </article>

                    <article
                        class="border-none bg-white shadow-lg hover:shadow-xl transition-shadow duration-300 cursor-pointer group rounded-xl p-5">
                        <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                            <span class="text-orange-500 text-xl">💡</span>
                        </div>
                        <h3 class="text-base font-semibold mb-1">Praktische Tips</h3>
                        <p class="text-sm text-gray-600">
                            Dagelijkse strategieën en hulpmiddelen voor thuis, school en werk.
                        </p>
                    </article>
                </div>
            </div>
        </section>

        <section id="over" class="py-20 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    <div class="relative order-2 lg:order-1">
                        <div class="aspect-[4/3] rounded-2xl overflow-hidden shadow-xl bg-slate-200">
                            <img
                                src="https://images.unsplash.com/photo-1565373086464-c8af0d586c0c?auto=format&fit=crop&w=1200&q=80"
                                alt="Learning support"
                                class="w-full h-full object-cover">
                        </div>
                    </div>

                    <div class="space-y-6 order-1 lg:order-2">
                        <div class="inline-block px-4 py-2 bg-purple-100 text-purple-700 rounded-full text-sm font-medium">
                            Over ons
                        </div>

                        <h2 class="text-3xl lg:text-4xl font-semibold text-slate-900">
                            Wij kijken anders naar autisme
                        </h2>

                        <h3 class="text-lg font-semibold text-[#4bafe8]">
                            Jouw Autisme: de sleutel tot meer ondersteuning en begrip
                        </h3>

                        <p class="text-gray-700 text-base sm:text-lg">
                            Bij Jouw Autisme geloven we in een nieuwe manier van kijken naar autisme. Jongeren met
                            autisme verwerken informatie op hun eigen unieke manier en ervaren de wereld anders.
                            Onze missie is om hen te ondersteunen en sterk te maken zodat ze hun eigen weg vinden in
                            een wereld die niet altijd op hen is afgestemd.
                        </p>


                        <div class="space-y-3 text-sm sm:text-base">
                            @php
                            $features = [
                            'Evidence-based informatie en methoden',
                            'Persoonlijke begeleiding en ondersteuning',
                            'Toegang tot een netwerk van professionals',
                            'Hulpmiddelen voor het hele gezin',
                            'Regelmatige workshops en webinars',
                            ];
                            @endphp

                            @foreach($features as $feature)
                            <div class="flex items-center gap-3">
                                <div class="flex-shrink-0 w-6 h-6 bg-green-100 rounded-full flex items-center justify-center">
                                    <span class="text-green-600 text-xs">✔</span>
                                </div>
                                <span class="text-gray-700">{{ $feature }}</span>
                            </div>
                            @endforeach
                        </div>

                        <div class="pt-4">
                            <a href="{{ url('/over-ons') }}"
                                class="inline-flex items-center px-6 py-3 rounded-md text-sm font-medium
                                      bg-purple-600 text-white hover:bg-purple-700 transition-colors">
                                Lees meer over ons
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include('layouts.footer')
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const mobileToggles = document.querySelectorAll('[data-mobile-menu-toggle]');
            const mobileMenu = document.querySelector('[data-mobile-menu]');
            mobileToggles.forEach(btn => {
                btn.addEventListener('click', () => {
                    if (mobileMenu) {
                        mobileMenu.classList.toggle('hidden');
                    }
                });
            });

            const userToggle = document.querySelector('[data-user-menu-toggle]');
            const userMenu = document.querySelector('[data-user-menu]');
            if (userToggle && userMenu) {
                userToggle.addEventListener('click', () => {
                    userMenu.classList.toggle('hidden');
                });

                document.addEventListener('click', (e) => {
                    if (!userMenu.contains(e.target) && !userToggle.contains(e.target)) {
                        userMenu.classList.add('hidden');
                    }
                });
            }
        });
    </script>
</body>

</html>