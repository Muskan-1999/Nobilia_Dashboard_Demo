@php
$selected = request('view', 'today');
@endphp

<div class="mt-4 flex justify-between items-center bg-white p-2 rounded shadow w-full">
    <!-- Left group: Toggle buttons + Show more -->
    <div class="flex items-center">
        <!-- Toggle Buttons -->
        <div class="inline-flex rounded-md overflow-hidden">
            <a href="{{ request()->fullUrlWithQuery(['view' => 'today']) }}"
                class="px-4 py-2 text-sm font-medium
                   {{ $selected === 'today'
                       ? 'bg-red-50 text-black border border-red-500 border-r-0 rounded-l-md'
                       : 'bg-white text-gray-700 border border-gray-300 border-r-0 rounded-l-md' }}">
                Today's visitors
            </a>

            <div class="{{ $selected === 'today' ? 'border-r border-red-500' : 'border-r border-gray-300' }}"></div>

            <a href="{{ request()->fullUrlWithQuery(['view' => 'all']) }}"
                class="px-4 py-2 text-sm font-medium
                   {{ $selected === 'all'
                       ? 'bg-red-50 text-black border border-red-500 rounded-r-md'
                       : 'bg-white text-gray-700 border border-gray-300 rounded-r-md' }}">
                All visitors
            </a>
        </div>

        <button class="px-4 py-2 ml-2 bg-red-600 text-white text-sm hover:bg-red-700">
            Show more
        </button>
    </div>

    <div class="flex items-center gap-2">
        <!-- Import Icon (outside but left of the Reset filter button) -->
        <div class="p-2 rounded-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 16.5V18a2.25 2.25 0 002.25 2.25h13.5A2.25 2.25 0 0021 18v-1.5M12 3v12m0 0l-3-3m3 3l3-3" />
            </svg>
        </div>

        <!-- Reset Filter Button -->
        <button class="px-4 py-2 text-sm bg-gray-700 text-gray-300 hover:bg-gray-800 rounded-none">
            Reset filter
        </button>

        <!-- No Results Button -->
        <button class="px-4 py-2 text-sm bg-gray-400 text-gray-100 cursor-not-allowed" disabled>
            No results
        </button>
    </div>

</div>