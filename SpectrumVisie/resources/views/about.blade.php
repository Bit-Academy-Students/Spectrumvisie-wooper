<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Over Platform</title>
</head>

<body class="bg-gray-50 min-h-screen font-sans text-gray-800">


    <!-- Top section -->
    <section class="bg-gradient-to-r from-blue-600 to-blue-700 text-white py-16">
        <div class="container mx-auto px-4 max-w-6xl text-center space-y-4">
            <h1 class="text-4xl md:text-5xl font-bold">Jouw Autisme Materiaal Platform</h1>
            <p class="text-xl text-blue-100 max-w-3xl mx-auto">
                Een digitaal platform voor het bekijken en downloaden van trainingsmaterialen over autisme voor ouders en trainers.
            </p>
        </div>
    </section>


    <!-- Info platform -->
    <div class="container mx-auto px-4 max-w-6xl py-12 space-y-12">


        <div class="border-2 border-gray-200 rounded-2xl bg-white shadow-md p-6">
            <div class="bg-gradient-to-r from-blue-50 to-purple-50 border-b p-4 rounded-t-2xl flex items-center gap-3">
                <div class="bg-gradient-to-br from-blue-600 to-blue-700 p-3 rounded-lg shadow-lg">
                    <svg class="h-6 w-6 text-white inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 20l9-5-9-5-9 5 9 5z" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-2xl font-semibold">Wat is dit platform?</h2>
                    <p class="text-base mt-1 text-gray-700">Een overzicht van onze functionaliteit</p>
                </div>
            </div>
            <div class="pt-6 space-y-4">
                <p class="text-lg text-gray-700 leading-relaxed">
                    Dit platform is speciaal ontwikkeld om trainingsmaterialen over autisme toegankelijk te maken
                    voor ouders en professionele trainers.
                </p>
                <p class="text-lg text-gray-700 leading-relaxed">
                    Hier kun je alle digitale documenten vinden die je kunt gebruiken tijdens een psycho-educatie traject ‘Jouw Autisme’. Het downloaden van de bestanden is alleen mogelijk als gecertificeerd trainer van Jouw Autisme. Wel kun je in de mappen kijken wat er allemaal te vinden is.
                </p>
            </div>
        </div>


        <!-- Mogelijkheden platform-->
        <div>
            <div class="bg-gradient-to-r from-blue-50 to-purple-50 border-b p-4 rounded-t-2xl">
                <h2 class="text-2xl font-semibold">Platform Mogelijkheden</h2>
            </div>
            <div class="pt-6 grid md:grid-cols-2 gap-6">

                <div class="flex gap-4">
                    <div class="bg-gradient-to-br from-blue-100 to-purple-100 p-3 rounded-lg h-fit text-blue-600">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 20l9-5-9-5-9 5 9 5z" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-lg mb-2 font-medium">Digitaal Materiaal Platform</h3>
                        <p class="text-gray-600">Toegang tot een uitgebreide bibliotheek van trainingsmaterialen, video's, PDFs en documenten over autisme.</p>
                    </div>
                </div>


                <div class="flex gap-4">
                    <div class="bg-gradient-to-br from-blue-100 to-purple-100 p-3 rounded-lg h-fit text-blue-600">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-lg mb-2 font-medium">Voor Ouders & Trainers</h3>
                        <p class="text-gray-600">Speciaal ontwikkeld voor ouders, verzorgers en professionals die werken met mensen met autisme.</p>
                    </div>
                </div>


                <div class="flex gap-4">
                    <div class="bg-gradient-to-br from-blue-100 to-purple-100 p-3 rounded-lg h-fit text-blue-600">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 20l9-5-9-5-9 5 9 5z" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-lg mb-2 font-medium">Veilige Toegang</h3>
                        <p class="text-gray-600">Beveiligde omgeving met persoonlijke accounts en rolgebaseerde toegangscontrole.</p>
                    </div>
                </div>


                <div class="flex gap-4">
                    <div class="bg-gradient-to-br from-blue-100 to-purple-100 p-3 rounded-lg h-fit text-blue-600">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-lg mb-2 font-medium">Download & Bekijk</h3>
                        <p class="text-gray-600">Download materialen voor offline gebruik of bekijk ze direct online in je browser.</p>
                    </div>
                </div>
            </div>
        </div>



        <!-- Uitleg platform slider -->
        <div class="py-6">
            <div class="bg-gradient-to-r from-blue-50 to-purple-50 border-b p-4 rounded-t-2xl">
                <h2 class="text-2xl font-semibold">Hoe Werkt Het?</h2>
            </div>

            <div class="mt-6 flex items-center justify-center gap-4">
                <!-- Vorige knopje -->
                <button id="prevBtn" class="bg-blue-600 text-white px-3 py-2 rounded hover:bg-blue-700 transition">❮</button>

                <!-- Slider content -->
                <div class="w-full max-w-3xl relative overflow-hidden">
                    <div id="slider" class="flex transition-transform duration-300">
                        <!-- Slide 1 -->
                        <div class="min-w-full text-center space-y-3">
                            <div class="bg-gradient-to-br from-blue-600 to-blue-700 w-16 h-16 rounded-full flex items-center justify-center mx-auto text-white text-2xl shadow-lg">1</div>
                            <h4 class="font-medium text-lg">Trainer worden</h4>
                            <p class="text-gray-600 text-sm">Word Jouwautisme-trainer en ontvang een certificaat.</p>
                        </div>

                        <!-- Slide 2 -->
                        <div class="min-w-full text-center space-y-3">
                            <div class="bg-gradient-to-br from-blue-600 to-blue-700 w-16 h-16 rounded-full flex items-center justify-center mx-auto text-white text-2xl shadow-lg">2</div>
                            <h4 class="font-medium text-lg">Account aanmaken</h4>
                            <p class="text-gray-600 text-sm">Gebruik jouw certificaatnummer en maak een account aan.</p>
                        </div>

                        <!-- Slide 3 -->
                        <div class="min-w-full text-center space-y-3">
                            <div class="bg-gradient-to-br from-blue-600 to-blue-700 w-16 h-16 rounded-full flex items-center justify-center mx-auto text-white text-2xl shadow-lg">3</div>
                            <h4 class="font-medium text-lg">Toegang tot platform</h4>
                            <p class="text-gray-600 text-sm">Zodra account is aangemaakt heeft u toegang tot het Jouwautisme platform</p>
                        </div>

                        <!-- Slide 4 -->
                        <div class="min-w-full text-center space-y-3">
                            <div class="bg-gradient-to-br from-blue-600 to-blue-700 w-16 h-16 rounded-full flex items-center justify-center mx-auto text-white text-2xl shadow-lg">4</div>
                            <h4 class="font-medium text-lg">Materialen Gebruiken</h4>
                            <p class="text-gray-600 text-sm">Download en bekijk de brede catalogus aan materialen</p>
                        </div>
                    </div>
                </div>

                <!-- Volgende knopje -->
                <button id="nextBtn" class="bg-blue-600 text-white px-3 py-2 rounded hover:bg-blue-700 transition">❯</button>
            </div>

            <!-- Indicatoren -->
            <div id="indicators" class="flex justify-center gap-2 mt-4">
                <div class="w-4 h-4 bg-blue-600 rounded-full"></div>
                <div class="w-4 h-4 bg-gray-300 rounded-full"></div>
                <div class="w-4 h-4 bg-gray-300 rounded-full"></div>
                <div class="w-4 h-4 bg-gray-300 rounded-full"></div>
            </div>
        </div>


        <!-- Call to action -->
        <div class="border-2 rounded-2xl bg-gradient-to-r from-blue-50 to-blue-60 shadow p-6 text-center space-y-4">
            <h2 class="text-2xl font-semibold">Toegang Nodig?</h2>
            <p class="text-gray-700 max-w-2xl mx-auto">
                Word nu autisme-trainer krijg toegang tot al ons lesmateriaal.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <button
                    class="bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 h-12 px-8 rounded text-white font-semibold"
                    onclick="window.location.href='http://127.0.0.1:8000/trainer'">
                    Trainer worden
                </button>

                <button class="border border-gray-300 h-12 px-8 rounded hover:bg-gray-100 font-semibold"
                    onclick="window.location.href='http://127.0.0.1:8000/platform'">
                    Bekijk Materialen
                </button>

            </div>
        </div>

    </div>
    <script>
        const slider = document.getElementById('slider');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const indicators = document.getElementById('indicators').children;

        let currentSlide = 0;
        const totalSlides = slider.children.length;

        function updateSlider() {
            slider.style.transform = `translateX(-${currentSlide * 100}%)`;

            // Update indicators
            for (let i = 0; i < indicators.length; i++) {
                indicators[i].classList.toggle('bg-blue-600', i === currentSlide);
                indicators[i].classList.toggle('bg-gray-300', i !== currentSlide);
            }
        }

        prevBtn.addEventListener('click', () => {
            currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
            updateSlider();
        });

        nextBtn.addEventListener('click', () => {
            currentSlide = (currentSlide + 1) % totalSlides;
            updateSlider();
        });
    </script>
</body>

</html>