@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div>
    <h2 class="text-3xl font-bold mt-13">Welcome, Admin</h2>
</div>

<div x-data="{ tab: 'routes', openRouteModal: false, openBusModal: false, openUserModal: false }">

    <!-- Tabs -->
    <div class="flex space-x-4 mt-6 border-b">
        <button @click="tab = 'routes'"
            :class="tab === 'routes' ? 'border-b-2 border-blue-500 text-blue-500' : 'text-gray-600'"
            class="px-4 py-2 font-medium">Routes</button>

        <button @click="tab = 'buses'"
            :class="tab === 'buses' ? 'border-b-2 border-blue-500 text-blue-500' : 'text-gray-600'"
            class="px-4 py-2 font-medium">Buses</button>

        <button @click="tab = 'users'"
            :class="tab === 'users' ? 'border-b-2 border-blue-500 text-blue-500' : 'text-gray-600'"
            class="px-4 py-2 font-medium">
            Users
        </button>

        <button @click="tab = 'statistics'"
            :class="tab === 'statistics' ? 'border-b-2 border-blue-500 text-blue-500' : 'text-gray-600'"
            class="px-4 py-2 font-medium">Statistics</button>
    </div>

    <!-- ROUTES -->
     <div x-show="tab === 'routes'" class="mt-6">
        <div class="p-5 bg-white rounded-lg">
            <!-- <h2 class="text-2xl font-bold mb-4">Routes</h2> -->
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold">Routes</h2>

                <button 
                    @click="openRouteModal = true"
                    class="cursor-pointer bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
                >
                    + Add Route
                </button>
            </div>

            <table class="min-w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">ID</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Route Name</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Stops</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($routes as $route)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2">{{ $route->id }}</td>
                            <td class="px-4 py-2">{{ $route->name }}</td>
                            <td class="px-4 py-2">{{ $route->path }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    

    <!-- BUSES -->
    <div x-show="tab === 'buses'" class="mt-6">
        <div class="p-5 bg-white rounded-lg">
            <!-- <h2 class="text-2xl font-bold mb-4">Buses</h2> -->
             <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold">Buses</h2>

                <button 
                    @click="openBusModal = true"
                    class="cursor-pointer bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
                >
                    + Add Bus
                </button>
            </div>

            <table class="min-w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">ID</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Capacity</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Route</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Driver</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($buses as $bus)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2">{{ $bus->id }}</td>
                            <td class="px-4 py-2">{{ $bus->capacity }}</td>
                            <td class="px-4 py-2">{{ $bus->route->name ?? 'N/A' }}</td>
                            <td class="px-4 py-2">{{ $bus->driver->name ?? 'N/A' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- USERS -->
    <div x-show="tab === 'users'" class="mt-6">
        <div class="p-5 bg-white rounded-lg">

            <!-- Header -->
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold">Users</h2>

                <button 
                    @click="openUserModal = true"
                    class="cursor-pointer bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
                >
                    + Add User
                </button>
            </div>

            <!-- Table -->
            <table class="min-w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">ID</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Name</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Email</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Location</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Department</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Subsidy</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Role</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($users as $user)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2">{{ $user->id }}</td>
                            <td class="px-4 py-2">{{ $user->name }}</td>
                            <td class="px-4 py-2">{{ $user->email }}</td>
                            <td class="px-4 py-2">{{ $user->location ?? 'N/A' }}</td>
                            <td class="px-4 py-2">{{ $user->department }}</td>
                            <td class="px-4 py-2">{{ $user->subsidy ? "YES" : "NO" }}</td>

                            <!-- Role Badge -->
                            <td class="px-4 py-2">
                                @if($user->role === 'admin')
                                    <span class="bg-purple-100 text-purple-700 px-2 py-1 rounded text-xs">Admin</span>
                                @elseif($user->role === 'driver')
                                    <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs">Driver</span>
                                @else
                                    <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-xs">Student</span>
                                @endif
                            </td>

                            <td>
                                @if($user->is_active)
                                    <!-- Ban -->
                                    <form method="POST" action="{{ route('users.ban', $user->id) }}">
                                        @csrf
                                        <button class="cursor-pointer bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs">
                                            Ban
                                        </button>
                                    </form>
                                @else
                                    <!-- Unban -->
                                    <form method="POST" action="{{ route('users.unban', $user->id) }}">
                                        @csrf
                                        <button class="cursor-pointer bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded text-xs">
                                            Unban
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

    <!-- STATISTICS -->
    <div x-show="tab === 'statistics'" class="mt-6">
        <div class="p-5 bg-white rounded-lg">
            <h2 class="text-2xl font-bold mb-6">System Statistics</h2>

            <div class="grid grid-cols-4 gap-6">
                <div class="bg-blue-100 p-4 rounded-lg text-center">
                    <h3 class="text-lg font-semibold">Total Students</h3>
                    <p class="text-2xl font-bold">{{ $users->where('role', 'student')->count() }}</p>
                </div>

                <div class="bg-green-100 p-4 rounded-lg text-center">
                    <h3 class="text-lg font-semibold">Total Buses</h3>
                    <p class="text-2xl font-bold">{{ $buses->count() }}</p>
                </div>
                
                <div class="bg-yellow-100 p-4 rounded-lg text-center">
                    <h3 class="text-lg font-semibold">Total Routes</h3>
                    <p class="text-2xl font-bold">{{ $routes->count() }}</p>
                </div>

                <div class="bg-purple-100 p-4 rounded-lg text-center">
                    <h3 class="text-lg font-semibold">Bookings</h3>
                    
                </div>
            </div>
        </div>
    </div>

    <!-- Route Modal -->
    <div 
        x-show="openRouteModal"
        x-transition
        class="fixed inset-0 bg-transparent bg-opacity-5 flex items-center justify-center z-50"
    >

        <div @click.away="openRouteModal = false" class="bg-white w-full max-w-lg p-6 rounded-lg shadow-lg">

            <h2 class="text-xl font-bold mb-4">Add Route</h2>

            <form method="POST" action="{{ route('routes.store') }}">
                @csrf

                <!-- ID -->
                <div class="mb-3">
                    <label class="block text-sm font-medium">Route ID</label>
                    <input type="text" name="id"
                        class="w-full border px-3 py-2 rounded"
                        placeholder="R001">
                </div>

                <!-- Name -->
                <div class="mb-3">
                    <label class="block text-sm font-medium">Name</label>
                    <input type="text" name="name"
                        class="w-full border px-3 py-2 rounded"
                        placeholder="Uttara Route">
                </div>

                <!-- Path -->
                <div class="mb-4">
                    <label class="block text-sm font-medium">Path</label>
                    <textarea name="path"
                        class="w-full border px-3 py-2 rounded"
                        placeholder="Uttara → Airport → Banani"></textarea>
                </div>

                <!-- Buttons -->
                <div class="flex justify-end space-x-3">
                    <button type="button"
                        @click="openRouteModal = false"
                        class="px-4 py-2 bg-gray-300 rounded">
                        Cancel
                    </button>

                    <button type="submit"
                        class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                        Save
                    </button>
                </div>
            </form>

        </div>
    </div>

    <!-- Bus Modal -->
    <div 
        x-show="openBusModal"
        x-cloak
        class="fixed inset-0 bg-transparent bg-opacity-5 flex items-center justify-center z-50"
    >
        <div @click.away="openBusModal = false" class="bg-white w-full max-w-lg p-6 rounded-lg">

            <h2 class="text-xl font-bold mb-4">Add Bus</h2>

            <form method="POST" action="{{ route('buses.store') }}">
                @csrf

                <!-- Bus ID -->
                <div class="mb-3">
                    <label class="block text-sm">Bus ID</label>
                    <input type="text" name="id" class="w-full border px-3 py-2 rounded" placeholder="B001">
                </div>

                <!-- Capacity -->
                <div class="mb-3">
                    <label class="block text-sm">Capacity</label>
                    <input type="number" name="capacity" class="w-full border px-3 py-2 rounded" placeholder="30">
                </div>

                <div class="mb-3">
                    <label class="block text-sm">Sitting Capacity</label>
                    <input
                        type="number"
                        name="sitting_capacity"
                        class="w-full border px-3 py-2 rounded"
                        placeholder="10">
                </div>

                <!-- Route -->
                <div class="mb-3">
                    <label class="block text-sm">Route</label>
                    <select name="route_id" class="w-full border px-3 py-2 rounded">
                        @foreach($routes as $route)
                            <option value="{{ $route->id }}">
                                {{ $route->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Driver -->
                <div class="mb-4">
                    <label class="block text-sm">Driver</label>
                    <select name="ds_id" class="w-full border px-3 py-2 rounded">
                        <option value="">Select Driver</option>
                        @foreach($users->where('role', 'driver') as $user)
                            <option value="{{ $user->id }}">
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="flex justify-end space-x-3">
                    <button type="button" @click="openBusModal = false" class="px-4 py-2 bg-gray-300 rounded">
                        Cancel
                    </button>

                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">
                        Save
                    </button>
                </div>
            </form>

        </div>
    </div>

    <!-- User Modal -->
    <div 
        x-show="openUserModal"
        x-cloak
        class="fixed inset-0 bg-transparent bg-opacity-5 flex items-center justify-center z-50"
    >
        <div @click.away="openUserModal = false" class="bg-white w-full max-w-lg p-6 rounded-lg">

            <h2 class="text-xl font-bold mb-4">Add Driver / Staff</h2>

            <form method="POST" action="{{ route('users.store') }}">
                @csrf

                @if ($errors->any())
                    <div class="bg-red-100 text-red-700 p-3 mb-3 rounded">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>• {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- ID -->
                <div class="mb-3">
                    <label class="block text-sm">User ID</label>
                    <input type="text" name="id" class="w-full border px-3 py-2 rounded" placeholder="S001">
                </div>

                <!-- Name -->
                <div class="mb-3">
                    <label class="block text-sm">Name</label>
                    <input type="text" name="name" class="w-full border px-3 py-2 rounded" placeholder="Arif Mahmud">
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label class="block text-sm">Email</label>
                    <input type="email" name="email" class="w-full border px-3 py-2 rounded" placeholder="arifmah@gmail.com">
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label class="block text-sm">Password</label>
                    <input type="password" name="password" class="w-full border px-3 py-2 rounded" placeholder="Password">
                </div>

                <!-- Department -->
                <div class="mb-3">
                    <label class="block text-sm">Department</label>
                    <input type="text" name="department" class="w-full border px-3 py-2 rounded" placeholder="CS">
                </div>

                <!-- Location -->
                <div class="mb-3">
                    <label class="block text-sm">Location</label>
                    <input type="text" name="location" class="w-full border px-3 py-2 rounded" placeholder="Banani">
                </div>

                <!-- Subsidy -->
                <div class="mb-3">
                    <label class="block text-sm">Subsidy</label>
                    <select name="subsidy" class="w-full border px-3 py-2 rounded">
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                </div>

                <!-- Role -->
                <div class="mb-4">
                    <label class="block text-sm">Role</label>
                    <select name="role" class="w-full border px-3 py-2 rounded">
                        <option value="driver">Driver</option>
                        <option value="admin">Admin</option>
                        <option value="student">Student</option>
                    </select>
                </div>

                <div class="flex justify-end space-x-3">
                    <button type="button" @click="openUserModal = false" class="px-4 py-2 bg-gray-300 rounded">
                        Cancel
                    </button>

                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>

    @if(session('success'))
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('routeModal', false);
        });
    </script>
    @endif


</div>
@endsection
