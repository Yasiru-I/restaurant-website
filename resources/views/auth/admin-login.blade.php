<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Admin Login</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white text-black">
    <main>
        <h1>Admin Login</h1>

        <p>Sign in to manage the restaurant website.</p>

        <form method="POST" action="#">
            @csrf

            <div>
                <label for="email">Email</label>

                <input
                    id="email"
                    name="email"
                    type="email"
                    value="{{ old('email') }}"
                    required
                    autocomplete="email"
                >

                @error('email')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password">Password</label>

                <input
                    id="password"
                    name="password"
                    type="password"
                    required
                    autocomplete="current-password"
                >

                @error('password')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            @if (session('error'))
                <p>{{ session('error') }}</p>
            @endif

            <button type="submit">
                Sign In
            </button>
        </form>
    </main>
</body>
</html>