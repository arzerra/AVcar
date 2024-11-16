@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-black dark:text-gray-300 focus:border-indigo-500 dark:focus:border-white focus:ring-white dark:focus:ring-white rounded-md shadow-sm']) }}>
