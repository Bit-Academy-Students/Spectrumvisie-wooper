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

        <section id="home" class="relative bg-linear-to-br from-blue-50 via-purple-50 to-pink-50 overflow-hidden">
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
                            <a href="http://127.0.0.1:8000/trainer"
                                class="inline-flex items-center justify-center px-6 py-3 rounded-md text-sm font-medium
                                      bg-blue-600 text-white hover:bg-blue-700 transition-colors">
                                Start hier
                                <span class="ml-2 text-lg">➜</span>
                            </a>

                            <a href="http://127.0.0.1:8000/about"
                                class="inline-flex items-center justify-center px-6 py-3 rounded-md text-sm font-medium
                                      border border-gray-300 text-gray-800 bg-white hover:bg-gray-50 transition-colors">
                                Meer informatie
                            </a>
                        </div>

                        <div class="flex flex-wrap gap-8 pt-4">
                            <div>
                                <div class="text-3xl font-semibold text-blue-600">100+</div>
                                <div class="text-gray-600 text-sm">Verschillende materialen</div>
                            </div>
                            <div>
                                <div class="text-3xl font-semibold text-purple-600">10+</div>
                                <div class="text-gray-600 text-sm">Professionals</div>
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
                            Toegang tot gekwalificeerde trainers.
                        </p>
                    </article>

                    <article
                        class="border-none bg-white shadow-lg hover:shadow-xl transition-shadow duration-300 cursor-pointer group rounded-xl p-5">
                        <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                            <span class="text-orange-500 text-xl">💡</span>
                        </div>
                        <h3 class="text-base font-semibold mb-1">Praktische Tips</h3>
                        <p class="text-sm text-gray-600">
                            Strategieën en hulpmiddelen.
                        </p>
                    </article>
                </div>
            </div>


            <section id="over" class="py-20 bg-gray-50">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="grid lg:grid-cols-2 gap-12 items-center">
                        <div class="relative order-2 lg:order-1">
                            <div class="aspect-4/3 rounded-2xl overflow-hidden shadow-xl bg-slate-200">
                                <img src="/images/tieners.jpg" alt="Tieners">

                                alt="Learning support"
                                class="w-full h-full object-cover">
                            </div>
                        </div>

                        <div class="space-y-6 order-1 lg:order-2">


                            <h2 class="text-3xl lg:text-4xl font-semibold text-slate-900">
                                Wij kijken anders naar autisme
                            </h2>

                            <h3 class="text-lg font-semibold text-[#4bafe8]">
                                Jouw Autisme: de sleutel tot meer ondersteuning en begrip
                            </h3>

                            <p class="text-gray-700 text-base sm:text-lg">
                                Bij Jouw Autisme kijken we op een nieuwe, open manier naar autisme. Jongeren met autisme verwerken informatie op hun eigen manier en beleven de wereld vaak anders. Wij willen hen ondersteunen en versterken, zodat zij hun weg kunnen vinden in een omgeving die niet altijd vanzelf bij hen aansluit.
                            </p>

                            <div class="space-y-3 text-sm sm:text-base">
                                @php
                                $features = [
                                'Evidence-based informatie en methoden',
                                'Hulpmiddelen voor iedereen',
                                'Regelmatige workshops en webinars',
                                ];
                                @endphp

                                @foreach($features as $feature)
                                <div class="flex items-center gap-3">
                                    <div class="shrink-0 w-6 h-6 bg-green-100 rounded-full flex items-center justify-center">
                                        <span class="text-green-600 text-xs">✔</span>
                                    </div>
                                    <span class="text-gray-700">{{ $feature }}</span>
                                </div>
                                @endforeach
                            </div>

                            <div class="pt-4">
                                <a href="http://127.0.0.1:8000/about"
                                    class="inline-flex items-center px-6 py-3 rounded-md text-sm font-medium
                                      bg-blue-600 text-white hover:bg-blue-700 transition-colors">
                                    Lees meer over ons
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="py-20 bg-white">
                <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="space-y-6">



                        <h2 class="text-3xl lg:text-4xl">
                            Toegang tot professionele materialen
                        </h2>

                        <p class="text-gray-600 text-lg">
                            Bekijk en download trainingsmaterialen, handleidingen, video's en meer.
                            Alle content is zorgvuldig beheerd met rolgebaseerde toegangscontrole.
                        </p>

                        <div class="space-y-4">


                            <div class="flex items-start gap-3">
                                <div class="mt-1 p-2 bg-blue-100 rounded-lg">
                                    <svg class="h-5 w-5 text-blue-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">

                                    </svg>
                                </div>
                                <div>
                                    <div class="text-gray-900">PDFs & Documenten</div>
                                    <div class="text-gray-600">Download materialen voor offline gebruik</div>
                                </div>
                            </div>


                            <div class="flex items-start gap-3">
                                <div class="mt-1 p-2 bg-purple-100 rounded-lg">
                                    <svg class="h-5 w-5 text-purple-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-gray-900">Video's & YouTube</div>
                                    <div class="text-gray-600">Bekijk trainingsvideos en webinars</div>
                                </div>
                            </div>


                            <div class="flex items-start gap-3">
                                <div class="mt-1 p-2 bg-pink-100 rounded-lg">
                                    <svg class="h-5 w-5 text-pink-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-gray-900">Beveiligde Toegang</div>
                                    <div class="text-gray-600">Rolgebaseerde permissies voor elk materiaal</div>
                                </div>
                            </div>

                        </div>


                        <a href="http://127.0.0.1:8000/platform"
                            class="inline-flex items-center px-6 py-3 text-white text-lg rounded-lg bg-linear-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-700">




                            Bekijk Materialen

                            <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>

                    </div>
                </div>
            </section>

        </section>

        <section class="py-16 bg-blue-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-semibold text-slate-900 mb-8">Laatste posts</h2>

                <template id="news-template">
                    <article class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow border border-gray-100 flex flex-col justify-between h-full">
                        <div>
                            <span class="news-author text-xs font-semibold text-blue-600 uppercase tracking-wider mb-2 block"></span>
                            <h3 class="news-title font-semibold text-lg mb-3 text-slate-800 line-clamp-3"></h3>
                        </div>
                        <a href="#" target="_blank" rel="noopener noreferrer" class="news-link inline-flex items-center text-blue-600 hover:text-blue-800 text-sm font-medium mt-4">
                            Lees bericht op Reddit
                            <svg class="ml-1 h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                        </a>
                    </article>
                </template>

                <div id="news-container" class="grid md:grid-cols-3 gap-6">
                    <p id="load-status" class="col-span-3 text-center py-8 text-gray-500 ">post woren geladen</p>
                </div>
            </div>
        </section>

        @include('layouts.footer')
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', () => {

            const newsContainer = document.getElementById('news-container');
            const loadStatus = document.getElementById('load-status');
            const template = document.getElementById('news-template');


            const apiUrl = 'https://api.rss2json.com/v1/api.json?rss_url=https%3A%2F%2Fnews.google.com%2Frss%2Fsearch%3Fq%3Dautisme%26hl%3Dnl%26gl%3DNL%26ceid%3DNL%3Anl';

            fetch(apiUrl)
                .then(response => {
                    if (!response.ok) throw new Error('Netwerk response was niet ok');
                    return response.json();
                })
                .then(data => {
                    // Verwijder de "posts worden geladen" tekst
                    if (loadStatus) {
                        loadStatus.remove();
                    }

                    // Eerste 3 artikelen tonen
                    const articles = data.items.slice(0, 3);

                    articles.forEach(item => {
                        const clone = template.content.cloneNode(true);

                        // Format datum
                        const pubDate = new Date(item.pubDate).toLocaleDateString('nl-NL');
                        clone.querySelector('.news-author').textContent = `Nieuws • ${pubDate}`;

                        // Titel
                        clone.querySelector('.news-title').textContent = item.title;

                        // Link
                        const link = clone.querySelector('.news-link');
                        link.href = item.link;
                        link.innerHTML = `
                            Lees heel artikel
                            <svg class="ml-1 h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                        `;

                        // Voeg artikel toe
                        newsContainer.appendChild(clone);
                    });
                })
                .catch(error => {
                    console.error('Fout bij ophalen van het nieuws', error);
                    if (loadStatus) {
                        loadStatus.className = "col-span-3 bg-red-50 p-4 rounded-lg text-red-600 text-center";
                        loadStatus.textContent = "Nieuws kan niet worden geladen.";
                    }
                });
        });
    </script>
</body>

</html>