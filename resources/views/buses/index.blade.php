<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css'])
    <title>UTS</title>
</head>
<body class="bg-gray-100 p-4">
    <h2 class="text-3xl font-bold">Available Buses</h2>
    <div class="overflow-x-auto mt-5 rounded-lg">
        <table class="min-w-full bg-white border border-gray-200 shadow-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Bus ID</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Capacity</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Route Name</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">DS ID</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($buses as $bus)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 text-sm text-gray-800">{{ $bus->id }}</td>
                        <td class="px-4 py-2 text-sm text-gray-800">{{ $bus->capacity }}</td>
                        <td class="px-4 py-2 text-sm text-gray-800">{{ $bus->route_name }}</td>
                        <td class="px-4 py-2 text-sm text-gray-800">{{ $bus->ds_id }}</td>
                        <td class="px-4 py-2 text-sm text-gray-800"><button class="bg-green-300 hover:bg-green-400 px-5 py-2 rounded-sm cursor-pointer">Book</button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>