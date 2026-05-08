<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css'])
    <title>@yield('title', 'Dashboard')</title>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body>
    <div class="bg-gray-100 p-4 max-w-screen-2xl mx-auto">
        <nav class="bg-white shadow-sm px-6 py-4 rounded-lg">
            <div class="mx-auto flex items-center justify-between">
                    
                <!-- Logo -->
                <div class="text-4xl font-bold tracking-tight">
                UTS
                </div>

                <!-- Actions -->
                <div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button
                            type="submit"
                            class="bg-red-500 text-white px-4 py-2 rounded"
                        >
                            Logout
                        </button>
                    </form>
                </div>

            </div>
        </nav>

        <div class="content">
            @yield('content')
        </div>
    </div>
</body>
<script src="//unpkg.com/alpinejs" defer></script>
</html>