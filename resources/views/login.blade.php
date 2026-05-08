<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>UTS Login</title>
</head>
<body>
    <div class="max-w-md mx-auto mt-20 bg-white p-6 rounded-lg shadow">

        <h2 class="text-2xl font-bold mb-5">Login</h2>

        @if(session('error'))
            <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.submit') }}">

            @csrf

            <div class="mb-4">
                <label class="block mb-1">Username</label>

                <input
                    type="text"
                    name="id"
                    class="w-full border px-3 py-2 rounded"
                    placeholder="S01"
                >
            </div>

            <div class="mb-4">
                <label class="block mb-1">Password</label>

                <input
                    type="password"
                    name="password"
                    placeholder="Password"
                    class="w-full border px-3 py-2 rounded"
                >
            </div>

            <button
                type="submit"
                class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 rounded"
            >
                Login
            </button>

        </form>

    </div>
</body>
</html>