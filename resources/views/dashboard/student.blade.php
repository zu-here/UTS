@extends('layouts.app')

@section('title', 'Student Dashboard | ' . $student->name)

@section('content')
    <div>
        <h2 class="text-3xl font-bold my-7">Welcome, {{ $student->name}}!</h2>
    </div>
    <h2 class="text-2xl font-bold">Available Buses</h2>
    @if($buses->count() > 0)
        <div class="overflow-x-auto mt-5 rounded-lg">
            <table class="min-w-full bg-white border border-gray-200 shadow-sm">
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
                            <td class="px-4 py-2 text-sm text-gray-800">{{ $bus->capacity }}</td>
                            <td class="px-4 py-2 text-sm text-gray-800">{{ $bus->route_name }}</td>
                            <td class="px-4 py-2 text-sm text-gray-800">{{ $bus->ds_id }}</td>
                            <td class="px-4 py-2 text-sm text-gray-800"><button class="bg-green-300 hover:bg-green-400 active:scale-95 transition-all px-5 py-2 rounded-sm cursor-pointer font-medium">Book</button></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-2xl flex items-center justify-center">No Buses Available!</p>
    @endif
    <div class="mt-10 max-w-xl">
    
        <h2 class="text-2xl font-bold mb-5">Give Feedback!</h2>

        <form class="space-y-5 bg-white p-6 rounded-sm" method="POST" action="{{ route('feedback.store') }}">
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

            <!-- Message -->
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

            <!-- Button -->
            <button
                type="submit"
                class="bg-blue-500 hover:bg-blue-600 active:scale-95 transition-all text-white font-medium py-2 px-6 rounded-md"
            >
                Submit
            </button>

        </form>
    </div>
@endsection