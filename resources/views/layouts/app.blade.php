<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css'])
    <title>@yield('title', 'Dashboard')</title>
</head>
<body>
    <div class="bg-gray-100 p-4 max-w-screen-2xl mx-auto">
        <nav class="bg-white shadow-sm px-6 py-4">
        <div class="mx-auto flex items-center justify-between">
                
            <!-- Logo -->
            <div class="text-4xl font-bold tracking-tight">
            UTS
            </div>

            <!-- Actions -->
            <div>
            <button class="bg-red-400 hover:bg-red-500 active:scale-95 transition-all duration-150 py-2 px-5 rounded-lg text-white font-medium cursor-pointer">
                Logout
            </button>
            </div>

        </div>
        </nav>

        <div class="content">
            @yield('content')
        </div>
    </div>
</body>
</html>