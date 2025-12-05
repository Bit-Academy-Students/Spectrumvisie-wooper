<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Platform</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen font-sans text-gray-800">

    <div class="container mx-auto p-6 space-y-8">

        <div class="border-2 border-gray-200 rounded-2xl bg-white shadow-md p-6">
            <ul class="space-y-4">
                @foreach ($data['categories'] as $category)
                    <li>
                        <a href="/category/{{ $category->id }}"
                            class="flex items-center justify-between px-5 py-4 bg-gray-50 hover:bg-gradient-to-r hover:from-blue-50 hover:to-purple-50 rounded-xl shadow-sm transition-all duration-300">
                            <span class="font-medium text-gray-800">{{ $category->code }} - {{ $category->name }}</span>
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

    </div>

</body>

</html>
