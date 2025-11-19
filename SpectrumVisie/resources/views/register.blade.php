<!DOCTYPE html>
<html>

<head>
    <title>Registreren</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/app.css')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>

    <div class="auth-container">
        <div class="auth-card">

            <h1 class="auth-title">Registreren</h1>

            {{-- Success message --}}
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif

            {{-- Validation errors --}}
            @if ($errors->any())
            <div class="alert alert-error">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form method="POST" action="/register" class="auth-form">
                @csrf

                <div class="form-group">
                    <label for="name">Naam</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}">
                </div>

                <div class="form-group">
                    <label for="password">Wachtwoord</label>
                    <input id="password" type="password" name="password">
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Herhaal Wachtwoord</label>
                    <input id="password_confirmation" type="password" name="password_confirmation">
                </div>

                <button type="submit" class="auth-button">Registreer</button>
            </form>

        </div>
    </div>

</body>

</html>