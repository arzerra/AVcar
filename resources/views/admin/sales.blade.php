<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-4xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Rent Sales') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-transparent border border-gray-400 dark:border-gray-700 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 ">
                    <!-- Filter form -->
                    <form  method="GET" action="{{ route('admin.sales') }}">
                        <div class="flex space-x-4 items-center mb-4">
                                    <!-- Customer Name filter -->
                            <div class="flex items-center">
                                <label for="customer_name" class="mr-2 text-white">Customer Name:</label>
                                <input 
                                    type="text" 
                                    name="customer_name" 
                                    id="customer_name" 
                                    value="{{ request('customer_name') }}" 
                                    class="text-black border border-gray-400 rounded px-2 py-1" 
                                    placeholder="Customer Name"
                                />
                            </div>
                            <!-- Month filter -->
                            <div class="flex items-center">
                                <label for="month" class="mr-2 text-white">Month:</label>
                                <select name="month" id="month" class="text-black border border-gray-400 rounded px-2 py-1">
                                    <option value="">All</option>
                                    <option value="1" {{ request('month') == '1' ? 'selected' : '' }}>January&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                                    <option value="2" {{ request('month') == '2' ? 'selected' : '' }}>February&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                                    <option value="3" {{ request('month') == '3' ? 'selected' : '' }}>March&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                                    <option value="4" {{ request('month') == '4' ? 'selected' : '' }}>April&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                                    <option value="5" {{ request('month') == '5' ? 'selected' : '' }}>May&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                                    <option value="6" {{ request('month') == '6' ? 'selected' : '' }}>June&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                                    <option value="7" {{ request('month') == '7' ? 'selected' : '' }}>July&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                                    <option value="8" {{ request('month') == '8' ? 'selected' : '' }}>August&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                                    <option value="9" {{ request('month') == '9' ? 'selected' : '' }}>September&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                                    <option value="10" {{ request('month') == '10' ? 'selected' : '' }}>October&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                                    <option value="11" {{ request('month') == '11' ? 'selected' : '' }}>November&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                                    <option value="12" {{ request('month') == '12' ? 'selected' : '' }}>December&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                                </select>
                            </div>

                            <!-- Year filter -->
                            <div class="flex items-center">
                                <label for="year" class="mr-2 text-white">Year:</label>
                                <input type="number" name="year" id="year" value="{{ request('year') ?: \Carbon\Carbon::now()->year }}" class="text-black border border-gray-400 rounded px-2 py-1" placeholder="Year" />
                            </div>

                            <!-- Specific Date filter -->
                            <div class="flex items-center">
                                <label for="date" class="mr-2 text-white">Specific Date:</label>
                                <input type="date" name="date" id="date" value="{{ request('date') }}" class="text-black border border-gray-400 rounded px-2 py-1" />
                            </div>

                            <!-- Filter button -->
                            <button type="submit" class="bg-blue-600 text-white px-8 py-2 rounded hover:bg-blue-500">Filter</button>
                        </div>
                    </form>

                    <!-- Displaying Rent Data -->
                    @if($rents->isEmpty())
                        <p>No rental records found.</p>
                    @else
                        <table class="table-auto w-full text-left border-collapse border border-gray-400 dark:border-gray-700">
                            <thead>
                                <tr>
                                    <th class="border border-gray-400 dark:border-gray-700 px-4 py-2">Customer</th>
                                    <th class="border border-gray-400 dark:border-gray-700 px-4 py-2">Rent ID</th>
                                    <th class="border border-gray-400 dark:border-gray-700 px-4 py-2">Car Name</th>
                                    <th class="border border-gray-400 dark:border-gray-700 px-4 py-2">Rent Date</th>
                                    <th class="border border-gray-400 dark:border-gray-700 px-4 py-2">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rents as $rent)
                                    <tr>
                                        <td class="border border-gray-400 dark:border-gray-700 px-4 py-2">{{ $rent->user->name }}</td>
                                        <td class="border border-gray-400 dark:border-gray-700 px-4 py-2">{{ $rent->rentID }}</td>
                                        <td class="border border-gray-400 dark:border-gray-700 px-4 py-2">{{ $rent->car->carName }}</td>
                                        <td class="border border-gray-400 dark:border-gray-700 px-4 py-2">{{ \Carbon\Carbon::parse($rent->rentDate)->format('M d, Y') }}</td>
                                        <td class="border border-gray-400 dark:border-gray-700 px-4 py-2">₱{{ number_format($rent->total, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="mt-4 flex justify-between items-center font-semibold">
                            <p class="text-xl">Total Sales: ₱{{ number_format($totalSales, 2) }}</p>

                            <form action="{{ route('admin.sales.download') }}" method="GET" >
                                <input type="hidden" name="month" value="{{ request('month') }}">
                                <input type="hidden" name="year" value="{{ request('year') }}">
                                <input type="hidden" name="date" value="{{ request('date') }}">
                                
                                <button type="submit" class="border border-gray-400 dark:border-gray-700 bg-transparent text-white px-4 py-2 text-1xl rounded hover:bg-gray-500">
                                    Download Sales
                                </button>
                            </form>
                        </div>

                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
