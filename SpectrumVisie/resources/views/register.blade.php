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

            {{-- Backend Validation errors (blijven belangrijk voor de zekerheid!) --}}
            @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-800 rounded">
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form id="registerForm" method="POST" action="/register" class="space-y-6">
                @csrf

                <div class="space-y-1">
                    <label for="name" class="block text-gray-700">Naam</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none transition-colors">
                    <p id="nameError" class="text-red-500 text-sm hidden mt-1"></p>
                </div>

                <div class="space-y-1">
                    <label for="email" class="block text-gray-700">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none transition-colors">
                    <p id="emailError" class="text-red-500 text-sm hidden mt-1"></p>
                </div>

                <div class="space-y-1">
                    <label for="certificate_code" class="block text-gray-700">Certificaat</label>
                    {{-- Hier even geen strenge validatie op gezet, want ik weet niet hoe zo'n code eruit ziet --}}
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
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none transition-colors">
                    <p id="passwordError" class="text-red-500 text-sm hidden mt-1"></p>
                </div>

                <div class="space-y-1">
                    <label for="password_confirmation" class="block text-gray-700">Herhaal Wachtwoord</label>
                    <input id="password_confirmation" type="password" name="password_confirmation"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none transition-colors">
                    <p id="confirmError" class="text-red-500 text-sm hidden mt-1"></p>
                </div>

                <button type="submit" id="submitBtn"
                    class="w-full bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white py-2 rounded font-semibold transition-all">
                    Registreer
                </button>

            </form>

        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // aal elementen op
            const nameInput = document.getElementById('name');
            const emailInput = document.getElementById('email');
            const passwordInput = document.getElementById('password');
            const confirmInput = document.getElementById('password_confirmation');
            const form = document.getElementById('registerForm');

            // functie om een input als fout aan te geven
            const setError = (inputElement, errorElement, message) => {
                inputElement.classList.remove('border-gray-300', 'border-green-500');
                inputElement.classList.add('border-red-500');
                errorElement.textContent = message;
                errorElement.classList.remove('hidden');
            };

            //  functie om een input als goed te geven
            const setSuccess = (inputElement, errorElement) => {
                inputElement.classList.remove('border-red-500', 'border-gray-300');
                inputElement.classList.add('border-green-500');
                errorElement.classList.add('hidden');
            };

            // Naam checken of het vakje niet leeg is
            nameInput.addEventListener('input', () => {
                const errorEl = document.getElementById('nameError');
                if (nameInput.value.trim().length < 2) {
                    setError(nameInput, errorEl, 'Je naam moet minimaal 2 letters hebben.');
                } else {
                    setSuccess(nameInput, errorEl);
                }
            });

            // 2. Email checken met een regex
            emailInput.addEventListener('input', () => {
                const errorEl = document.getElementById('emailError');
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                if (!emailRegex.test(emailInput.value)) {
                    setError(emailInput, errorEl, 'Vul een geldig e-mailadres in.');
                } else {
                    setSuccess(emailInput, errorEl);
                }
            });

            // 3. Wachtwoord sterkte minimaal 8 tekens
            passwordInput.addEventListener('input', () => {
                const errorEl = document.getElementById('passwordError');

                if (passwordInput.value.length < 8) {
                    setError(passwordInput, errorEl, 'Wachtwoord is te kort (minimaal 8 tekens).');
                } else {
                    setSuccess(passwordInput, errorEl);
                }

                // Check meteen het bevestigingswachtwoord als die al is ingevuld
                if (confirmInput.value.length > 0) {
                    checkPasswordsMatch();
                }
            });

            // 4. Wachtwoorden vergelijken
            const checkPasswordsMatch = () => {
                const errorEl = document.getElementById('confirmError');

                if (confirmInput.value !== passwordInput.value) {
                    setError(confirmInput, errorEl, 'Wachtwoorden komen niet overeen.');
                } else if (confirmInput.value === '') {
                    setError(confirmInput, errorEl, 'Herhaal je wachtwoord.');
                } else {
                    setSuccess(confirmInput, errorEl);
                }
            };

            confirmInput.addEventListener('input', checkPasswordsMatch);


        });
    </script>
</body>

</html>