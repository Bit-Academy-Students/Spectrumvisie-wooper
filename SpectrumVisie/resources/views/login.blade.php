<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/app.css')
    <title>Login</title>
</head>

<body>

    <div class="auth-container">
        <div class="auth-card">

            <h1 class="auth-title">Login</h1>

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

            <form method="POST" action="/login" class="auth-form">
                @csrf

                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                </div>

                <div class="form-group">
                    <label for="password">Wachtwoord</label>
                    <input id="password" type="password" name="password" required>
                </div>

                <button type="submit" class="auth-button">Login</button>
            </form>

        </div>
    </div>

</body>

</html>