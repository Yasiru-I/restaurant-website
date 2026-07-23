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
    <main class="mx-auto mt-16 max-w-md border border-black p-6">
        <h1 class="text-2xl font-bold">
            Admin Login
        </h1>

        <p class="mt-2">
            Sign in to manage the restaurant website.
        </p>

        <form method="POST" action="#" class="mt-6 space-y-4">
            @csrf

            <div>
                <label for="email" class="block">
                    Email
                </label>

                <input
                    id="email"
                    name="email"
                    type="email"
                    value="{{ old('email') }}"
                    required
                    autocomplete="email"
                    class="mt-1 w-full border border-black p-2"
                >

                @error('email')
                    <p class="mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block">
                    Password
                </label>

                <input
                    id="password"
                    name="password"
                    type="password"
                    required
                    autocomplete="current-password"
                    class="mt-1 w-full border border-black p-2"
                >

                @error('password')
                    <p class="mt-1">{{ $message }}</p>
                @enderror
            </div>

            @if (session('error'))
                <p>{{ session('error') }}</p>
            @endif

            <button
                type="submit"
                class="border border-black bg-black px-4 py-2 text-white"
            >
                Sign In
            </button>
        </form>
    </main>
</body>
</html>