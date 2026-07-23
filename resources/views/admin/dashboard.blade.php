@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
    <header>
        <h2 class="text-2xl font-bold">
            Dashboard
        </h2>

        <p class="mt-2">
            Welcome to the restaurant administration panel.
        </p>
    </header>

    <section class="mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
        <article class="border border-black p-4">
            <h3>Total Categories</h3>

            <p class="mt-2 text-2xl font-bold">
                {{ $totalCategories ?? 0 }}
            </p>
        </article>

        <article class="border border-black p-4">
            <h3>Total Menu Items</h3>

            <p class="mt-2 text-2xl font-bold">
                {{ $totalMenuItems ?? 0 }}
            </p>
        </article>

        <article class="border border-black p-4">
            <h3>Available Items</h3>

            <p class="mt-2 text-2xl font-bold">
                {{ $availableItems ?? 0 }}
            </p>
        </article>

        <article class="border border-black p-4">
            <h3>Unavailable Items</h3>

            <p class="mt-2 text-2xl font-bold">
                {{ $unavailableItems ?? 0 }}
            </p>
        </article>

        <article class="border border-black p-4">
            <h3>Featured Items</h3>

            <p class="mt-2 text-2xl font-bold">
                {{ $featuredItems ?? 0 }}
            </p>
        </article>
    </section>

    <section class="mt-8">
        <h2 class="text-xl font-bold">
            Quick Actions
        </h2>

        <div class="mt-4 flex flex-wrap gap-3">
            <a href="#" class="border border-black px-4 py-2">
                Add Category
            </a>

            <a href="#" class="border border-black px-4 py-2">
                Add Menu Item
            </a>

            <a href="#" class="border border-black px-4 py-2">
                Restaurant Settings
            </a>
        </div>
    </section>
@endsection