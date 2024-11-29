<x-app-layout>
        <x-slot name="header">
        <h2 class="font-semibold text-4xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Rentals') }}
        </h2>
    </x-slot>
    <div class="py-12 ">
        
                    <!-- Toggle Buttons -->
                    <div class="flex mb-4 justify-center ">
                        <button id="requestBtn" class="toggle-button text-white text-2xl font-bold py-2 px-4 rounded-l-lg bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 focus:outline-none">
                            Request
                        </button>
                        <button id="historyBtn" class="toggle-button text-white text-2xl font-bold py-2 px-4 rounded-r-lg bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 focus:outline-none">
                            History
                        </button>
                    </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">


                    <!-- Request Table -->
                    <div id="requestTable">
                        <h3 class="text-2xl font-bold mb-4">Pending Rentals</h3>
                        @if($pendingRents->isEmpty())
                            <p>No pending rental requests at the moment.</p>
                        @else
                            <table class="table-auto w-full text-left border-collapse border border-gray-400 dark:border-gray-700">
                                <thead>
                                    <tr>
                                        <th class="border border-gray-400 dark:border-gray-700 px-4 py-2">Rent ID</th>
                                        <th class="border border-gray-400 dark:border-gray-700 px-4 py-2">User</th>
                                        <th class="border border-gray-400 dark:border-gray-700 px-4 py-2">Car Name</th>
                                        <th class="border border-gray-400 dark:border-gray-700 px-4 py-2">Price</th>
                                        <th class="border border-gray-400 dark:border-gray-700 px-4 py-2">Duration</th>
                                        <th class="border border-gray-400 dark:border-gray-700 px-4 py-2">Pickup</th>
                                        <th class="border border-gray-400 dark:border-gray-700 px-4 py-2">Dropoff</th>
                                        <th class="border border-gray-400 dark:border-gray-700 px-4 py-2">Total</th>
                                        <th class="border border-gray-400 dark:border-gray-700 px-4 py-2">Date Requested</th>
                                        <th class="border border-gray-400 dark:border-gray-700 px-4 py-2">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pendingRents as $rent)
                                        <tr>
                                            <td class="border border-gray-400 dark:border-gray-700 px-4 py-2">{{ $rent->rentID }}</td>
                                            <td class="border border-gray-400 dark:border-gray-700 px-4 py-2">{{ $rent->user->name }}</td>
                                            <td class="border border-gray-400 dark:border-gray-700 px-4 py-2">{{ $rent->carName }}</td>
                                            <td class="border border-gray-400 dark:border-gray-700 px-4 py-2">{{ $rent->carPrice }}/day</td>
                                            <td class="border border-gray-400 dark:border-gray-700 px-4 py-2">{{ $rent->duration }} days</td>
                                            <td class="border border-gray-400 dark:border-gray-700 px-4 py-2">{{ $rent->pickup }}</td>
                                            <td class="border border-gray-400 dark:border-gray-700 px-4 py-2">{{ $rent->dropoff }}</td>
                                            <td class="border border-gray-400 dark:border-gray-700 px-4 py-2">₱{{ number_format($rent->total, 2) }}</td>
                                            <td class="border border-gray-400 dark:border-gray-700 px-4 py-2">
                                                {{ \Carbon\Carbon::parse($rent->dateRequested)->format('M d, Y') }}
                                            </td>
                                            <td class="border border-gray-400 dark:border-gray-700 px-4 py-2">
                                                <div class="flex space-x-2">
                                                    <form action="{{ route('admin.approveRent', $rent->rentID) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-500">
                                                            Approve
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('admin.declineRent', $rent->rentID) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-500">
                                                            Decline
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>

                    <!-- History Table -->
                    <div id="historyTable" class="hidden">
                        <h3 class="text-2xl font-bold mb-4">Rental History</h3>
                        @if($rentalHistory->isEmpty())
                            <p>No rental history available.</p>
                        @else
                            <table class="table-auto w-full text-left border-collapse border border-gray-400 dark:border-gray-700">
                                <thead>
                                    <tr>
                                        <th class="border border-gray-400 dark:border-gray-700 px-4 py-2">Rent ID</th>
                                        <th class="border border-gray-400 dark:border-gray-700 px-4 py-2">User</th>
                                        <th class="border border-gray-400 dark:border-gray-700 px-4 py-2">Car Name</th>
                                        <th class="border border-gray-400 dark:border-gray-700 px-4 py-2">Car License</th>
                                        <th class="border border-gray-400 dark:border-gray-700 px-4 py-2">Price</th>
                                        <th class="border border-gray-400 dark:border-gray-700 px-4 py-2">Duration</th>
                                        <th class="border border-gray-400 dark:border-gray-700 px-4 py-2">Total</th>
                                        <th class="border border-gray-400 dark:border-gray-700 px-4 py-2">Pickup</th>
                                        <th class="border border-gray-400 dark:border-gray-700 px-4 py-2">Dropoff</th>
                                        <th class="border border-gray-400 dark:border-gray-700 px-4 py-2">Date Rented</th>
                                        <th class="border border-gray-400 dark:border-gray-700 px-4 py-2">Return Date</th>
                                        <th class="border border-gray-400 dark:border-gray-700 px-4 py-2">Rent Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rentalHistory as $rent)
                                        <tr>
                                            <td class="border border-gray-400 dark:border-gray-700 px-4 py-2">{{ $rent->rentID }}</td>
                                            <td class="border border-gray-400 dark:border-gray-700 px-4 py-2">{{ $rent->user->name }}</td>
                                            <td class="border border-gray-400 dark:border-gray-700 px-4 py-2">{{ $rent->carName }}</td>
                                            <td class="border border-gray-400 dark:border-gray-700 px-4 py-2">{{ $rent->carLicense }}</td>
                                            <td class="border border-gray-400 dark:border-gray-700 px-4 py-2">{{ $rent->carPrice }}/day</td>
                                            <td class="border border-gray-400 dark:border-gray-700 px-4 py-2">{{ $rent->duration }} days</td>
                                            <td class="border border-gray-400 dark:border-gray-700 px-4 py-2">₱{{ number_format($rent->total, 2) }}</td>
                                            <td class="border border-gray-400 dark:border-gray-700 px-4 py-2">{{ $rent->pickup }}</td>
                                            <td class="border border-gray-400 dark:border-gray-700 px-4 py-2">{{ $rent->dropoff }}</td>
                                            <td class="border border-gray-400 dark:border-gray-700 px-4 py-2">
                                                {{ \Carbon\Carbon::parse($rent->dateRented)->format('M d, Y') }}
                                            </td>
                                            <td class="border border-gray-400 dark:border-gray-700 px-4 py-2">
                                                {{ \Carbon\Carbon::parse($rent->returnDate)->format('M d, Y') }}
                                            </td>
                                            <td class="border border-gray-400 dark:border-gray-700 px-4 py-2">
                                                {{ ucfirst($rent->rentStatus) }} <!-- Display Rent Status -->
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
    </div>
</x-app-layout>


<script>
    // Toggle visibility of requestTable and historyTable
    document.getElementById("requestBtn").addEventListener("click", function() {
        document.getElementById("requestTable").classList.remove("hidden");
        document.getElementById("historyTable").classList.add("hidden");
    });

    document.getElementById("historyBtn").addEventListener("click", function() {
        document.getElementById("historyTable").classList.remove("hidden");
        document.getElementById("requestTable").classList.add("hidden");
    });
</script>


