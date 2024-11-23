<style>
.toggle-container {
  --knob-size: 1.75em;
  display: flex;
  justify-content: center;
  position: relative;
}

.toggle-input {
  position: absolute;
  z-index: 2;
  bottom: 132.5%;
  border-radius: 50%;
  transform: rotate(-25deg);
  transform-origin: 50% 4.75em;
  width: var(--knob-size);
  height: var(--knob-size);
  opacity: 0;
  /* fix em sizing */
  font: inherit;
  transition: transform .24s cubic-bezier(.65, 1.35, .5, 1);
  cursor: pointer;
}

.toggle-input:checked {
  transform: rotate(25deg);
}

.toggle-handle-wrapper {
  position: absolute;
  z-index: 1;
  bottom: -135%;
  -webkit-mask-image: linear-gradient(to bottom, #000 62.125%, transparent 50%);
  mask-image: linear-gradient(to bottom, #000 62.125%, transparent 50%);
  width: 200%;
  overflow: hidden;
}

.toggle-handle {
  display: flex;
  flex-direction: column;
  align-items: center;
  transform: rotate(-25deg);
  transform-origin: bottom center;
  transition: transform .24s cubic-bezier(.65, 1.35, .5, 1);
}

.toggle-input:checked + .toggle-handle-wrapper > .toggle-handle {
  transform: rotate(25deg);
}

.toggle-handle-knob {
  position: relative;
  z-index: 1;
  border-radius: 50%;
  width: var(--knob-size);
  height: var(--knob-size);
  background-image: radial-gradient(farthest-corner at 70% 30%, #fedee2 4%, #d63534 12% 24%, #a81a1a 50% 65%, #d63534 75%);
  transition: transform .24s cubic-bezier(.65, 1.35, .5, 1);
}

.toggle-input:checked + .toggle-handle-wrapper .toggle-handle-knob {
  transform: rotate(-90deg);
}

/* toggle handle knob hover inner shadow */
.toggle-handle-knob::after {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  border-radius: inherit;
  width: 100%;
  height: 100%;
  box-shadow: inset 0 0 8px 2px rgb(255 255 255 / .4);
  opacity: 0;
  transition: opacity .2s;
}

@media (hover: hover) {
  .toggle-input:hover + .toggle-handle-wrapper .toggle-handle-knob::after,
  .toggle-input:focus-visible + .toggle-handle-wrapper .toggle-handle-knob::after {
    opacity: 1;
  }
}

.toggle-handle-bar-wrapper {
  position: relative;
  width: .5em;
  height: 3em;
}

.toggle-handle-bar {
  position: absolute;
  top: calc(var(--knob-size) / 2 * -1);
  left: 0;
  width: 100%;
  height: calc(100% + var(--knob-size) / 2);
  background-image: linear-gradient(to right, #777475, #a4a4a4, #fff 45% 55%, #a4a4a4, #777475);
  background-position-x: .06125em;
  transition: background-position-x .24s cubic-bezier(.65, 1.35, .5, 1);
  box-shadow: inset 0 1em .25em rgb(0 0 0 / .4);
}

.toggle-input:checked + .toggle-handle-wrapper .toggle-handle-bar {
  background-position-x: -.06125em;
}

.toggle-base {
  position: relative;
  border-radius: 3.125em;
  padding: .25em;
  width: 3.5em;
  height: 1.125em;
  background-color: #fff;
  background-image: linear-gradient(to bottom, #fff, #d7d7d7);
  box-shadow: 0 -.25em .5em #fff, 0 .25em .5em #d7d7d7;
}

.toggle-base-inside {
  position: relative;
  border-radius: inherit;
  width: 100%;
  height: 100%;
  background-image: linear-gradient(to bottom, #a6a6a6, #7d7d7d);
  box-shadow: inset 0 .0625em rgb(255 255 255 / .2), inset 0 -.03125em rgb(255 255 255 / 1), inset 0 -.0625em .25em rgb(0 0 0 / .1);
}

/* toggle base inside active */
.toggle-base-inside::after {
  content: '';
  position: absolute;
  border-radius: inherit;
  width: 100%;
  height: 100%;
  background-image: linear-gradient(to bottom, #5ab054, #438c3c);
  box-shadow: inherit;
  opacity: 0;
  transition: opacity .24s cubic-bezier(.65, 1.35, .5, 1);
}

.toggle-input:checked ~ .toggle-base .toggle-base-inside::after {
  opacity: 1;
}
</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-4xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Car Inventory') }}
        </h2>
    </x-slot>

    <div>

        <div style="display: flex; justify-content: center; gap: 20px;">
            <a href="{{ route('admin.economy') }}">
                <button class="categorybutton active">Economy</button>
            </a>
            <a href="{{ route('admin.compact') }}">
                <button class="categorybutton">Compact</button>
            </a>
            <a href="{{ route('admin.fullsize') }}">
                <button class="categorybutton">Full-Size</button>
            </a>
            <a href="{{ route('admin.luxury') }}">
                <button class="categorybutton">Luxury</button>
            </a>
            <a href="{{ route('admin.suv') }}">
                <button class="categorybutton">SUV</button>
            </a>
            <a href="{{ route('admin.van') }}">
                <button class="categorybutton">VAN</button>
            </a>
            <a href="{{ route('admin.sports') }}">
                <button class="categorybutton">Sports</button>
            </a>
            <a href="{{ route('admin.truck') }}">
                <button class="categorybutton">Truck</button>
            </a>
            <a href="{{ route('admin.ecars') }}">
                <button class="categorybutton">E-Cars</button>
            </a>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8">

        
            
            <div class="bg-white dark:bg-black overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-800 dark:text-gray-200 text-center text-3xl">
                    {{ __("Economy") }}
                </div>
            </div>

            <div class="py-12 form-container">
 
            <table border="1" style="border-color: white; color: white; width: 100%; text-align: left; border-collapse: collapse; margin: 0 auto;">
                <tr>
                    <td style="border: 1px solid white; padding: 8px;">Car Name</td>
                    <td style="border: 1px solid white; padding: 8px;">Car Stocks</td>
                </tr>

                <tr>
                    <td style="border: 1px solid white; padding: 8px;"></td>
                    <td style="border: 1px solid white; padding: 8px;"></td>
                </tr>

            </table>
                        
            </div>
        </div>

</x-app-layout>
