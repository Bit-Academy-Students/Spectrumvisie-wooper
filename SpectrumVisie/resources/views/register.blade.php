<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registreren</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-lg mx-auto p-6">
        <div class="bg-white shadow-lg rounded-lg border border-gray-200 p-8">

            <h1 class="text-2xl font-semibold mb-6 text-center">Registreren</h1>

            {{-- Success message --}}
            @if (session('status'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                {{ session('status') }}
            </div>
            @endif

            {{-- Validation errors --}}
            @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-800 rounded">
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form method="POST" action="/register" class="space-y-6">
                @csrf

                <div class="space-y-1">
                    <label for="name" class="block text-gray-700">Naam</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                <div class="space-y-1">
                    <label for="email" class="block text-gray-700">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                <div class="space-y-1">
                    <label for="certificate_code" class="block text-gray-700">Certificaat</label>
                    <input id="certificate_code" type="text" name="certificate_code" value="{{ old('certificate_code') }}"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                <div class="space-y-1">
                    <label for="role_id" class="block text-gray-700">Rol</label>
                    <select id="role_id" name="role_id"
                        class="w-full border border-gray-300 rounded px-3 py-2 bg-white focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        @foreach ($roles as $role)
                        <option value="{{ $role->id }}">
                            {{ $role->role_name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="space-y-1">
                    <label for="password" class="block text-gray-700">Wachtwoord</label>
                    <input id="password" type="password" name="password"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                <div class="space-y-1">
                    <label for="password_confirmation" class="block text-gray-700">Herhaal Wachtwoord</label>
                    <input id="password_confirmation" type="password" name="password_confirmation"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                <button type="submit"
                    class="w-full bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white py-2 rounded font-semibold">
                    Registreer
                </button>

            </form>

        </div>
    </div>

</body>

</html>