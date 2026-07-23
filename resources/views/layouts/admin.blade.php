<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>@yield('title', 'Admin Panel')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white text-black">
    <div class="min-h-screen md:flex">
        <aside class="border-b border-black p-4 md:w-64 md:border-b-0 md:border-r">
            <h1 class="text-xl font-bold">
                Restaurant Admin
            </h1>

            <nav class="mt-6">
                <ul class="space-y-3">
                    <li>
                        <a href="#">
                            Dashboard
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            Categories
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            Menu Items
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            Restaurant Settings
                        </a>
                    </li>
                </ul>
            </nav>

            <div class="mt-8">
                <button type="button">
                    Log Out
                </button>
            </div>
        </aside>

        <main class="flex-1 p-6">
            @if (session('success'))
                <div class="mb-4 border border-black p-3">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mb-4 border border-black p-3">
                    {{ session('error') }}
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</body>
</html>