<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Platform</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 text-gray-900">

    @php
    // $userRole = auth()->user()->role_id;
    @endphp

    <div class="max-w-7xl mx-auto px-6 py-10">

        <!-- Categorie naam -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">
                Categorie:
                <span class="text-indigo-600">{{ $data['category']->name }}</span>
            </h1>
        </div>

        <!-- Zoek en filter -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-4">

            <input id="searchInput" type="text" placeholder="Zoeken"
                class="w-full sm:w-1/2 px-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500">

            <select id="filterSelect"
                class="w-full sm:w-1/4 px-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">Alle types</option>
            </select>

        </div>

        <!-- Materialen -->
        <div id="materialsGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach ($data['materiaal'] as $item)
            <?php
            if ($data['userRole']) {
                $item->user_access = $item->access->where('role_id', $data['userRole'])->first();
            } else {
                $item->user_access = null;
            }
            ?>

            <!-- Cards met materiaal -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex flex-col material-card"
                data-title="{{ strtolower($item->title) }}" data-type="{{ strtolower($item->materialType->type) }}">

                <h3 class="text-xl font-semibold text-gray-900 mb-2">
                    {{ $item->title }}
                </h3>

                <p class="text-gray-600 text-sm mb-4">
                    Type: <span class="font-medium">{{ $item->materialType->type }}</span>
                </p>

                <div class="mt-auto flex items-center gap-3">

                    @if ($item->user_access && $item->user_access->can_view)
                    <a href="{{ route('materials.view', $item->id) }}"
                        class="inline-flex items-center px-4 py-2 rounded-full bg-indigo-600 text-white text-sm font-medium hover:bg-indigo-700 transition">
                        Bekijken
                    </a>
                    @endif

                    @if ($item->user_access && $item->user_access->can_download && !in_array($item->material_type_id, [4, 5]))
                    <a href="{{ route('materials.download', $item->id) }}"
                        class="inline-flex items-center px-4 py-2 rounded-full bg-gray-100 text-gray-800 text-sm font-medium hover:bg-gray-200 transition">
                        Downloaden
                    </a>
                    @endif

                </div>

            </div>
            @endforeach

        </div>

    </div>


    <script>
        const searchInput = document.getElementById('searchInput');
        const filterSelect = document.getElementById('filterSelect');
        const cards = document.querySelectorAll('.material-card');

        // Filter dropdown
        const types = new Set();
        cards.forEach(card => {
            types.add(card.dataset.type);
        });
        types.forEach(type => {
            const option = document.createElement('option');
            option.value = type;
            option.textContent = type.charAt(0).toUpperCase() + type.slice(1);
            filterSelect.appendChild(option);
        });

        // Zoeken en filteren
        function filterMaterials() {
            const searchValue = searchInput.value.toLowerCase();
            const filterValue = filterSelect.value.toLowerCase();

            let anyVisible = false;

            cards.forEach(card => {
                const title = card.dataset.title;
                const type = card.dataset.type;

                if ((title.includes(searchValue)) && (filterValue === '' || type === filterValue)) {
                    card.style.display = 'flex';
                    anyVisible = true;
                } else {
                    card.style.display = 'none';
                }
            });

            //  laat de tekst geen resultaten zien als er niks is
            if (!anyVisible) {
                if (!document.getElementById('noResults')) {
                    const noResults = document.createElement('p');
                    noResults.id = 'noResults';
                    noResults.textContent = 'Geen resultaten gevonden.';
                    noResults.className = 'text-center text-gray-500 col-span-full';
                    document.getElementById('materialsGrid').appendChild(noResults);
                }
            } else {
                const noResults = document.getElementById('noResults');
                if (noResults) noResults.remove();
            }
        }

        searchInput.addEventListener('input', filterMaterials);
        filterSelect.addEventListener('change', filterMaterials);
    </script>

</body>

</html>