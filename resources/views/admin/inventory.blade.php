<x-app-layout>
        <x-slot name="header">
        <h2 class="font-semibold text-4xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Car Inventory') }}
        </h2>
    </x-slot>
    <div class="py-12">
                            <!-- Buttons for toggling tables -->
                    <div class="flex mb-4 justify-center">
                        <button id="inventoryBtn" class="toggle-button text-white text-2xl font-bold py-2 px-4 rounded-l-lg bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 focus:outline-none">
                            Inventory
                        </button>
                        <button id="stocksBtn" class="toggle-button text-white text-2xl font-bold py-2 px-4 rounded-r-lg bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 focus:outline-none">
                            Stocks
                        </button>
                    </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">



                    <!-- Search Form -->
                    <form method="GET" action="{{ route('admin.inventory') }}" class="mb-6" id="searchForm">
                        <div class="flex items-center space-x-2">
                            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by car type, name, or license" class="text-black border border-gray-400 px-4 py-2 rounded">
                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-500">Search</button>

                            <!-- Checkbox for Available filter -->
                            <div class="flex items-center space-x-2 ml-4">
                                <input type="checkbox" id="available" name="filter[available]" value="1" {{ request('filter.available') ? 'checked' : '' }} class="h-4 w-4 text-blue-600">
                                <label for="available" class="text-white">Available</label>
                            </div>
                        </div>
                    </form>

                    @if(request('search'))
                        <p style="color: white; text-align: center; margin-bottom: 20px;">
                            Showing results for: <strong>{{ request('search') }}</strong>
                        </p>
                    @endif

                    <!-- Inventory Table -->
                    <div id="inventoryTable" class="table-container">
                        @if($cars->isEmpty())
                            <p>No cars available in the inventory.</p>
                        @else
                            <table class="table-auto w-full text-left border-collapse border border-gray-400 dark:border-gray-700">
                                <thead>
                                    <tr>
                                        <th class="border border-gray-400 dark:border-gray-700 px-4 py-2">Car Name</th>
                                        <th class="border border-gray-400 dark:border-gray-700 px-4 py-2">Car License</th>
                                        <th class="border border-gray-400 dark:border-gray-700 px-4 py-2">Car Type</th>
                                        <th class="border border-gray-400 dark:border-gray-700 px-4 py-2">Car Price</th>
                                        <th class="border border-gray-400 dark:border-gray-700 px-4 py-2">Car Status</th>
                                        <th class="border border-gray-400 dark:border-gray-700 px-4 py-2 text-center">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cars as $car)
                                        <tr>
                                            <td class="border border-gray-400 dark:border-gray-700 px-4 py-2">{{ $car->carName }}</td>
                                            <td class="border border-gray-400 dark:border-gray-700 px-4 py-2">{{ $car->carLicense }}</td>
                                            <td class="border border-gray-400 dark:border-gray-700 px-4 py-2">{{ $car->carType }}</td>
                                            <td class="border border-gray-400 dark:border-gray-700 px-4 py-2">{{ $car->carPrice }}</td>
                                            <td class="border border-gray-400 dark:border-gray-700 px-4 py-2">{{ ucfirst($car->carStatus) }}</td>
                                            <td class="border border-gray-400 dark:border-gray-700 px-4 py-2">
                                            <form action="{{ route('admin.deleteCar', $car) }}" method="POST" id="delete-form-{{ $car->id }}" onsubmit="return confirmDeletion(event, '{{ $car->carStatus }}', {{ $car->id }})">
                                                @csrf
                                                @method('DELETE')
                                                <div class="flex justify-center">
                                                    <button type="submit" class="bg-transparent text-red-500 border-2 border-gray-300 px-4 py-1 text-sm font-small rounded-md hover:bg-gray-700 hover:border-gray-400 transition duration-300 ease-in-out">
                                                        x
                                                    </button>
                                                </div>
                                            </form>
                                        </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>

                    <!-- Car Stocks Table -->
                    <div id="stocksTable" class="table-container hidden">
                        @if($carStocks->isEmpty())
                            <p>No car stocks available.</p>
                        @else
                            <table class="table-auto w-full text-left border-collapse border border-gray-400 dark:border-gray-700">
                                <thead>
                                    <tr>
                                        <th class="border border-gray-400 dark:border-gray-700 px-4 py-2">Car Name</th>
                                        <th class="border border-gray-400 dark:border-gray-700 px-4 py-2">Available Stocks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($carStocks as $stock)
                                        <tr>
                                            <td class="border border-gray-400 dark:border-gray-700 px-4 py-2">{{ $stock->carName }}</td>
                                            <td class="border border-gray-400 dark:border-gray-700 px-4 py-2">{{ $stock->carCount }}</td>
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

    <!-- JavaScript for toggling the tables and auto-submit on checkbox -->
    <script>
        document.getElementById("inventoryBtn").addEventListener("click", function() {
            document.getElementById("inventoryTable").classList.remove("hidden");
            document.getElementById("stocksTable").classList.add("hidden");
        });

        document.getElementById("stocksBtn").addEventListener("click", function() {
            document.getElementById("stocksTable").classList.remove("hidden");
            document.getElementById("inventoryTable").classList.add("hidden");
        });

        // Auto-submit the form when checkbox is toggled
        document.getElementById("available").addEventListener("change", function() {
            document.getElementById("searchForm").submit();
        });
            function confirmDeletion(event, status, carId) {
        if (status === 'rented') {
            // Prevent form submission if the car is rented
            event.preventDefault();
            alert('This car is currently rented and cannot be deleted.');
        } else {
            // Proceed with the deletion if the car is not rented
            return confirm('Are you sure you want to delete this car?');
        }
    }
    </script>
</x-app-layout>
