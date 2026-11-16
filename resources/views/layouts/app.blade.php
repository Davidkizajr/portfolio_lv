<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        @fonts
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Style & Scripts -->
        <script>
            (() => {
                const stored = localStorage.getItem('theme');
                const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
                const shouldBeDark = stored === 'dark' || (stored === null && prefersDark);
                document.documentElement.classList.toggle('dark', shouldBeDark);
            })();
        </script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="flex flex-col font-sans antialiased bg-gray-100 dark:bg-gray-950 h-screen justify-between">
        <header>
            @include('components.navigation')
        </header>
        <main>
            <div class="max-w-7xl mx-auto p-8 mb-auto dark:text-white">
                @yield('content')
            </div>
        </main>
        <footer class="mt-10">
            @include('components.footer')
        </footer>
    </body>
</html>
