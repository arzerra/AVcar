<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-bold mb-4">Your Rentals</h3>
                    
                    @if($rentals->isEmpty())
                        <p>You have no rentals at the moment.</p>
                    @else
                        <table class="table-auto w-full text-left border-collapse border border-gray-400 dark:border-gray-700">
                            <thead>
                                <tr>
                                    <th class="border border-gray-400 dark:border-gray-700 px-4 py-2">Rent ID</th>
                                    <th class="border border-gray-400 dark:border-gray-700 px-4 py-2">Car Name</th>
                                    <th class="border border-gray-400 dark:border-gray-700 px-4 py-2">Price</th>
                                    <th class="border border-gray-400 dark:border-gray-700 px-4 py-2">Date Request</th>
                                    <th class="border border-gray-400 dark:border-gray-700 px-4 py-2">Duration</th>
                                    <th class="border border-gray-400 dark:border-gray-700 px-4 py-2">Total</th>
                                    <th class="border border-gray-400 dark:border-gray-700 px-4 py-2">Pickup</th>
                                    <th class="border border-gray-400 dark:border-gray-700 px-4 py-2">Dropoff</th>
                                    <th class="border border-gray-400 dark:border-gray-700 px-4 py-2">Status</th>
                                    <th class="border border-gray-400 dark:border-gray-700 px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rentals as $rent)
                                    @if($rent->rentStatus === 'pending' || $rent->rentStatus === 'rented')
                                        <tr>
                                            <td class="border border-gray-400 dark:border-gray-700 px-4 py-2">{{ $rent->rentID }}</td>
                                            <td class="border border-gray-400 dark:border-gray-700 px-4 py-2">{{ $rent->carName }}</td>
                                            <td class="border border-gray-400 dark:border-gray-700 px-4 py-2">{{ $rent->carPrice }}/day</td>
                                            <td class="border border-gray-400 dark:border-gray-700 px-4 py-2">{{ \Carbon\Carbon::parse($rent->dateRequested)->format('M d, Y') }}</td>
                                            <td class="border border-gray-400 dark:border-gray-700 px-4 py-2">{{ $rent->duration }} days</td>
                                            <td class="border border-gray-400 dark:border-gray-700 px-4 py-2">₱{{ $rent->total }}</td>
                                            <td class="border border-gray-400 dark:border-gray-700 px-4 py-2">{{ $rent->pickup }}</td>
                                            <td class="border border-gray-400 dark:border-gray-700 px-4 py-2">{{ $rent->dropoff }}</td>
                                            <td class="border border-gray-400 dark:border-gray-700 px-4 py-2">{{ ucfirst($rent->rentStatus) }}</td>
                                            <td class="border border-gray-400 dark:border-gray-700 px-4 py-2">
                                                <div class="flex space-x-2">
                                                    @if ($rent->rentStatus === 'pending' || ($rent->rentStatus === 'rented' && \Carbon\Carbon::parse($rent->rentDate)->diffInHours(now()) <= 24))
                                                        <form action="{{ route('dashboard.cancelRental', $rent->rentID) }}" method="POST" onsubmit="return confirm('Are you sure you want to cancel this rental?');">
                                                            @csrf
                                                            <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-500">
                                                                Cancel
                                                            </button>
                                                        </form>
                                                    @endif
                                                    
                                                    <!-- Only show delete button if the rental status is not "rented" -->
                                                    @if ($rent->rentStatus !== 'rented')
                                                        <form action="{{ route('dashboard.deleteRental', $rent->rentID) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this record?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="bg-gray-600 text-white px-3 py-1 rounded hover:bg-gray-500">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    @else
                                                        <!-- Optionally disable the delete button -->
                                                        <button type="button" class="bg-gray-600 text-white px-3 py-1 rounded hover:bg-gray-500 cursor-not-allowed" disabled >
                                                            Delete
                                                        </button>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
