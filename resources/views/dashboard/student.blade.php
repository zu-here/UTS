@extends('layouts.app')

@section('title', 'Student Dashboard | ' . $student->name)

@section('content')
    <div class="mt-13">
        <p class="flex justify-between items-center font-semibold text-xl"><span class="text-3xl font-bold">Welcome, {{ $student->name}}!</span> <span class="bg-gray-200 p-3 rounded-md flex flex-col items-center gap-2">Reward Coins <span class="flex gap-3"><img src="{{ asset('images/coin.png') }}" width="30"> {{ $student->points }}</span></span> </p>
        <!-- <p class="text-lg font-semibold">
            Reward Points: {{ $student->points }}
        </p> -->
    </div>
    
    

    <div x-data="{ tab: 'buses' }">
        <div class="flex space-x-4 mt-6 border-b">
            <button 
                @click="tab = 'routes'" 
                :class="tab === 'routes' ? 'border-b-2 border-blue-500 text-blue-500' : 'text-gray-600'"
                class="px-4 py-2 font-medium"
            >
                Routes
            </button>
            <button 
                @click="tab = 'buses'" 
                :class="tab === 'buses' ? 'border-b-2 border-blue-500 text-blue-500' : 'text-gray-600'"
                class="px-4 py-2 font-medium"
            >
                Buses
            </button>
            <button 
                @click="tab = 'bookings'" 
                :class="tab === 'bookings' ? 'border-b-2 border-blue-500 text-blue-500' : 'text-gray-600'"
                class="px-4 py-2 font-medium"
            >
                My Bookings
            </button>

            <button 
                @click="tab = 'feedback'" 
                :class="tab === 'feedback' ? 'border-b-2 border-blue-500 text-blue-500' : 'text-gray-600'"
                class="px-4 py-2 font-medium"
            >
                Feedback
            </button>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 mt-5 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 text-red-700 mt-5 px-4 py-2 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <div x-show="tab === 'routes'" class="mt-6">
            <div class="span-5 bg-white rounded-lg px-3 py-1 rounded-md">
                <p class="text-2xl font-bold mb-5">Routes</p>
                <table class="min-w-full bg-white mt-5">
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

        <div x-show="tab === 'buses'" class="mt-6">
            <div class="overflow-x-auto mt-9 span-5 rounded-lg bg-white px-3 py-1 rounded-md">
            <p class="text-2xl font-bold mb-5">Available Buses</p>
                @if($buses->count() > 0)
                    <table class="min-w-full bg-white mt-5">
                        <thead class="bg-gray-50">
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
                                    <td class="px-4 py-2 text-sm text-gray-800">{{ $bus->available_capacity }} / {{ $bus->capacity }} <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded text-xs font-semibold">Seats: {{$bus->sitting_capacity }}</span></td>
                                    <td class="px-4 py-2 text-sm text-gray-800">{{ $bus->route->name }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-800">{{ $bus->ds_id ? $bus->ds_id : 'N/A'}}</td>
                                    <td class="px-4 py-2 text-sm text-gray-800">
                                        <form class="flex gap-5" action="{{ route('bus.book', ['id' => $student->id, 'bus' => $bus->id]) }}" method="POST">
                                            @csrf
                                            <button
                                                    type="submit"
                                                    class="bg-green-300 hover:bg-green-400 active:scale-95 transition-all px-5 py-2 rounded-sm cursor-pointer font-medium">
                                                    Book
                                            </button>

                                            <label class="flex items-center gap-2">
                                                <input type="checkbox" name="use_points">
                                                Use 20 points for subsidy
                                            </label>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <span>No Buses Available!</span>
                @endif
            </div>
        </div>
        <div x-show="tab === 'bookings'" class="mt-6">
            <div class="overflow-x-auto mt-9 span-5 rounded-lg bg-white px-3 py-1 rounded-md">

                <p class="text-2xl font-bold mb-5">My Bookings</p>

                @if($bookings->count() > 0)

                    <table class="min-w-full bg-white">

                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-3 text-left">Bus</th>
                                <th class="px-4 py-3 text-left">Seat</th>
                                <th class="px-4 py-3 text-left">Subsidy</th>
                                <th class="px-4 py-3 text-left">Payment Method</th>
                                <th class="px-4 py-3 text-left">Payment Status</th>
                                <th class="px-4 py-3 text-left">Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach($bookings as $booking)

                                <tr class="hover:bg-gray-50">

                                    <td class="px-4 py-2">
                                        {{ $booking->bus_id }}
                                    </td>

                                    <td class="px-4 py-2">
                                        {{ $booking->seat_serial }}
                                    </td>

                                    <td class="px-4 py-2">

                                        @if($booking->has_subsidy)
                                            Yes
                                        @else
                                            No
                                        @endif

                                    </td>

                                    <td class="px-4 py-2">
                                        {{ $booking->payment_method ?? 'N/A' }}
                                    </td>

                                    <td class="px-4 py-2">
                                        {{ $booking->payment_status }}
                                    </td>

                                    <td class="px-4 py-2">

                                        <form
                                            action="{{ route('booking.cancel', ['id' => $student->id, 'booking' => $booking->id]) }}"
                                            method="POST">

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="bg-red-400 hover:bg-red-500 text-white px-4 py-2 rounded">

                                                Cancel

                                            </button>

                                        </form>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                @else

                    <span>No bookings yet.</span>

                @endif

            </div>
        </div>

        <div x-show="tab === 'feedback'" class="mt-6">
            <div class="overflow-x-auto mt-9 rounded-lg bg-white px-3 py-1 rounded-md w-full">
                <p class="text-2xl font-bold mb-5">Give Feedback!</p>
                <form class="space-y-5 bg-white rounded-sm" method="POST" action="{{ route('feedback.store') }}">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $student->id }}">
                    <!-- Name -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Name
                        </label>
                        <input 
                            type="text" 
                            name="name"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent"
                            placeholder="Enter your name"
                        >
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Message
                        </label>
                        <textarea
                            name="message"
                            rows="4"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent resize-none"
                            placeholder="Write your feedback..."
                        ></textarea>
                    </div>

                    <button
                        type="submit"
                        class="bg-blue-500 hover:bg-blue-600 active:scale-95 transition-all text-white font-medium py-2 px-6 rounded-md cursor-pointer w-full"
                    >
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection

