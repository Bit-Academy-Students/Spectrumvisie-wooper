<!doctype html>
<html lang="nl">

<head>
    <meta charset="utf-8">
    <title>JouwAutisme – Kennisbank</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gray-50 text-slate-800 flex flex-col font-sans">
    @include('layouts.header')

    <main class="flex-1">
        <section class="relative bg-gradient-to-br from-blue-100 via-indigo-50 to-purple-100 py-20 border-b border-gray-200">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">

                <h1 class="text-4xl md:text-5xl font-extrabold text-slate-900 mb-6 tracking-tight">
                    Ontdek boeken over autisme
                </h1>


                <form id="search-form" class="relative max-w-2xl mx-auto flex items-center shadow-xl rounded-full bg-white overflow-hidden focus-within:ring-4 focus-within:ring-blue-200 transition-all">
                    <div class="pl-6 text-gray-400">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input
                        type="text"
                        id="search-input"
                        placeholder="Zoek op titel, auteur of onderwerp..."
                        class="w-full py-4 pl-4 pr-4 bg-transparent border-none focus:ring-0 text-gray-700 placeholder-gray-400 outline-none text-lg"
                        required>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-4 px-8 transition-colors h-full">
                        Zoeken
                    </button>
                </form>
            </div>
        </section>

        <section class="py-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 min-h-[500px]">
            <div class="flex justify-between items-end mb-8 border-b border-gray-200 pb-4">
                <h2 class="text-2xl font-bold text-slate-800">Resultaten</h2>
                <span id="result-count" class="text-sm font-medium text-gray-500 bg-gray-100 py-1 px-3 rounded-full hidden">0 boeken</span>
            </div>

            <div id="status-message" class="hidden text-center py-12 bg-white rounded-2xl border border-gray-100 shadow-sm">
                <p class="text-gray-500 text-lg" id="status-text">Typ hierboven een zoekterm in om te beginnen.</p>
            </div>

            <div id="skeletons" class="hidden grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @for ($i = 0; $i < 4; $i++)
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-4 animate-pulse flex flex-col h-[400px]">
                    <div class="bg-gray-200 h-48 rounded-xl mb-4 w-full"></div>
                    <div class="h-4 bg-gray-200 rounded w-1/3 mb-4"></div>
                    <div class="h-6 bg-gray-200 rounded w-3/4 mb-2"></div>
                    <div class="h-6 bg-gray-200 rounded w-1/2 mb-4"></div>
                    <div class="h-4 bg-gray-200 rounded w-full mt-auto"></div>
            </div>
            @endfor
            </div>

            <div id="books-container" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            </div>
        </section>
    </main>

    @include('layouts.footer')

    <template id="book-template">
        <article class="bg-white rounded-2xl shadow-sm hover:shadow-xl border border-gray-100 transition-all duration-300 hover:-translate-y-1 overflow-hidden flex flex-col h-full group">
            <div class="h-56 bg-gray-50 flex items-center justify-center p-6 relative overflow-hidden border-b border-gray-100">
                <img src="" alt="Cover" class="book-cover max-h-full max-w-full object-contain drop-shadow-md group-hover:scale-105 transition-transform duration-500 z-10 hidden">
                <div class="book-no-cover flex flex-col items-center text-gray-400 z-10">
                    <svg class="w-10 h-10 mb-2 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                    <span class="text-xs uppercase font-semibold">Geen foto</span>
                </div>
                <div class="absolute inset-0 bg-gradient-to-tr from-blue-50 to-transparent opacity-50"></div>
            </div>

            <div class="p-6 flex flex-col flex-1">
                <span class="book-authors text-xs font-bold text-blue-600 uppercase tracking-wide mb-2 block truncate"></span>
                <h3 class="book-title font-bold text-lg mb-3 text-slate-900 line-clamp-2 leading-tight"></h3>
                <p class="book-description text-sm text-gray-500 line-clamp-3 mb-6 flex-1"></p>

                <a href="#" target="_blank" class="book-link mt-auto w-full inline-flex justify-center items-center px-4 py-2.5 bg-gray-50 hover:bg-blue-50 text-slate-700 hover:text-blue-700 text-sm font-semibold rounded-xl transition-colors border border-gray-200 hover:border-blue-200">
                    Bekijk op Google Books
                    <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                    </svg>
                </a>
            </div>
        </article>
    </template>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const searchForm = document.getElementById('search-form');
            const searchInput = document.getElementById('search-input');
            const booksContainer = document.getElementById('books-container');
            const statusMessage = document.getElementById('status-message');
            const statusText = document.getElementById('status-text');
            const skeletons = document.getElementById('skeletons');
            const resultCount = document.getElementById('result-count');
            const template = document.getElementById('book-template');

            const fetchBooks = (query) => {
                // UI Reset voor laden
                booksContainer.innerHTML = '';
                statusMessage.classList.add('hidden');
                skeletons.classList.remove('hidden');
                resultCount.classList.add('hidden');

                // Zoek altijd in context van autisme, tenzij het er al in staat
                const searchQuery = encodeURIComponent(`${query} autisme`);
                const apiUrl = `https://www.googleapis.com/books/v1/volumes?q=${searchQuery}&maxResults=12&langRestrict=nl`;

                fetch(apiUrl)
                    .then(response => {
                        if (!response.ok) throw new Error('API fout');
                        return response.json();
                    })
                    .then(data => {
                        skeletons.classList.add('hidden'); // Verberg laden

                        if (!data.items || data.items.length === 0) {
                            statusMessage.classList.remove('hidden');
                            statusText.textContent = `Helaas, geen boeken gevonden voor "${query}".`;
                            return;
                        }

                        // Toon aantal
                        resultCount.textContent = `${data.items.length} boeken gevonden`;
                        resultCount.classList.remove('hidden');

                        // Kaarten maken
                        data.items.forEach(item => {
                            const info = item.volumeInfo;
                            const clone = template.content.cloneNode(true);

                            clone.querySelector('.book-title').textContent = info.title || 'Onbekende titel';
                            clone.querySelector('.book-authors').textContent = info.authors ? info.authors.join(', ') : 'Auteur onbekend';
                            clone.querySelector('.book-description').textContent = info.description || 'Er is geen samenvatting beschikbaar voor dit boek.';

                            const coverImg = clone.querySelector('.book-cover');
                            const noCover = clone.querySelector('.book-no-cover');

                            if (info.imageLinks && info.imageLinks.thumbnail) {
                                coverImg.src = info.imageLinks.thumbnail.replace('http:', 'https:');
                                coverImg.classList.remove('hidden');
                                noCover.classList.add('hidden');
                            }

                            clone.querySelector('.book-link').href = info.infoLink || '#';
                            booksContainer.appendChild(clone);
                        });
                    })
                    .catch(error => {
                        console.error(error);
                        skeletons.classList.add('hidden');
                        statusMessage.classList.remove('hidden');
                        statusText.innerHTML = "<span class='text-red-500 font-medium'>Oeps! Er ging iets mis met het ophalen van de data.</span>";
                    });
            };

            // Zoeken bij submit
            searchForm.addEventListener('submit', (e) => {
                e.preventDefault();
                const query = searchInput.value.trim();
                if (query) fetchBooks(query);
            });

            // Start direct met een zoekopdracht bij inladen van dee pagina
            fetchBooks('basis');
        });
    </script>
</body>

</html>