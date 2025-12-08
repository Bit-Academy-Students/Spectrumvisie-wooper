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

        <!-- Materialen -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach ($data['materiaal'] as $item)
            <?php
            if ($data['userRole']) {
                $item->user_access = $item->access->where('role_id', $data['userRole'])->first();
            } else {
                $item->user_access = null;
            }
            ?>

            <!-- Cards met materiaal -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex flex-col">

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

</body>

</html>