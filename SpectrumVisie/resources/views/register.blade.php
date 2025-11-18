<!DOCTYPE html>
<html>
<<<<<<< HEAD

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
=======
<head>
    <title>Register</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body { max-width: 400px; margin: 40px auto; font-family: sans-serif; }
        label { display: block; margin-bottom: 6px; }
        input { width: 100%; padding: 8px; margin-bottom: 16px; }
        button { padding: 10px 16px; width: 100%; }
        .alert { padding: 10px; margin-bottom: 16px; border-radius: 4px; }
        .alert-success { background-color: #d4edda; color: #155724; }
        .alert-error { background-color: #f8d7da; color: #721c24; }
    </style>
</head>
<body>

<h1>Register</h1>

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

<form method="POST" action="/register">
    @csrf

    <label>Name</label>
    <input type="text" name="name" value="{{ old('name') }}">

    <label>Email</label>
    <input type="email" name="email" value="{{ old('email') }}">

    <label>Password</label>
    <input type="password" name="password">

    <label>Confirm Password</label>
    <input type="password" name="password_confirmation">

    <button type="submit">Register</button>
</form>

</body>
</html>
>>>>>>> c06bccf (register working and added user_pending migration)
