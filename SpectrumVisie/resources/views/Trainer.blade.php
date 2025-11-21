<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Word Autisme Trainer</title>
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
                Sluit je aan bij ons team van gecertificeerde ‘Jouw Autisme’ trainers. Bestel nu de Jouw Autisme Methodiek en ontvang de juiste training en tools om zelf doeltreffende psycho-educatie te geven aan jongeren met autisme. Door meer kennis en het sterk maken van jongeren met autisme voorkomen we uitval!
            </p>
        </div>

        <div class="max-w-4xl mx-auto grid md:grid-cols-3 gap-8">

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


    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-gray-50">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-3xl mb-8 text-center">Wat Leer Je?</h2>

            <div class="grid md:grid-cols-2 gap-6">

                <div class="border rounded-xl p-6 bg-white">
                    <h3 class="text-xl font-semibold mb-3">Theoretische Kennis</h3>
                    <p class="text-gray-600 mb-3">
                        Diepgaande kennis over autisme spectrum stoornissen, diagnostiek en de nieuwste inzichten.
                    </p>
                    <ul class="space-y-2 text-gray-700">
                        <li>• Autisme Spectrum Stoornissen (ASS)</li>
                        <li>• Neurodiversiteit en inclusie</li>
                        <li>• Communicatie en gedrag</li>
                    </ul>
                </div>

                <div class="border rounded-xl p-6 bg-white">
                    <h3 class="text-xl font-semibold mb-3">Praktische Vaardigheden</h3>
                    <p class="text-gray-600 mb-3">
                        Hands-on training in begeleiding, coaching en psycho-educatie.
                    </p>
                    <ul class="space-y-2 text-gray-700">
                        <li>• Trainingen en groepen begeleiden</li>
                        <li>• Individuele coaching technieken</li>
                        <li>• Psycho-educatie ontwikkelen</li>
                    </ul>
                </div>

            </div>
        </div>
    </section>

    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-blue-600 text-white">
        <div class="max-w-3xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl mb-4">Klaar om te Beginnen?</h2>
            <p class="text-xl mb-8 text-blue-100">
                Schrijf je vandaag nog in en start jouw reis naar een betekenisvolle carrière.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="https://jouwautisme.nl" target="_blank"
                    class="bg-white text-blue-600 hover:bg-gray-100 text-lg px-8 py-4 rounded-lg inline-block">
                    Schrijf je in
                </a>
                <a href="https://jouwautisme.nl" target="_blank"
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