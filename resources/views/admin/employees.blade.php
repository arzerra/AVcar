
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-4xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Employee List') }}
        </h2>
    </x-slot>

<div class="py-12 form-container">

<div style="display: flex; justify-content: center;">
    <a href="{{ route('addemployee') }}">
        <button class="bg-black text-white border-2 border-gray-300 px-4 py-2 text-sm font-medium rounded-md hover:bg-gray-700 hover:border-gray-400 transition duration-300 ease-in-out">
            Create Employee  
        </button>
    </a>
</div>

<table border="1" style="border-color: white; color: white; width: 100%; text-align: left; border-collapse: collapse; margin: 0 auto;">
    <tr>
        <td style="border: 1px solid white; padding: 8px;">Name</td>
        <td style="border: 1px solid white; padding: 8px;">Email</td>
        <td style="border: 1px solid white; padding: 8px;">User Type</td>
    </tr>
    @foreach($admins as $admin)
    <tr>
        <td style="border: 1px solid white; padding: 8px;">{{$admin->name}}</td>
        <td style="border: 1px solid white; padding: 8px;">{{$admin->email}}</td>
        <td style="border: 1px solid white; padding: 8px;">{{$admin->usertype}}</td>
    </tr>
    @endforeach
</table>






</div>

</x-admin-layout>
