<div class="flex items-center justify-between w-full px-4 py-2 bg-white shadow border-b border-gray-200">
    {{-- Left section: Logo and Updated Visitors --}}
    <div class="flex items-center gap-4">
        <img src="{{ asset('images/nobilia-logo.png') }}" alt="Logo" class="h-10 align-middle">
        
        {{-- Vertical divider and text --}}
        <div class="pl-4 ml-2 border-l border-gray-200">
            <span class="text-sm font-medium text-gray-700">Updated visitors: 0</span>
        </div>
    </div>

    {{-- Center date --}}
    <div class="text-center text-sm font-medium text-gray-700">
        {{ \Carbon\Carbon::now()->format('l, F j, Y') }}
    </div>

    {{-- Right: User info and logout --}}
    <div class="flex items-center gap-4">
        <span class="text-sm font-medium text-gray-700">User: {{ Auth::user()->name }}</span>

        {{-- Vertical divider --}}
        <div class="h-5 border-l border-gray-300"></div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="flex items-center gap-1 px-3 py-1 text-white bg-red-600 rounded-full hover:bg-red-700 text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H7a2 2 0 01-2-2V7a2 2 0 012-2h4a2 2 0 012 2v1" />
                </svg>
                Logout
            </button>
        </form>
    </div>
</div>
