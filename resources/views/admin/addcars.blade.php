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

            <!-- Display Success or Error Messages -->
            @if (session('success'))
<div class="alert alert-success bg-black text-green p-3 rounded mb-4 flex justify-center items-center" style="width: fit-content; height: 100vh; margin: auto;">
    {{ session('success') }}
</div>


            @endif

            @if (session('error'))
                <div class="alert alert-danger bg-red-500 text-white p-3 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif

            <a href="{{ route('admin.admincars') }}">
                <button class="cursor-pointer duration-200 hover:scale-110 active:scale-100 flex items-center space-x-2" title="Go Back">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="25px" viewBox="0 0 24 24" class="stroke-white">
                        <path stroke-linejoin="round" stroke-linecap="round" stroke-width="1.5" d="M11 6L5 12M5 12L11 18M5 12H19"></path>
                    </svg>
                    <span class="text-white">Back</span>
                </button>
            </a>

          <form action="{{ route('addcar') }}" method="post" class="form">
    @csrf

    <!-- Custom Styled Dropdown -->
    <div class="custom-dropdown-container">
        <label for="carName" class="dropdown-label">SELECT A CAR</label>
        <div class="custom-dropdown">
            <select id="carName" name="carName" required onchange="updateRentalPrice()">
                <option disabled>Economy</option>
                <option value="Toyota Vios">Toyota Vios</option>
                <option value="Mitsubishi Mirage">Mitsubishi Mirage</option>
                <option value="Honda City">Honda City</option>
                <option value="Suzuki Alto">Suzuki Alto</option>
                <option disabled>Compact</option>
                <option value="Suzuki Swift">Suzuki Swift</option>
            </select>
        </div>
    </div>



    <!-- License Plate Input -->
    <div class="form-group">
        <label for="email">License Plate</label>
        <input type="text" id="email" name="email" required=""/>
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
        case 'Suzuki Swift':
            price = '₱500/Day';
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



