<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Trainer Worden</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-background text-foreground flex flex-col">
    @include('layouts.header')


    <section class="  bg-blue-600 text-white py-20 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-4xl md:text-5xl mb-6">Word Autisme Trainer</h2>
            <p class="text-xl md:text-2xl mb-8 text-blue-100">
                Word gecertificeerd Jouw Autisme Trainer!
            </p>
            <a href="https://jouwautisme.nl/bestel-de-jouw-autisme-methodiek/" target="_blank"
                class="bg-white text-blue-600 hover:bg-gray-100 inline-flex items-center text-lg px-8 py-4 rounded-lg">
                Schrijf je nu in
            </a>
        </div>
    </section>


    <section class="py-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto text-center mb-12">
            <h2 class="text-3xl mb-4">Waarom Autisme Trainer Worden?</h2>
            <p class="text-xl text-gray-600">
                Als autisme trainer help je mensen met autisme en hun omgeving om beter te begrijpen
                hoe autisme werkt en hoe zij hier op een positieve manier mee om kunnen gaan.
            </p>
        </div>

        <div class="max-w-4xl mx-auto grid md:grid-cols-3 gap-8">

            <div class="border rounded-xl p-6 text-center shadow-sm hover:shadow-md transition">
                <div class="mx-auto bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mb-4 text-blue-600 text-3xl">
                    ★
                </div>
                <h3 class="font-semibold text-lg">Kennis</h3>
                <p class="text-gray-600 mt-2">
                    Kennis over hoe mensen binnen het spectrum denken en communiceren. Zo kun je effectiever, begripvoller en professioneler ondersteunen.
                </p>
            </div>

            <div class="border rounded-xl p-6 text-center shadow-sm hover:shadow-md transition">
                <div class="mx-auto bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mb-4 text-blue-600 text-3xl">
                    👥
                </div>
                <h3 class="font-semibold text-lg">Expert Begeleiding</h3>
                <p class="text-gray-600 mt-2">
                    Word begeleid door ervaren professionals in het autisme vakgebied.
                </p>
            </div>

            <div class="border rounded-xl p-6 text-center shadow-sm hover:shadow-md transition">
                <div class="mx-auto bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mb-4 text-blue-600 text-3xl">
                    📘
                </div>
                <h3 class="font-semibold text-lg">Uitgebreid Lesprogramma</h3>
                <p class="text-gray-600 mt-2">
                    Toegang tot alle trainingsmaterialen en exclusieve content.
                </p>
            </div>

        </div>
    </section>

    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-gray-50 to-blue-50">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl mb-6">Hoe Leer Je?</h2>
                <p class="text-xl text-gray-600">Diverse lesmethoden voor een optimale leerervaring</p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">


                <div class="bg-white border rounded-xl p-6 text-center hover:shadow-lg transition-shadow">
                    <div class="bg-blue-100 w-14 h-14 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-blue-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M15 10l4.553-2.276A1 1 0 0 1 21 8.618v6.764a1 1 0 0 1-1.447.894L15 14" stroke-linecap="round" stroke-linejoin="round" />
                            <rect x="2" y="6" width="11" height="12" rx="2" ry="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <h3 class="text-lg mb-2 font-semibold">Video Lessen</h3>
                    <p class="text-sm text-gray-600">Hoogwaardige video content /p>
                </div>


                <div class="bg-white border rounded-xl p-6 text-center hover:shadow-lg transition-shadow">
                    <div class="bg-blue-100 w-14 h-14 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-blue-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M14 2v6h6" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M8 13h8M8 17h8" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <h3 class="text-lg mb-2 font-semibold">Studiemateriaal</h3>
                    <p class="text-sm text-gray-600">Uitgebreide readers en werkboeken</p>
                </div>


                <div class="bg-white border rounded-xl p-6 text-center hover:shadow-lg transition-shadow">
                    <div class="bg-blue-100 w-14 h-14 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-blue-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M17 21v-2a4 4 0 0 0-3-3.87" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M7 21v-2a4 4 0 0 1 3-3.87" stroke-linecap="round" stroke-linejoin="round" />
                            <circle cx="12" cy="7" r="4" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <h3 class="text-lg mb-2 font-semibold">Live Sessies</h3>
                    <p class="text-sm text-gray-600">Interactieve groepslessen en workshops</p>
                </div>


                <div class="bg-white border rounded-xl p-6 text-center hover:shadow-lg transition-shadow">
                    <div class="bg-blue-100 w-14 h-14 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-blue-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M7 10l5 5 5-5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M12 15V3" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <h3 class="text-lg mb-2 font-semibold">Downloads</h3>
                    <p class="text-sm text-gray-600">Alle materialen voor offline gebruik</p>
                </div>

            </div>
        </div>
    </section>


    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-blue-600 text-white">
        <div class="max-w-3xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl mb-4">Klaar om te Beginnen?</h2>
            <p class="text-xl mb-8 text-blue-100">
                Schrijf je vandaag nog in en kom alles te weten over psycho-educatie.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="https://jouwautisme.nl/bestel-de-jouw-autisme-methodiek/" target="_blank"
                    class="bg-white text-blue-600 hover:bg-gray-100 text-lg px-8 py-4 rounded-lg inline-block">
                    Schrijf je in
                </a>
                <a href="https://jouwautisme.nl/" target="_blank"
                    class="border-2 border-white text-white hover:bg-white hover:text-blue-600 text-lg px-8 py-4 rounded-lg inline-block">
                    Meer informatie
                </a>
            </div>
        </div>
    </section>


    <footer class="w-full py-6 bg-gray-100">

        </div>
    </footer>

</body>

</html>