<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Rental History') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-transparent border border-gray-400 dark:border-gray-700 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-bold mb-4">Your Rental History</h3>

                    @if($rentals->isEmpty())
                        <p>You have no rental history at the moment.</p>
                    @else
                        <table class="table-auto w-full text-left border-collapse border border-gray-400 dark:border-gray-700">
                            <thead>
                                <tr>
                                    <th class="border border-gray-400 dark:border-gray-700 px-4 py-2">Rent ID</th>
                                    <th class="border border-gray-400 dark:border-gray-700 px-4 py-2">Car Name</th>
                                    <th class="border border-gray-400 dark:border-gray-700 px-4 py-2">Price</th>
                                    <th class="border border-gray-400 dark:border-gray-700 px-4 py-2">Date Requested</th>
                                    <th class="border border-gray-400 dark:border-gray-700 px-4 py-2">Duration</th>
                                    <th class="border border-gray-400 dark:border-gray-700 px-4 py-2">Total</th>
                                    <th class="border border-gray-400 dark:border-gray-700 px-4 py-2">Status</th>
                                    <th class="border border-gray-400 dark:border-gray-700 px-4 py-2 text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rentals as $rent)
                                    <tr>
                                        <td class="border border-gray-400 dark:border-gray-700 px-4 py-2">{{ $rent->rentID }}</td>
                                        <td class="border border-gray-400 dark:border-gray-700 px-4 py-2">{{ $rent->carName }}</td>
                                        <td class="border border-gray-400 dark:border-gray-700 px-4 py-2">{{ $rent->carPrice }}/day</td>
                                        <td class="border border-gray-400 dark:border-gray-700 px-4 py-2">{{ \Carbon\Carbon::parse($rent->dateRequested)->format('M d, Y') }}</td>
                                        <td class="border border-gray-400 dark:border-gray-700 px-4 py-2">{{ $rent->duration }} days</td>
                                        <td class="border border-gray-400 dark:border-gray-700 px-4 py-2">₱{{ $rent->total }}</td>
                                        <td class="border border-gray-400 dark:border-gray-700 px-4 py-2
                                            @if($rent->rentStatus == 'rented')
                                                text-green-500
                                            @elseif($rent->rentStatus == 'cancelled')
                                                text-yellow-500
                                            @elseif($rent->rentStatus == 'declined')
                                                text-red-500
                                            @endif">
                                            {{ ucfirst($rent->rentStatus) }}
                                        </td>
                                        <td class="border border-gray-400 dark:border-gray-700 px-4 py-2 text-center">
                                        <div class="flex justify-center space-x-2">
                                            <!-- Display delete button if the rental status is cancelled or declined -->
                                            @if ($rent->rentStatus == 'cancelled' || $rent->rentStatus == 'declined')
                                            <form action="{{ route('user.renthistory.deleteRental', $rent->rentID) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this record?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-500">
                                                    Delete
                                                </button>
                                            </form>


                                            @else
                                                <!-- Optionally, display a disabled delete button -->
                                                <button type="button" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-500 cursor-not-allowed" disabled>
                                                    Delete
                                                </button>
                                            @endif
                                        </div>
                                    </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
