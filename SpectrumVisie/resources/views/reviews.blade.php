<!doctype html>
<html lang="nl">

<head>
    <meta charset="utf-8">
    <title>JouwAutisme – Reviews</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gray-50 text-slate-800 flex flex-col font-sans">
    @include('layouts.header')

    <main class="flex-1 py-12">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

            <h1 class="text-3xl font-bold text-slate-900 mb-8">Ervaringen & Reviews</h1>

            <div class="bg-white rounded-xl shadow p-6 mb-12 border border-gray-200">
                <h2 class="text-xl font-bold mb-4">Laat een review achter</h2>

                <form id="review-form">

                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Jouw beoordeling (1 tot 5 sterren)</label>
                        <div id="star-container" class="flex gap-1 text-3xl cursor-pointer">
                            <span class="star text-gray-300" data-value="1">★</span>
                            <span class="star text-gray-300" data-value="2">★</span>
                            <span class="star text-gray-300" data-value="3">★</span>
                            <span class="star text-gray-300" data-value="4">★</span>
                            <span class="star text-gray-300" data-value="5">★</span>
                        </div>
                        <p id="error-rating" class="text-red-500 text-sm hidden">Kies minimaal 1 ster.</p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Titel van review</label>
                        <input type="text" id="title" class="w-full rounded border-gray-300 border p-2" placeholder="Bijv. Super platform!">
                        <p id="error-title" class="text-red-500 text-sm hidden">Vul een titel in (max 50 tekens).</p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Jouw ervaring</label>
                        <textarea id="text" rows="4" class="w-full rounded border-gray-300 border p-2" placeholder="Vertel wat je ervan vond..."></textarea>
                        <p id="error-text" class="text-red-500 text-sm hidden">Je bericht moet minimaal 10 tekens lang zijn.</p>
                        <p id="error-profanity" class="text-red-500 text-sm hidden font-bold">Let op je taalgebruik! Verwijder scheldwoorden.</p>
                    </div>

                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Opslaan
                    </button>

                    <p id="success-message" class="text-green-600 font-bold mt-3 hidden">Gelukt! Je review is opgeslagen.</p>
                </form>
            </div>

            <h3 class="text-2xl font-bold mb-4">Recente Reviews</h3>
            <div id="reviews-list" class="space-y-4">
            </div>

        </div>
    </main>

    @include('layouts.footer')

    <script>
        // Hrml ophalen
        const form = document.getElementById('review-form');
        const titleInput = document.getElementById('title');
        const textInput = document.getElementById('text');
        const stars = document.querySelectorAll('.star');
        const reviewsList = document.getElementById('reviews-list');

        let selectedRating = 0; // Default is 0 stars

        // clickable sterren
        for (let i = 0; i < stars.length; i++) {
            stars[i].addEventListener('click', function() {
                selectedRating = stars[i].getAttribute('data-value');

                // Alles grijs
                for (let j = 0; j < stars.length; j++) {
                    stars[j].classList.remove('text-yellow-400');
                    stars[j].classList.add('text-gray-300');
                }

                // Geclickte sterren geel maken
                for (let j = 0; j < selectedRating; j++) {
                    stars[j].classList.remove('text-gray-300');
                    stars[j].classList.add('text-yellow-400');
                }
            });
        }

        //  Form validation en opslaan
        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent page reload

            let isValid = true;

            // verberg error
            document.getElementById('error-rating').classList.add('hidden');
            document.getElementById('error-title').classList.add('hidden');
            document.getElementById('error-text').classList.add('hidden');
            document.getElementById('error-profanity').classList.add('hidden');



            // Check de sterren
            if (selectedRating == 0) {
                document.getElementById('error-rating').classList.remove('hidden');
                isValid = false;
            }

            // Check de titel
            if (titleInput.value.length < 2 || titleInput.value.length > 50) {
                document.getElementById('error-title').classList.remove('hidden');
                isValid = false;
            }

            // Check de tekst
            if (textInput.value.length < 10) {
                document.getElementById('error-text').classList.remove('hidden');
                isValid = false;
            }

            // scheldwoorden check
            let badWords = ['dom', 'sukkel', 'klootzak', 'kut'];
            let typedText = textInput.value.toLowerCase(); // Make everything lowercase

            for (let i = 0; i < badWords.length; i++) {
                if (typedText.includes(badWords[i])) {
                    document.getElementById('error-profanity').classList.remove('hidden');
                    isValid = false;
                }
            }



            // als er geen fouten zijn opslaan
            if (isValid == true) {

                // aanmaken object met de review data
                let newReview = {
                    title: titleInput.value,
                    text: textInput.value,
                    rating: selectedRating,
                    date: new Date().toLocaleDateString('nl-NL') // Today
                };

                // oude reviews ophalen uit LocalStorage
                let savedData = localStorage.getItem('my_reviews');
                let reviewsArray = [];

                if (savedData != null) {
                    reviewsArray = JSON.parse(savedData); // Convert the text (JSON) to a real array
                }

                // voeg de nieuwe review toe aan het begin van de array
                reviewsArray.unshift(newReview);

                // sla de hele array weer op in LocalStorage
                localStorage.setItem('my_reviews', JSON.stringify(reviewsArray));

                // toon succes-message
                document.getElementById('success-message').classList.remove('hidden');

                // clear de form
                form.reset();
                selectedRating = 0;
                for (let j = 0; j < stars.length; j++) {
                    stars[j].classList.remove('text-yellow-400');
                    stars[j].classList.add('text-gray-300');
                }

                // berocht verwijnen
                setTimeout(function() {
                    document.getElementById('success-message').classList.add('hidden');
                }, 3000);

                // de reviews opnieuw tonen
                showReviews();
            }
        });

        // reciew displkay functie
        function showReviews() {
            // Clear de huidige lijst
            reviewsList.innerHTML = '';

            let savedData = localStorage.getItem('my_reviews');

            if (savedData == null) {
                reviewsList.innerHTML = '<p class="text-gray-500">Er zijn nog geen reviews. Wees de eerste!</p>';
            } else {
                let reviewsArray = JSON.parse(savedData);

                // Loop door alle reviews en maak een HTML blok voor elke review
                for (let i = 0; i < reviewsArray.length; i++) {
                    let review = reviewsArray[i];

                    // sterren string
                    let starsText = "";
                    for (let s = 1; s <= 5; s++) {
                        if (s <= review.rating) {
                            starsText += "★";
                        } else {
                            starsText += "☆";
                        }
                    }

                    // html block maken
                    let htmlBlock = `
                        <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100">
                            <h4 class="font-bold text-lg">${review.title}</h4>
                            <div class="text-yellow-500 text-xl tracking-widest">${starsText}</div>
                            <span class="text-xs text-gray-400">${review.date}</span>
                            <p class="text-gray-700 mt-2">${review.text}</p>
                        </div>
                    `;

                    // placen in de pagina
                    reviewsList.innerHTML += htmlBlock;
                }
            }
        }

        // zodra de pagina geladen is, de reviews tonen
        showReviews();
    </script>
</body>

</html>