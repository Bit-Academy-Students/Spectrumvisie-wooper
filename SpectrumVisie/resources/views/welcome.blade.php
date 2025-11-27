<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900 antialiased">
  <div class="min-h-screen flex flex-col items-center justify-center">
    <h1 class="text-4xl font-bold">Welcome</h1>
    <p class="mt-4 text-gray-600">Simple placeholder homepage</p>

    <div class="mt-6 flex gap-4">
      <a href="/login" class="px-4 py-2 bg-indigo-600 text-white rounded-md">Login</a>
      <a href="/register" class="px-4 py-2 border rounded-md">Register</a>
    </div>


<table border="1" class="mt-4">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->roles->role_name }}</td>
            <td><form action="{{ route('pending.accept', $user->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="px-2 py-1 bg-green-500 text-white rounded hover:bg-green-600">
                        Accept
                    </button>
                </form>
            </td>

            <td><form action="{{ route('pending.reject', $user->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                        Reject
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
