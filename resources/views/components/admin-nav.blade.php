<!-- resources/views/components/admin-nav.blade.php -->
<nav class="bg-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center">
                <!-- Logo -->
                <div class="shrink-0">
                    <a href="{{ route('admin.dashboard') }}">
                        <x-application-logo class="h-8 w-8 text-white" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="ml-10 flex items-baseline space-x-4">
                    <a href="{{ route('admin.dashboard') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                        {{ __('Dashboard') }}
                    </a>
                    <a href="{{ route('admin.cars') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                        {{ __('Cars') }}
                    </a>
                    <!-- Add more links as needed -->
                </div>
            </div>
        </div>
    </div>
</nav>
