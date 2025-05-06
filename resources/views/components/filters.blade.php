<div class="space-y-4 bg-gray-50 p-4">
    <!-- First Row -->
    <div class="grid grid-cols-4 gap-4">
        @foreach (['Business', 'Trade fair guide', 'Last name', 'Customer number'] as $placeholder)
            <div class="relative">
                <input
                    type="text"
                    placeholder="{{ $placeholder }}"
                    class="input w-full border-0 border-b border-gray-300 focus:outline-none focus:border-black text-sm pr-8 shadow-none bg-transparent"
                />
                <svg class="w-4 h-4 absolute right-2 top-1/2 transform -translate-y-1/2 text-gray-400 pointer-events-none" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M16 10a6 6 0 11-12 0 6 6 0 0112 0z" />
                </svg>
            </div>
        @endforeach
    </div>

    <!-- Second Row -->
    <div class="grid grid-cols-4 gap-4">
        <!-- Sort dropdown -->
        <select class="w-full bg-white text-sm focus:outline-none focus:ring-0 focus:border focus:border-black border-transparent">
            <option disabled selected>Sort</option>
            <option>Business</option>
            <option>Last name</option>
        </select>

        <!-- Time slot dropdown -->
        <select class="w-full bg-white text-sm focus:outline-none focus:ring-0 focus:border focus:border-black border-transparent">
            <option disabled selected>Select time slot</option>
            <option>Morning</option>
            <option>Afternoon</option>
        </select>

        <!-- Field sales representative -->
        <div class="relative">
            <input
                type="text"
                placeholder="Field sales representative"
                class="input w-full border-0 border-b border-gray-300 focus:outline-none focus:border-black text-sm pr-8 shadow-none bg-transparent"
            />
            <svg class="w-4 h-4 absolute right-2 top-1/2 transform -translate-y-1/2 text-gray-400 pointer-events-none" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M16 10a6 6 0 11-12 0 6 6 0 0112 0z" />
            </svg>
        </div>

        <!-- Status dropdown -->
        <select class="w-full bg-white text-sm focus:outline-none focus:ring-0 focus:border focus:border-black border-transparent">
            <option disabled selected>Status</option>
            <option>Registered</option>
            <option>Pending</option>
        </select>
    </div>
</div>
<div class="mb-4"></div> 