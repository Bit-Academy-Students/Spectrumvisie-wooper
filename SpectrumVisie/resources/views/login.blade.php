<<<<<<< HEAD
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

=======

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: #111;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-box {
            background: #1a1a1a;
            padding: 2rem;
            border-radius: 12px;
            width: 300px;
            box-shadow: 0 0 15px rgba(0,0,0,0.4);
        }

        .login-box h2 {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .login-box label {
            display: block;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }

        .login-box input {
            width: 100%;
            padding: 0.5rem;
            margin-bottom: 1rem;
            border: none;
            border-radius: 6px;
            background: #2a2a2a;
            color: #fff;
        }

        .login-box button {
            width: 100%;
            padding: 0.7rem;
            border: none;
            border-radius: 6px;
            background: #3a7bfd;
            color: white;
            font-size: 1rem;
            cursor: pointer;
        }

        .login-box button:hover {
            background: #2f63d0;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Login</h2>
        <form method="POST" action="/login">
            @csrf
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required />

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required />

            <button type="submit">Login</button>
        </form>
    </div>
</body>
>>>>>>> 63a334e (login working and added the PendingController)
</html>
