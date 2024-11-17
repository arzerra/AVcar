<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-4xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Rent Process') }}
        </h2>
    </x-slot>

<div class="py-40 px-40">
    <div class="card item-center">
        
        <div class="bg">
            <!-- Go Back Button -->
            <a href="{{ route('economy') }}">
                <button class="cursor-pointer duration-200 hover:scale-125 active:scale-100" title="Go Back">
                    <svg xmlns="http://www.w3.org/2000/svg" width="60px" height="50px" viewBox="0 0 24 24" class="stroke-black">
                        <path stroke-linejoin="round" stroke-linecap="round" stroke-width="1.5" d="M11 6L5 12M5 12L11 18M5 12H19"></path>
                    </svg>
                </button>
            </a>
           <div >

                <form>
                    <div class="mb-1 input-container">
                        <label class="form-label label" disable>Date today</label><br>
                        <input type="text" id="todays-date" style="text-align: center;" disable>
                        <div class="underline"></div>
                    </div>
                </form>

                <form action="{{ route('saveDate') }}" method="POST">
                    @csrf
                    <div class="mb-1 input-container">
                        <label for="selected_date" class="form-label label">Select Date of return</label><br>
                        <input  type="text" class="form-control" id="datepicker" name="selected_date" value="{{ old('selected_date') }}" required>
                        <div class="underline"></div>
                        @error('selected_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <label class="label">Pick-up</label><br>

                    <div style="display: flex; justify-content: center; align-items: flex-start; width: 72%; margin-top: -25px;">
                        <div class="bg-white p-4 rounded-lg max-w-[300px]">
                            <div class="relative mt-1 max-w-xs text-gray-500">
                                <div class="absolute inset-y-0 left-3 my-auto h-9 flex items-center border-r pr-1">
                                    <select class="text-sm outline-none rounded-lg h-full">
                                        <option>Maa</option>
                                        <option>Agdao</option>
                                        <option>Matina</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div style="display: flex; justify-content: center; align-items: center; margin-top: -27px;">
                        <img src="/gif/car.gif" alt="Car GIF" style="width: 200px;" />
                    </div>

                    <label style="margin-top: -25px;"class="label">Drop-off</label><br>

                    <div style="display: flex; justify-content: center; align-items: flex-start; width: 72%; margin-top: -23px;">
                        <div class="bg-white p-4 rounded-lg max-w-[300px]">
                            <div class="relative mt-1 max-w-xs text-gray-500">
                                <div class="absolute inset-y-0 left-3 my-auto h-9 flex items-center border-r pr-1">
                                    <select class="text-sm outline-none rounded-lg h-full">
                                        <option>Maa</option>
                                        <option>Agdao</option>
                                        <option>Matina</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="text-align: center; margin-top: 35px;">
                        <button role="button" type="submit" class="btn btn-danger button-name">Proceed to payment</button>
                    </div>
                </form>
           </div>
        </div>

        <div class="blob"></div>
    </div>
</div>


</x-app-layout>
