
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
</html>
