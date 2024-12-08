<style>
    .car-image {
    width: 100%;
    max-width: 300px;
    height: auto;
    margin-bottom: 15px;
}

</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-4xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Rent Process') }}
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 py-6">
        <div class="bg-transparent border border-gray-400 dark:border-gray-700 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">

            <a href="javascript:history.back()">
                <button class="cursor-pointer duration-200 hover:scale-110 active:scale-100 flex items-center space-x-2" title="Go Back">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="25px" viewBox="0 0 24 24" class="stroke-white">
                        <path stroke-linejoin="round" stroke-linecap="round" stroke-width="1.5" d="M11 6L5 12M5 12L11 18M5 12H19"></path>
                    </svg>
                    <span class="text-white">Back</span>
                </button>
            </a>
@php
                    $carDetails = [
// Economy
'Toyota Vios' => [
    'type' => 'Economy', 
    'price' => '₱750/Day',
    'seating' => '5 People',
    'fueltype' => 'Gasoline',
    'tankcaps' => '42L',
    'trans' => 'Automatic',
    'rental' => '₱750/Day',
    'imgSrc' => 'car1.png',  // Add image source
],
'Mitsubishi Mirage' => [
    'type' => 'Economy',
    'price' => '₱600/Day',
    'seating' => '5 People',
    'fueltype' => 'Gasoline',
    'tankcaps' => '40L',
    'trans' => 'Manual',
    'rental' => '₱600/Day',
    'imgSrc' => 'car2.png',  // Add image source
],
'Honda City' => [
    'type' => 'Economy',
    'price' => '₱800/Day',
    'seating' => '5 People',
    'fueltype' => 'Gasoline',
    'tankcaps' => '42L',
    'trans' => 'Automatic',
    'rental' => '₱800/Day',
    'imgSrc' => 'car3.png',  // Add image source
],
'Suzuki Alto' => [
    'type' => 'Economy',
    'price' => '₱450/Day',
    'seating' => '4 People',
    'fueltype' => 'Gasoline',
    'tankcaps' => '35L',
    'trans' => 'Automatic',
    'rental' => '₱450/Day',
    'imgSrc' => 'car4.png',  // Add image source
],

    // Compact
'Suzuki Swift' => [
    'type' => 'Compact',
    'price' => '₱500/Day',
    'seating' => '5 People',
    'fueltype' => 'Gasoline',
    'tankcaps' => '37L',
    'trans' => 'Manual',
    'rental' => '₱500/Day',
    'imgSrc' => 'car1.png',  // Add image source
],
'Hyundai Accent' => [
    'type' => 'Compact',
    'price' => '₱600/Day',
    'seating' => '5 People',
    'fueltype' => 'Gasoline',
    'tankcaps' => '45L',
    'trans' => 'Manual',
    'rental' => '₱600/Day',
    'imgSrc' => 'car2.png',  // Add image source
],
'Kia Rio' => [
    'type' => 'Compact',
    'price' => '₱650/Day',
    'seating' => '5 People',
    'fueltype' => 'Gasoline',
    'tankcaps' => '45L',
    'trans' => 'Automatic',
    'rental' => '₱650/Day',
    'imgSrc' => 'car3.png',  // Add image source
],
'Nissan Almera' => [
    'type' => 'Compact',
    'price' => '₱700/Day',
    'seating' => '4 People',
    'fueltype' => 'Gasoline',
    'tankcaps' => '41L',
    'trans' => 'Automatic',
    'rental' => '₱700/Day',
    'imgSrc' => 'car4.png',  // Add image source
],



                        // Fullsize
'Toyota Camry' => [
    'type' => 'Fullsize',
    'price' => '₱1250/Day',
    'seating' => '5 People',
    'fueltype' => 'Gasoline',
    'tankcaps' => '70L',
    'trans' => 'Manual',
    'rental' => '₱1250/Day',
    'imgSrc' => 'car1.png',  // Add image source
],
'Honda Accord' => [
    'type' => 'Fullsize',
    'price' => '₱1260/Day',
    'seating' => '5 People',
    'fueltype' => 'Gasoline',
    'tankcaps' => '65L',
    'trans' => 'Manual',
    'rental' => '₱1260/Day',
    'imgSrc' => 'car2.png',  // Add image source
],
'Hyundai Sonata' => [
    'type' => 'Fullsize',
    'price' => '₱1300/Day',
    'seating' => '5 People',
    'fueltype' => 'Gasoline',
    'tankcaps' => '70L',
    'trans' => 'Automatic',
    'rental' => '₱1300/Day',
    'imgSrc' => 'car3.png',  // Add image source
],
'Kia Optima' => [
    'type' => 'Fullsize',
    'price' => '₱1700/Day',
    'seating' => '5 People',
    'fueltype' => 'Gasoline',
    'tankcaps' => '70L',
    'trans' => 'Automatic',
    'rental' => '₱1700/Day',
    'imgSrc' => 'car4.png',  // Add image source
],


// Luxury
'BMW 3-Series' => [
    'type' => 'Luxury',
    'price' => '₱3750/Day',
    'seating' => '5 People',
    'fueltype' => 'Gasoline',
    'tankcaps' => '60L',
    'trans' => 'Automatic',
    'rental' => '₱3750/Day',
    'imgSrc' => 'car1.png',  // Add image source
],
'Mercedes-Benz C-Class' => [
    'type' => 'Luxury',
    'price' => '₱4500/Day',
    'seating' => '5 People',
    'fueltype' => 'Gasoline',
    'tankcaps' => '66L',
    'trans' => 'Manual',
    'rental' => '₱4500/Day',
    'imgSrc' => 'car2.png',  // Add image source
],
'Audi A4' => [
    'type' => 'Luxury',
    'price' => '₱4250/Day',
    'seating' => '5 People',
    'fueltype' => 'Gasoline',
    'tankcaps' => '54L',
    'trans' => 'Manual',
    'rental' => '₱4250/Day',
    'imgSrc' => 'car3.png',  // Add image source
],
'Jaguar XJ' => [
    'type' => 'Luxury',
    'price' => '₱6000/Day',
    'seating' => '5 People',
    'fueltype' => 'Gasoline',
    'tankcaps' => '77L',
    'trans' => 'Automatic',
    'rental' => '₱6000/Day',
    'imgSrc' => 'car4.png',  // Add image source
],


// SUV
'Toyota Fortuner' => [
    'type' => 'SUV',
    'price' => '₱2000/Day',
    'seating' => '7 People',
    'fueltype' => 'Gasoline',
    'tankcaps' => '80L',
    'trans' => 'Automatic',
    'rental' => '₱2000/Day',
    'imgSrc' => 'car1.png',  // Add image source
],
'Mitsubishi Montero Sport' => [
    'type' => 'SUV',
    'price' => '₱2500/Day',
    'seating' => '7 People',
    'fueltype' => 'Gasoline',
    'tankcaps' => '68L',
    'trans' => 'Manual',
    'rental' => '₱2500/Day',
    'imgSrc' => 'car2.png',  // Add image source
],
'Ford Everest' => [
    'type' => 'SUV',
    'price' => '₱2200/Day',
    'seating' => '7 People',
    'fueltype' => 'Gasoline',
    'tankcaps' => '80L',
    'trans' => 'Manual',
    'rental' => '₱2200/Day',
    'imgSrc' => 'car3.png',  // Add image source
],
'Nissan Terra' => [
    'type' => 'SUV',
    'price' => '₱2250/Day',
    'seating' => '7 People',
    'fueltype' => 'Gasoline',
    'tankcaps' => '80L',
    'trans' => 'Automatic',
    'rental' => '₱2250/Day',
    'imgSrc' => 'car4.png',  // Add image source
],


// VAN
'Mitsubishi L300' => [
    'type' => 'VAN',
    'price' => '₱450/Day',
    'seating' => '17 People',
    'fueltype' => 'Gasoline',
    'tankcaps' => '55L',
    'trans' => 'Automatic',
    'rental' => '₱450/Day',
    'imgSrc' => 'car1.png',  // Add image source
],
'Toyota Hiace Commuter' => [
    'type' => 'VAN',
    'price' => '₱2000/Day',
    'seating' => '15 People',
    'fueltype' => 'Gasoline',
    'tankcaps' => '70L',
    'trans' => 'Manual',
    'rental' => '₱2000/Day',
    'imgSrc' => 'car2.png',  // Add image source
],
'Hyundai Starex 2007' => [
    'type' => 'VAN',
    'price' => '₱1500/Day',
    'seating' => '10 People',
    'fueltype' => 'Gasoline',
    'tankcaps' => '75L',
    'trans' => 'Manual',
    'rental' => '₱1500/Day',
    'imgSrc' => 'car3.png',  // Add image source
],
'Kia Grand Carnival' => [
    'type' => 'VAN',
    'price' => '₱2750/Day',
    'seating' => '11 People',
    'fueltype' => 'Gasoline',
    'tankcaps' => '80L',
    'trans' => 'Automatic',
    'rental' => '₱2750/Day',
    'imgSrc' => 'car4.png',  // Add image source
],


// Sports
'Mazda MX-5 Miata' => [
    'type' => 'Sport',
    'price' => '₱3500/Day',
    'seating' => '2 People',
    'fueltype' => 'Gasoline',
    'tankcaps' => '45L',
    'trans' => 'Automatic',
    'rental' => '₱3500/Day',
    'imgSrc' => 'car1.png',  // Add image source
],
'Ford Mustang GT' => [
    'type' => 'Sport',
    'price' => '₱5000/Day',
    'seating' => '4 People',
    'fueltype' => 'Gasoline',
    'tankcaps' => '60L',
    'trans' => 'Manual',
    'rental' => '₱5000/Day',
    'imgSrc' => 'car2.png',  // Add image source
],
'Toyota 86' => [
    'type' => 'Sport',
    'price' => '₱3200/Day',
    'seating' => '4 People',
    'fueltype' => 'Gasoline',
    'tankcaps' => '50L',
    'trans' => 'Manual',
    'rental' => '₱3200/Day',
    'imgSrc' => 'car3.png',  // Add image source
],
'Subaru BRZ' => [
    'type' => 'Sport',
    'price' => '₱2750/Day',
    'seating' => '4 People',
    'fueltype' => 'Gasoline',
    'tankcaps' => '65L',
    'trans' => 'Automatic',
    'rental' => '₱2750/Day',
    'imgSrc' => 'car4.png',  // Add image source
],


// Truck
'Isuzu N-Series NHR' => [
    'type' => 'Truck',
    'price' => '₱1750/Day',
    'seating' => '3 People',
    'fueltype' => 'Diesel',
    'tankcaps' => '50L',
    'trans' => 'Manual',
    'rental' => '₱1750/Day',
    'imgSrc' => 'car1.png',  // Add image source
],
'Mitsubishi Fuso Canter' => [
    'type' => 'Truck',
    'price' => '₱2000/Day',
    'seating' => '3 People',
    'fueltype' => 'Diesel',
    'tankcaps' => '100L',
    'trans' => 'Manual',
    'rental' => '₱2000/Day',
    'imgSrc' => 'car2.png',  // Add image source
],
'Hyundai H-100' => [
    'type' => 'Truck',
    'price' => '₱1700/Day',
    'seating' => '3 People',
    'fueltype' => 'Diesel',
    'tankcaps' => '65L',
    'trans' => 'Manual',
    'rental' => '₱1700/Day',
    'imgSrc' => 'car3.png',  // Add image source
],
'Foton Tornado' => [
    'type' => 'Truck',
    'price' => '₱1800/Day',
    'seating' => '3 People',
    'fueltype' => 'Gasoline',
    'tankcaps' => '65L',
    'trans' => 'Manual',
    'rental' => '₱1800/Day',
    'imgSrc' => 'car4.png',  // Add image source
],


// E-Cars
'Luxeed S7' => [
    'type' => 'ECars',
    'price' => '₱7000/Day',
    'seating' => '5 People',
    'fueltype' => 'Electric (EV)',
    'tankcaps' => '365kW',
    'trans' => 'Automatic',
    'rental' => '₱7000/Day',
    'imgSrc' => 'car1.jpg',  // Add image source
],
'JiYue ROBO-02' => [
    'type' => 'ECars',
    'price' => '₱5000/Day',
    'seating' => '5 People',
    'fueltype' => 'Electric (EV)',
    'tankcaps' => '400kW',
    'trans' => 'Automatic',
    'rental' => '₱5000/Day',
    'imgSrc' => 'car2.jpg',  // Add image source
],
'BMW i4' => [
    'type' => 'ECars',
    'price' => '₱4800/Day',
    'seating' => '5 People',
    'fueltype' => 'Electric (EV)',
    'tankcaps' => '460kW',
    'trans' => 'Automatic',
    'rental' => '₱4800/Day',
    'imgSrc' => 'car3.jpg',  // Add image source
],
'BYD Seal U' => [
    'type' => 'ECars',
    'price' => '₱6500/Day',
    'seating' => '5 People',
    'fueltype' => 'Electric (EV)',
    'tankcaps' => '500kW',
    'trans' => 'Automatic',
    'rental' => '₱6500/Day',
    'imgSrc' => 'car4.jpg',  // Add image source
],

                    ];

                    $carName = request('carName');
                    $details = $carDetails[$carName] ?? null;
                @endphp
                @if ($details)
                    <div class="text-center">
                        <h3 class="text-2xl font-semibold">Car Details</h3>
                <img src="{{ asset('images/car-pic-categories/' . strtolower($details['type']) . '/' . $details['imgSrc']) }}" class="car-image mx-auto my-4 rounded-lg" />


                    </div> 
                        <div class="car-details grid grid-cols-2 gap-4 mt-5 ">
                            <p class="ml-10"><strong>Car Name:</strong> {{ request('carName') ?? 'Unknown Car' }}</p>
                            <p class="ml-20"><strong>Car Seating: </strong>{{ $details['seating'] }}</p>
                            <p class="ml-10"><strong>Car Fuel Type: </strong>{{ $details['fueltype'] }}</p>
                            <p class="ml-20"><strong>Car Tank Capacity: </strong>{{ $details['tankcaps'] }}</p>
                            <p class="ml-10"><strong>Car Transmition: </strong>{{ $details['trans'] }}</p>
                            <p class="ml-20"><strong>Car Price: </strong>{{ $details['rental'] }}</p>
                    </div>
                @endif



                <form action="{{ route('processRent') }}" method="POST" class="mt-6">
                    @csrf
                    <input type="hidden" name="carName" value="{{ request('carName') }}">

                    <!-- Number of Rental Days -->
                    <div class="mb-4">
                        <label for="rentDays" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Number of Rental Days
                        </label>
                        <input type="number" name="rentDays" id="rentDays" class="mt-1 block w-full bg-transparent border border-gray-400 dark:border-gray-700 rounded-md shadow-sm sm:text-sm" required>
                    </div>

                    <div class="flex gap-4 mb-4">
                        <!-- Pick-up Location -->
                        <div class="w-full max-w-[320px]">
                            <label for="pickup_location" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pick-up Location</label>
                            <div class="bg-white dark:bg-zinc-900 rounded-lg mt-4">
                                <select name="pickup_location" id="pickup_location" class="text-sm outline-none rounded-lg w-full border border-white dark:border-gray-700 dark:bg-black dark:text-gray-100">
                                    <option value="Maa">Maa</option>
                                    <option value="Agdao">Agdao</option>
                                    <option value="Matina">Matina</option>
                                </select>
                            </div>
                        </div>

                        <!-- Drop-off Location -->
                        <div class="w-full max-w-[320px]">
                            <label for="dropoff_location" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Drop-off Location</label>
                            <div class="bg-white dark:bg-zinc-900 rounded-lg mt-4">
                                <select name="dropoff_location" id="dropoff_location" class="text-sm outline-none rounded-lg w-full border border-white dark:border-gray-700 dark:bg-black dark:text-gray-100">
                                    <option value="Maa">Maa</option>
                                    <option value="Agdao">Agdao</option>
                                    <option value="Matina">Matina</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-6 flex justify-center">
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-green border border-gray-400 dark:border-gray-700 rounded-md font-semibold text-white uppercase tracking-widest hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Proceed
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

