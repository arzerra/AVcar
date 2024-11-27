<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-4xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Rent Process') }}
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 py-6">
        <div class="bg-white dark:bg-zinc-900 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">

            <a href="javascript:history.back()">
                <button class="cursor-pointer duration-200 hover:scale-110 active:scale-100 flex items-center space-x-2" title="Go Back">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="25px" viewBox="0 0 24 24" class="stroke-white">
                        <path stroke-linejoin="round" stroke-linecap="round" stroke-width="1.5" d="M11 6L5 12M5 12L11 18M5 12H19"></path>
                    </svg>
                    <span class="text-white">Back</span>
                </button>
            </a>

                <h3 class="text-2xl font-semibold text-center">Car Details</h3>
                <p class="mt-4">
                    <strong>Car Name:</strong> {{ request('carName') ?? 'Unknown Car' }}
                </p>

                @if(request('carName') === 'Toyota Vios')
                    <p><strong>Details:</strong> Toyota Vios is a compact sedan with a rental price of ₱750/day.</p>
                @elseif(request('carName') === 'Mitsubishi Mirage')
                    <p><strong>Details:</strong> Mitsubishi Mirage is a hatchback with a rental price of ₱600/day.</p>
                @else
                    <p><strong>Details:</strong> No additional information available for this car.</p>
                @endif

                <form action="{{ route('processRent') }}" method="POST" class="mt-6">
                    @csrf
                    <input type="hidden" name="carName" value="{{ request('carName') }}">

                    <!-- Number of Rental Days -->
                    <div class="mb-4">
                        <label for="rentDays" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Number of Rental Days
                        </label>
                        <input type="number" name="rentDays" id="rentDays" class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm dark:bg-zinc-900 focus:ring-white focus:border-white sm:text-sm" required>
                    </div>

                    <!-- Pick-up Location -->
                    <label for="pickup_location" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pick-up Location</label>
                    <div class="mb-4">
                        <div class="bg-white dark:bg-zinc-900 p-4 rounded-lg max-w-[300px]">
                            <select name="pickup_location" id="pickup_location" class="text-sm outline-none rounded-lg h-full border border-white dark:border-gray-700 dark:bg-zinc-900 dark:text-gray-100">
                                <option value="Maa">Maa</option>
                                <option value="Agdao">Agdao</option>
                                <option value="Matina">Matina</option>
                            </select>
                        </div>
                    </div>

                    <!-- Drop-off Location -->
                    <label for="dropoff_location" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Drop-off Location</label>
                    <div class="mb-4">
                        <div class="bg-white dark:bg-zinc-900 p-4 rounded-lg max-w-[300px]">
                            <select name="dropoff_location" id="dropoff_location" class="text-sm outline-none rounded-lg h-full border border-white dark:border-gray-700 dark:bg-zinc-900 dark:text-gray-100">
                                <option value="Maa">Maa</option>
                                <option value="Agdao">Agdao</option>
                                <option value="Matina">Matina</option>
                            </select>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-6 flex justify-center">
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white uppercase tracking-widest hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Proceed
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
