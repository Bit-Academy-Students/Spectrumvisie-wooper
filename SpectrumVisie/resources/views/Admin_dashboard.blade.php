<!doctype html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <title>JouwAutisme – Beheerder Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-background text-foreground flex flex-col">
    @include('layouts.header')

    <main class="flex-1 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <header class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
                <div>
                    <h1 class="text-2xl sm:text-3xl font-semibold text-gray-900">
                        Beheerder Dashboard
                    </h1>
                    <p class="text-gray-600 mt-1">
                        Welkom, {{ Auth::user()->name ?? 'Beheerder' }}
                    </p>
                </div>

                <!-- <form method="POST"  >
                    @csrf
                    <button
                        type="submit"
                        class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-full text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        Uitloggen
                    </button>
                </form> -->
            </header>

            <div id="admin-tabs" class="space-y-6">
                <div class="bg-gray-100 rounded-full p-1 flex items-center gap-1">
                    <button
                        type="button"
                        class="tab-trigger flex-1 inline-flex items-center justify-center gap-2 text-sm font-medium rounded-full px-4 py-2.5
                               bg-white text-indigo-600 shadow-sm border border-indigo-500"
                        data-tab-target="materials"
                        aria-selected="true"
                    >
                        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M12 4.5v6h6M16.5 20.25h-9A1.5 1.5 0 0 1 6 18.75V5.25A1.5 1.5 0 0 1 7.5 3.75h6L18 8.25v10.5a1.5 1.5 0 0 1-1.5 1.5Z"/>
                        </svg>
                        <span>Materialen</span>
                    </button>

                    <button
                        type="button"
                        class="tab-trigger flex-1 inline-flex items-center justify-center gap-2 text-sm font-medium rounded-full px-4 py-2.5
                               bg-transparent text-gray-600 border border-transparent hover:bg-white/70 hover:text-gray-900"
                        data-tab-target="upload"
                        aria-selected="false"
                    >
                        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M4.5 19.5h15M12 4.5v11.25m0 0 4.5-4.5M12 15.75l-4.5-4.5"/>
                        </svg>
                        <span>Uploaden</span>
                    </button>

                    <button
                        type="button"
                        class="tab-trigger flex-1 inline-flex items-center justify-center gap-2 text-sm font-medium rounded-full px-4 py-2.5
                               bg-transparent text-gray-600 border border-transparent hover:bg-white/70 hover:text-gray-900"
                        data-tab-target="users"
                        aria-selected="false"
                    >
                        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M15.75 6.75a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Zm-9 11.25A4.5 4.5 0 0 1 12 13.5h0a4.5 4.5 0 0 1 5.25 4.5v.75h-10.5v-.75Z"/>
                        </svg>
                        <span>Gebruikers</span>
                    </button>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <section class="tab-panel space-y-4" data-tab-panel="materials">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-4">
                            <div>
                                <h2 class="text-lg font-semibold">Materialen</h2>
                                <p class="text-sm text-gray-600">
                                    Overzicht van alle materialen in het systeem.
                                </p>
                            </div>

                            <div class="flex flex-col sm:flex-row gap-3 w-full sm:w-auto">
                                <div class="relative flex-1">
                                    <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
                                        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M21 21l-4.35-4.35M10.5 18a7.5 7.5 0 1 1 0-15 7.5 7.5 0 0 1 0 15Z"/>
                                        </svg>
                                    </span>
                                    <input
                                        type="text"
                                        placeholder="Zoek materialen..."
                                        class="w-full pl-9 pr-3 py-2 rounded-full border border-gray-200 text-sm bg-gray-50 focus:bg-white focus:border-indigo-500 focus:ring-indigo-500"
                                    >
                                </div>

                                <div>
                                    <select
                                        class="w-full sm:w-40 px-3 py-2 rounded-full border border-gray-200 text-sm bg-gray-50 focus:bg-white focus:border-indigo-500 focus:ring-indigo-500"
                                    >
                                        <option>Alle types</option>
                                        <option>PDF</option>
                                        <option>Video</option>
                                        <option>MP3</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                            <article class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden flex flex-col">
                                <div class="relative h-40 bg-gray-200">
                                    <img
                                        src="https://images.pexels.com/photos/164531/pexels-photo-164531.jpeg?auto=compress&cs=tinysrgb&w=800"
                                        alt="Puzzelstukken"
                                        class="w-full h-full object-cover"
                                    >
                                    <span class="absolute top-3 left-3 inline-flex items-center px-2.5 py-0.5 rounded-full bg-emerald-500 text-white text-xs font-medium">
                                        Publiek
                                    </span>
                                    <span class="absolute top-3 right-3 inline-flex items-center px-2.5 py-0.5 rounded-full bg-black/70 text-white text-xs font-medium">
                                        PDF
                                    </span>
                                </div>
                                <div class="p-4 flex-1 flex flex-col">
                                    <h3 class="font-semibold text-sm mb-1">
                                        Introductie tot Autisme
                                    </h3>
                                    <p class="text-sm text-gray-600 mb-3">
                                        Een uitgebreide gids over de basisprincipes van autisme.
                                    </p>
                                    <p class="text-xs text-gray-400 mb-4">
                                        Geüpload: 15-1-2025
                                    </p>
                                    <div class="mt-auto flex items-center gap-2">
                                        <button class="flex-1 inline-flex items-center justify-center gap-2 rounded-full bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-3 py-2">
                                            <svg class="fill-current w-3 h-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
                                            Download
                                        </button>
                                        <button
                                        id="openAccessModal"
                                            class="p-2 rounded-full border border-gray-200 text-gray-600 hover:bg-gray-50"
                                        >
                                            <svg
                                                class="h-4 w-4"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="1.5"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    fill-rule="evenodd"
                                                    clip-rule="evenodd"
                                                    d="M7.84 1.804A1 1 0 018.82 1h2.36a1 1 0 01.98.804l.331 1.652a6.993 6.993 0 011.929 1.115l1.598-.54a1 1 0 011.186.447l1.18 2.044a1 1 0 01-.205 1.251l-1.267 1.113a7.047 7.047 0 010 2.228l1.267 1.113a1 1 0 01.206 1.25l-1.18 2.045a1 1 0 01-1.187.447l-1.598-.54a6.993 6.993 0 01-1.929 1.115l-.33 1.652a1 1 0 01-.98.804H8.82a1 1 0 01-.98-.804l-.331-1.652a6.993 6.993 0 01-1.929-1.115l-1.598.54a1 1 0 01-1.186-.447l-1.18-2.044a1 1 0 01.205-1.251l1.267-1.114a7.05 7.05 0 010-2.227L1.821 7.773a1 1 0 01-.206-1.25l1.18-2.045a1 1 0 011.187-.447l1.598.54A6.993 6.993 0 017.51 3.456l.33-1.652zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                                />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </article>
<!-- loop for the cards hier -->
                        </div>
                    </section>

                    <section class="tab-panel space-y-4 hidden" data-tab-panel="upload">
                        <div>
                            <h2 class="text-lg font-semibold">Nieuw materiaal uploaden</h2>
                            <p class="text-sm text-gray-600">
                                Upload een nieuw leermateriaal voor uw gebruikers.
                            </p>
                        </div>

                        <form
                            method="POST"
                            enctype="multipart/form-data"
                            class="space-y-4"
                        >
                            @csrf

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                    Titel
                                </label>
                                <input
                                    type="text"
                                    name="title"
                                    placeholder="Bijv. Introductie tot Autisme"
                                    class="block w-full rounded-lg border border-gray-200 bg-gray-50 px-3 py-2 text-sm shadow-sm focus:bg-white focus:border-indigo-500 focus:ring-indigo-500"
                                    required
                                >
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                    Beschrijving
                                </label>
                                <textarea
                                    name="description"
                                    rows="3"
                                    placeholder="Beschrijf het materiaal..."
                                    class="block w-full rounded-lg border border-gray-200 bg-gray-50 px-3 py-2 text-sm shadow-sm focus:bg-white focus:border-indigo-500 focus:ring-indigo-500"
                                ></textarea>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                    Materiaal type
                                </label>
                                <select
                                    name="type"
                                    class="block w-full rounded-lg border border-gray-200 bg-gray-50 px-3 py-2 text-sm shadow-sm focus:bg-white focus:border-indigo-500 focus:ring-indigo-500"
                                >
                                    <option value="pdf">PDF Document</option>
                                    <option value="video">Video</option>
                                    <option value="audio">Audio</option>
                                    <option value="link">Externe link</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                    Bestand
                                </label>
                                <div
                                    class="border-2 border-dashed border-gray-300 rounded-xl px-4 py-8 text-center bg-gray-50"
                                >
                                    <input
                                        type="file"
                                        name="file"
                                        class="hidden"
                                        id="file-input"
                                        required
                                    >
                                    <label
                                        for="file-input"
                                        class="cursor-pointer inline-flex flex-col items-center gap-2"
                                    >
                                        <svg class="h-8 w-8 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M7.5 12 12 7.5 16.5 12M12 7.5V18"/>
                                        </svg>
                                        <span class="text-sm font-medium text-indigo-600">
                                            Klik om een bestand te kiezen
                                        </span>
                                        <span class="text-xs text-gray-500">
                                            Sleep een bestand hierheen of klik om te bladeren
                                        </span>
                                    </label>
                                </div>
                            </div>

                            <div class="flex justify-end">
                                <button
                                    type="submit"
                                    class="inline-flex items-center px-5 py-2.5 rounded-full text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                                >
                                    Uploaden
                                </button>
                            </div>
                        </form>
                    </section>

                    <section class="tab-panel space-y-4 hidden" data-tab-panel="users">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                            <div>
                                <h2 class="text-lg font-semibold">Gebruikersbeheer</h2>
                                <p class="text-sm text-gray-600">
                                    Beheer gebruikers, rollen en toegangsrechten.
                                </p>
                            </div>
                            <button
                                type="button"
                                class="inline-flex items-center px-4 py-2 rounded-full text-xs sm:text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                            >
                                Nieuwe gebruiker
                            </button>
                        </div>

                        <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden mt-2">
                            <table class="min-w-full text-sm">
                                <thead class="bg-gray-50 border-b border-gray-200">
                                <tr>
                                    <th class="px-4 py-2 text-left font-medium text-gray-600">Naam</th>
                                    <th class="px-4 py-2 text-left font-medium text-gray-600">E-mail</th>
                                    <th class="px-4 py-2 text-left font-medium text-gray-600">Rol</th>
                                    <th class="px-4 py-2 text-right font-medium text-gray-600">Acties</th>
                                </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                <tr>
                                    <td class="px-4 py-3">Jan Jansen</td>
                                    <td class="px-4 py-3">jan@example.com</td>
                                    <td class="px-4 py-3">Trainer</td>
                                    <td class="px-4 py-3 text-right space-x-3">
                                        <button class="text-indigo-600 hover:text-indigo-800 text-xs">
                                            Bewerken
                                        </button>
                                        <button class="text-red-600 hover:text-red-800 text-xs">
                                            Blokkeren
                                        </button>
                                    </td>
                                </tr>
<!-- foreach voor users trainers en admin enzo -->
                                </tbody>
                            </table>
                        </div>
                    </section>
                </div>
            </div>
        </div>
<!-- pop up -->
        <div
            id="accessModal"
            class="fixed inset-0 z-50 flex items-center justify-center bg-black/40 hidden"
            aria-hidden="true"
        >
            <div id="closeAccessModalOverlay" class="absolute inset-0"></div>

            <div class="relative bg-white rounded-xl shadow-xl w-full max-w-3xl mx-4">
                <div class="flex items-center justify-between px-6 py-4 border-b">
                    <div>
                        <h2 class="text-lg font-semibold">Toegangsrechten Beheren</h2>
                        <p class="text-sm text-gray-500">
                            Stel in wie dit materiaal mag bekijken en downloaden
                        </p>
                    </div>
                    <button
                        id="closeAccessModal"
                        class="p-2 rounded-full hover:bg-gray-100"
                    >
                        ✕
                    </button>
                </div>

                <div class="px-6 py-4 space-y-4 max-h-[70vh] overflow-y-auto">
                    <h3 class="mt-4 font-semibold text-gray-800">Gebruikerstoegang</h3>

                   <!-- gebruikers -->
                    <div class="border rounded-lg px-4 py-3 flex items-center justify-between">
                        <div>
                            <p class="font-medium">Trainer</p>
                        </div>
                        <div class="flex items-center gap-4 text-sm">
                            <label class="flex items-center gap-1">
                                <input type="checkbox" class="h-4 w-4">
                                <span>PDF</span>
                            </label>
                            <label class="flex items-center gap-1">
                                <input type="checkbox" class="h-4 w-4">
                                <span>Word</span>
                            </label>
                                <label class="flex items-center gap-1">
                                <input type="checkbox" class="h-4 w-4">
                                <span>MP3</span>
                            </label>
                                <label class="flex items-center gap-1">
                                <input type="checkbox" class="h-4 w-4">
                                <span>Video</span>
                            </label>
                        </div>
                    </div>

                    <div class="border rounded-lg px-4 py-3 flex items-center justify-between">
                        <div>
                            <p class="font-medium">Ouders</p>
                        </div>
                        <div class="flex items-center gap-4 text-sm">
                            <label class="flex items-center gap-1">
                                <input type="checkbox" class="h-4 w-4">
                                <span>PDF</span>
                            </label>
                            <label class="flex items-center gap-1">
                                <input type="checkbox" class="h-4 w-4">
                                <span>Word</span>
                            </label>
                                <label class="flex items-center gap-1">
                                <input type="checkbox" class="h-4 w-4">
                                <span>MP3</span>
                            </label>
                                <label class="flex items-center gap-1">
                                <input type="checkbox" class="h-4 w-4">
                                <span>Video</span>
                            </label>
                        </div>
                    </div>

                    {{-- hier kun je een @foreach over users doen --}}
                </div>
                <div class="px-6 py-4 border-t bg-gray-50 flex justify-end">
                    <button
                        class="px-5 py-2 rounded-md bg-blue-600 text-white font-medium hover:bg-blue-700"
                    >
                        Toegangsrechten Opslaan
                    </button>
                </div>
            </div>
        </div>
    </main>

    @include('layouts.footer')
<!-- tabs -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const triggers = document.querySelectorAll('#admin-tabs .tab-trigger');
            const panels = document.querySelectorAll('#admin-tabs .tab-panel');

            function setActiveTab(name) {
                triggers.forEach(btn => {
                    const target = btn.getAttribute('data-tab-target');
                    const isActive = target === name;

                    btn.setAttribute('aria-selected', isActive ? 'true' : 'false');

                    btn.classList.toggle('bg-white', isActive);
                    btn.classList.toggle('shadow-sm', isActive);
                    btn.classList.toggle('text-indigo-600', isActive);
                    btn.classList.toggle('border-indigo-500', isActive);

                    btn.classList.toggle('bg-transparent', !isActive);
                    btn.classList.toggle('text-gray-600', !isActive);
                    btn.classList.toggle('border-transparent', !isActive);
                });

                panels.forEach(panel => {
                    const panelName = panel.getAttribute('data-tab-panel');
                    panel.classList.toggle('hidden', panelName !== name);
                });
            }

            triggers.forEach(btn => {
                btn.addEventListener('click', function () {
                    const target = this.getAttribute('data-tab-target');
                    setActiveTab(target);
                });
            });
            setActiveTab('materials');
        });
// pop up modal
        document.addEventListener("DOMContentLoaded", () => {
        const modal   = document.getElementById("accessModal");
        const openBtn = document.getElementById("openAccessModal");
        const closeBtn = document.getElementById("closeAccessModal");
        const closeBg = document.getElementById("closeAccessModalOverlay");

        if (!modal || !openBtn) return;

        function openModal() {
            modal.classList.remove("hidden");
            modal.setAttribute("aria-hidden", "false");
        }

        function closeModal() {
            modal.classList.add("hidden");
            modal.setAttribute("aria-hidden", "true");
        }

        openBtn.addEventListener("click", openModal);
        closeBtn.addEventListener("click", closeModal);
        closeBg.addEventListener("click", closeModal);

        document.addEventListener("keydown", (e) => {
            if (e.key === "Escape" && !modal.classList.contains("hidden")) {
                closeModal();
            }
        });
    });
    </script>
</body>
</html>
