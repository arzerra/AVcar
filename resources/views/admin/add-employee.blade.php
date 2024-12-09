<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-4xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Employee') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="form-container">
            
            <!-- Display Success or Error Messages -->
            @if (session('success'))
                <div class="alert alert-success bg-green-500 text-white p-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger bg-red-500 text-white p-3 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Back Button -->
            <a href="{{ route('admin.employees') }}">
                <button class="cursor-pointer duration-200 hover:scale-110 active:scale-100 flex items-center space-x-2" title="Go Back">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="25px" viewBox="0 0 24 24" class="stroke-white">
                        <path stroke-linejoin="round" stroke-linecap="round" stroke-width="1.5" d="M11 6L5 12M5 12L11 18M5 12H19"></path>
                    </svg>
                    <span class="text-white">Back</span>
                </button>
            </a>
            <form action="{{ route('addemployee') }}" method="post" class="form" onsubmit="return validateForm()">
                @csrf
                <div class="form-group">
                    <input type="text" id="usertype" name="usertype" value="admin" required readonly hidden>
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required="">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required="">
                </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="At least 8 chars, 1 uppercase, 1 digit, 1 special char" required="">
            </div>

                <div class="form-group">
                    <label for="confirmpass">Confirm Password</label>
                    <input type="password" id="confirmpass" name="confirmpass" required="">
                </div>
                <div style="display: flex; justify-content: center;">
                    <button style="width: 35%;" type="submit" class="bg-black text-white border-2 border-gray-300 px-4 py-2 text-sm font-medium rounded-md hover:bg-gray-700 hover:border-gray-400 transition duration-300 ease-in-out">
                        Create  
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

<script>
    function validateForm() {
        const password = document.getElementById("password").value;
        const confirmPassword = document.getElementById("confirmpass").value;

        const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

        if (!passwordRegex.test(password)) {
            alert("Password must be at least 8 characters, include an uppercase letter, a lowercase letter, a digit, and a special character.");
            return false;
        }

        if (password !== confirmPassword) {
            alert("Passwords do not match!");
            return false;
        }

        return true;
    }
</script>
