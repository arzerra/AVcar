<style>
    .custom-dropdown-container {
        text-align: center;
        margin-bottom: 10px;
    }
    .dropdown-label {
        display: block;
        margin-bottom: 10px;
        font-weight: bold;
        color: white;
    }
    .custom-dropdown select {
        width: 50%;
        padding: 10px;
        border: 1px solid white;
        border-radius: 5px;
        font-size: 16px;
        background-color: black;
        color: white;
        appearance: none;
        text-align-last: center;
    }
    .form-group label {
        font-size: 14px;
        color: white;
    }
    .form-group input {
        width: 50%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid white;
        background-color: black;
        color: white;
        font-size: 16px;
    }
</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-4xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Car Stock') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="form-container">

            <a href="{{ route('admin.admincars') }}">
                <button class="cursor-pointer duration-200 hover:scale-110 active:scale-100 flex items-center space-x-2" title="Go Back">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="25px" viewBox="0 0 24 24" class="stroke-white">
                        <path stroke-linejoin="round" stroke-linecap="round" stroke-width="1.5" d="M11 6L5 12M5 12L11 18M5 12H19"></path>
                    </svg>
                    <span class="text-white">Back</span>
                </button>
            </a>

            @if (session('success'))
                <div class="alert alert-success bg-black text-green-500 p-3 rounded mb-4 flex justify-center items-center text-xl" style="width: fit-content; margin: auto;">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger bg-red-500 text-white p-3 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('addcar') }}" method="post" class="form">
                @csrf

                <!-- Custom Styled Dropdown -->
                <div class="custom-dropdown-container">
                    <label for="carName" class="dropdown-label">SELECT A CAR</label>
                    <div class="custom-dropdown">
                    <select id="carName" name="carName" required onchange="updateRentalPrice()">
                        <!-- Economy -->
                        <option disabled>Economy</option>
                        <option value="Toyota Vios">Toyota Vios</option>
                        <option value="Mitsubishi Mirage">Mitsubishi Mirage</option>
                        <option value="Honda City">Honda City</option>
                        <option value="Suzuki Alto">Suzuki Alto</option>
                        
                        <!-- Compact -->
                        <option disabled>Compact</option>
                        <option value="Suzuki Swift">Suzuki Swift</option>
                        <option value="Hyundai Accent">Hyundai Accent</option>
                        <option value="Kia Rio">Kia Rio</option>
                        <option value="Nissan Almera">Nissan Almera</option>
                        
                        <!-- Fullsize -->
                        <option disabled>Fullsize</option>
                        <option value="Toyota Camry">Toyota Camry</option>
                        <option value="Honda Accord">Honda Accord</option>
                        <option value="Hyundai Sonata">Hyundai Sonata</option>
                        <option value="Kia Optima">Kia Optima</option>
                        
                        <!-- Luxury -->
                        <option disabled>Luxury</option>
                        <option value="BMW 3-Series">BMW 3-Series</option>
                        <option value="Mercedes-Benz C-Class">Mercedes-Benz C-Class</option>
                        <option value="Audi A4">Audi A4</option>
                        <option value="Jaguar XJ">Jaguar XJ</option>
                        
                        <!-- SUV -->
                        <option disabled>SUV</option>
                        <option value="Toyota Fortuner">Toyota Fortuner</option>
                        <option value="Mitsubishi Montero Sport">Mitsubishi Montero Sport</option>
                        <option value="Ford Everest">Ford Everest</option>
                        <option value="Nissan Terra">Nissan Terra</option>
                        
                        <!-- Van -->
                        <option disabled>Van</option>
                        <option value="Mitsubishi L300">Mitsubishi L300</option>
                        <option value="Toyota Hiace Commuter">Toyota Hiace Commuter</option>
                        <option value="Hyundai Starex 2007">Hyundai Starex 2007</option>
                        <option value="Kia Grand Carnival">Kia Grand Carnival</option>
                        
                        <!-- Sports -->
                        <option disabled>Sports</option>
                        <option value="Mazda MX-5 Miata">Mazda MX-5 Miata</option>
                        <option value="Ford Mustang GT">Ford Mustang GT</option>
                        <option value="Toyota 86">Toyota 86</option>
                        <option value="Subaru BRZ">Subaru BRZ</option>
                        
                        <!-- Trucks -->
                        <option disabled>Trucks</option>
                        <option value="Isuzu N-Series NHR">Isuzu N-Series NHR</option>
                        <option value="Mitsubishi Fuso Canter">Mitsubishi Fuso Canter</option>
                        <option value="Hyundai H-100">Hyundai H-100</option>
                        <option value="Foton Tornado">Foton Tornado</option>
                        
                        <!-- Electric Vehicles -->
                        <option disabled>Electric Vehicles</option>
                        <option value="Luxeed S7">Luxeed S7</option>
                        <option value="JiYue ROBO-02">JiYue ROBO-02</option>
                        <option value="BMW i4">BMW i4</option>
                        <option value="BYD Seal U">BYD Seal U</option>
                    </select>

                    </div>
                </div>

                <!-- License Plate Input -->
                <div class="form-group">
                    <label for="carLicense">License Plate</label>
                    <input type="text" id="carLicense" name="carLicense" required=""/>

                    <!-- Display error message if license plate already exists -->
                    @if ($errors->has('carLicense'))
                        <div class="text-red-500 text-sm mt-2">
                            {{ $errors->first('carLicense') }}
                        </div>
                    @endif
                </div>

                <!-- Rental Price Input -->
                <div class="form-group">
                    <label for="carPrice">Rental Price a Day</label>
                    <input type="text" id="carPrice" name="carPrice" required readonly>
                </div>

                <!-- Submit Button -->
                <div style="display: flex; justify-content: center;">
                    <button style="width: 35%;" type="submit" class="bg-black text-white border-2 border-gray-300 px-4 py-2 text-sm font-medium rounded-md hover:bg-gray-700 hover:border-gray-400 transition duration-300 ease-in-out">
                        Create
                    </button>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>

<!-- JavaScript for Dynamic Price Update -->
<script>
  // This function is for updating the rental price when the car is selected
function updateRentalPrice() {
    const car = document.getElementById('carName').value; // Change 'role' to 'carName'
    const rentalPriceInput = document.getElementById('carPrice');
    
    // Map selected car to rental price
    let price = '';
    switch (car) {
        // Economy
        case 'Toyota Vios':
            price = '₱750/Day';
            break;
        case 'Mitsubishi Mirage':
            price = '₱600/Day';
            break;
        case 'Honda City':
            price = '₱800/Day';
            break;
        case 'Suzuki Alto':
            price = '₱450/Day';
            break;

        // Compact
        case 'Suzuki Swift':
            price = '₱500/Day';
            break;
        case 'Hyundai Accent':
            price = '₱600/Day';
            break;
        case 'Kia Rio':
            price = '₱650/Day';
            break;
        case 'Nissan Almera':
            price = '₱700/Day';
            break;

        // Fullsize
        case 'Toyota Camry':
            price = '₱1250/Day';
            break;
        case 'Honda Accord':
            price = '₱1260/Day';
            break;
        case 'Hyundai Sonata':
            price = '₱1300/Day';
            break;
        case 'Kia Optima':
            price = '₱1700/Day';
            break;

        // Luxury
        case 'BMW 3-Series':
            price = '₱3750/Day';
            break;
        case 'Mercedes-Benz C-Class':
            price = '₱4500/Day';
            break;
        case 'Audi A4':
            price = '₱4250/Day';
            break;
        case 'Jaguar XJ':
            price = '₱6000/Day';
            break;

        // SUVs
        case 'Toyota Fortuner':
            price = '₱2000/Day';
            break;
        case 'Mitsubishi Montero Sport':
            price = '₱2500/Day';
            break;
        case 'Ford Everest':
            price = '₱2200/Day';
            break;
        case 'Nissan Terra':
            price = '₱2250/Day';
            break;

        // Vans
        case 'Mitsubishi L300':
            price = '₱450/Day';
            break;
        case 'Toyota Hiace Commuter':
            price = '₱2000/Day';
            break;
        case 'Hyundai Starex 2007':
            price = '₱1500/Day';
            break;
        case 'Kia Grand Carnival':
            price = '₱2750/Day';
            break;

        // Sports
        case 'Mazda MX-5 Miata':
            price = '₱3500/Day';
            break;
        case 'Ford Mustang GT':
            price = '₱5000/Day';
            break;
        case 'Toyota 86':
            price = '₱3200/Day';
            break;
        case 'Subaru BRZ':
            price = '₱2750/Day';
            break;

        // Trucks
        case 'Isuzu N-Series NHR':
            price = '₱1750/Day';
            break;
        case 'Mitsubishi Fuso Canter':
            price = '₱2000/Day';
            break;
        case 'Hyundai H-100':
            price = '₱1700/Day';
            break;
        case 'Foton Tornado':
            price = '₱1800/Day';
            break;

        // Electric Vehicles
        case 'Luxeed S7':
            price = '₱7000/Day';
            break;
        case 'JiYue ROBO-02':
            price = '₱5000/Day';
            break;
        case 'BMW i4':
            price = '₱4800/Day';
            break;
        case 'BYD Seal U':
            price = '₱6500/Day';
            break;

        default:
            price = '₱750/Day';
    }
    
    // Update rental price input value
    rentalPriceInput.value = price;
}

// Call the updateRentalPrice function immediately when the page loads
window.onload = function() {
    updateRentalPrice();
};
</script>
