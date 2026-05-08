<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - UTS Project</title>
    <!-- Tailwind CSS for quick styling -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen">

    <div class="max-w-md w-full bg-white shadow-lg rounded-lg p-8 text-center border-t-4 border-indigo-600">
        <div class="mb-4 inline-flex items-center justify-center w-16 h-16 bg-indigo-100 text-indigo-600 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="Grab 3D Car Racing Game icon or code symbol 10 20l4-2m0 0l4 2m-4-2v8m-9 0h18" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
        </div>
        
        <h1 class="text-3xl font-bold text-gray-800 mb-2">UTS Project</h1>
        <p class="text-gray-600 mb-6">
            The application is now running successfully on your local machine.
        </p>

        <div class="space-y-3">
            <a href="/login" class="block w-full py-2 px-4 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-md transition duration-200">
                Sign In
            </a>
            <a href="/register" class="block w-full py-2 px-4 bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 font-semibold rounded-md transition duration-200">
                Create Account
            </a>
        </div>

        <div class="mt-8 pt-6 border-t border-gray-100 text-xs text-gray-400">
            Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
        </div>
    </div>

</body>
</html>