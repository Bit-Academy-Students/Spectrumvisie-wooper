<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Materiaal</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 text-gray-900">

    <div class="max-w-4xl mx-auto px-4 sm:px-6 py-10">

        <!-- Titel -->
        <div class="mb-8 text-center">
            <h1 class="text-3xl font-bold text-gray-900">
                <span class="text-indigo-600">{{ $item->title }}</span>
            </h1>
        </div>

        <!-- Card -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 sm:p-8 flex flex-col items-center">

            <!-- Info -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 w-full mb-8">

                <div>
                    <p class="text-sm text-gray-500 font-medium mb-1">Beschrijving</p>
                    <p class="text-gray-800 break-words">{{ $item->description }}</p>
                </div>

                <div>
                    <p class="text-sm text-gray-500 font-medium mb-1">Categorie</p>
                    <p class="text-gray-800 font-semibold">{{ $item->category->name }}</p>
                </div>

                <div>
                    <p class="text-sm text-gray-500 font-medium mb-1">Type</p>
                    <p class="text-gray-800 font-semibold">{{ $item->materialType->type }}</p>
                </div>

                @if ($item->URL)
                <div>
                    <p class="text-sm text-gray-500 font-medium mb-1">URL</p>
                    <a href="{{ $item->URL }}" target="_blank"
                        class="text-indigo-600 hover:text-indigo-700 underline break-all">
                        {{ $item->URL }}
                    </a>
                </div>
                @endif
            </div>

            <!-- Materiaal types  -->
            <div class="w-full flex justify-center mt-6">

                @if ($item->materialType->type === 'pdf')
                <div class="w-full bg-gray-100 border border-gray-200 rounded-xl overflow-hidden">
                    <embed src="{{ route('materials.stream', $item->id) }}#toolbar=0&zoom=100"
                        type="application/pdf"
                        class="w-full h-[500px] sm:h-[700px]">
                </div>

                @elseif ($item->materialType->type === 'youtube-link')
                <div class="w-full aspect-video rounded-xl overflow-hidden shadow-sm max-w-3xl mx-auto">
                    <iframe class="w-full h-full"
                        src="{{ $item->URL }}"
                        frameborder="0"
                        allowfullscreen>
                    </iframe>
                </div>

                @elseif ($item->materialType->type === 'video')
                <div class="w-full max-w-3xl mx-auto">
                    <video controls class="w-full rounded-xl shadow-sm">
                        <source src="{{ route('materials.stream', $item->id) }}">
                    </video>
                </div>

                @elseif ($item->materialType->type === 'artikel')
                <a href="{{ $item->URL }}"
                    target="_blank"
                    class="inline-flex items-center px-5 py-3 bg-indigo-600 text-white rounded-full hover:bg-indigo-700 transition font-medium">
                    Open Artikel
                </a>

                @else
                @php
                $userRole = auth()->user()->role_id;
                $hasAccess = $item->access->where('role_id', $userRole)->first();
                @endphp

                @if ($hasAccess && $hasAccess->can_download)
                <a href="{{ route('materials.download', $item->id) }}"
                    class="inline-flex items-center px-5 py-3 bg-gray-100 text-gray-800 rounded-full hover:bg-gray-200 transition font-medium">
                    Download
                </a>
                @endif

                @endif

            </div>

        </div>

    </div>

</body>

</html>