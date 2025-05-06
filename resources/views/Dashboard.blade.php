<x-app-layout>
  @section('content')
  <div class="bg-white border-b border-gray-200 shadow-sm px-4 py-2">
    @include('components.navbar')
  </div>


  <div class="flex h-screen bg-gray-100">

    {{-- Sidebar with right border --}}
    <aside class="w-64 bg-white border-r border-gray-200">
      @include('components.sidebar')
    </aside>

    <main class="flex-1 p-6 overflow-auto bg-white">

      {{-- Filters Section --}}
      <div class="space-y-4 bg-white p-4 rounded shadow">
        <!-- First Row -->
        <div class="grid grid-cols-4 gap-4">
          @foreach (['Business', 'Trade fair guide', 'Last name', 'Customer number'] as $placeholder)
          <div class="relative">
            <input
              type="text"
              placeholder="{{ $placeholder }}"
              class="input w-full border-0 border-b border-gray-300 focus:outline-none focus:border-black text-sm pr-8 shadow-none bg-transparent" />
            <svg class="w-4 h-4 absolute right-2 top-1/2 transform -translate-y-1/2 text-gray-400 pointer-events-none" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M16 10a6 6 0 11-12 0 6 6 0 0112 0z" />
            </svg>
          </div>
          @endforeach
        </div>

        <!-- Second Row -->
        <div class="grid grid-cols-4 gap-4">
          <select class="w-full bg-white text-sm focus:outline-none focus:ring-0 focus:border focus:border-black border-transparent">
            <option disabled selected>Sort</option>
            <option>Business</option>
            <option>Last name</option>
          </select>

          <select class="w-full bg-white text-sm focus:outline-none focus:ring-0 focus:border focus:border-black border-transparent">
            <option disabled selected>Select time slot</option>
            <option>Morning</option>
            <option>Afternoon</option>
          </select>

          <div class="relative">
            <input
              type="text"
              placeholder="Field sales representative"
              class="input w-full border-0 border-b border-gray-300 focus:outline-none focus:border-black text-sm pr-8 shadow-none bg-transparent" />
            <svg class="w-4 h-4 absolute right-2 top-1/2 transform -translate-y-1/2 text-gray-400 pointer-events-none" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M16 10a6 6 0 11-12 0 6 6 0 0112 0z" />
            </svg>
          </div>

          <select class="w-full bg-white text-sm focus:outline-none focus:ring-0 focus:border focus:border-black border-transparent">
            <option disabled selected>Status</option>
            <option>Registered</option>
            <option>Pending</option>
          </select>
        </div>
      </div>

      {{-- Action Buttons --}}
      @php $selected = request('view', 'today'); @endphp
      <div class="mt-4 flex justify-between items-center bg-white p-2 rounded shadow w-full">
        <div class="flex items-center">
          <div class="inline-flex rounded-md overflow-hidden">
            <a href="{{ request()->fullUrlWithQuery(['view' => 'today']) }}"
              class="px-4 py-2 text-sm font-medium {{ $selected === 'today' ? 'bg-red-50 text-black border border-red-500 border-r-0 rounded-l-md' : 'bg-white text-gray-700 border border-gray-300 border-r-0 rounded-l-md' }}">
              Today's visitors
            </a>

            <div class="{{ $selected === 'today' ? 'border-r border-red-500' : 'border-r border-gray-300' }}"></div>

            <a href="{{ request()->fullUrlWithQuery(['view' => 'all']) }}"
              class="px-4 py-2 text-sm font-medium {{ $selected === 'all' ? 'bg-red-50 text-black border border-red-500 rounded-r-md' : 'bg-white text-gray-700 border border-gray-300 rounded-r-md' }}">
              All visitors
            </a>
          </div>

          <button class="px-4 py-2 ml-2 bg-red-600 text-white text-sm hover:bg-red-700">
            Show more
          </button>
        </div>

        <div class="flex items-center gap-2">
          <div class="p-2 rounded-sm">
          <i class="fa-solid fa-file-arrow-down text-[24px]"></i>
          </div>

          <button class="px-4 py-2 text-sm bg-gray-700 text-gray-300 hover:bg-gray-800 rounded-none">
            Reset filter
          </button>

          <button class="px-4 py-2 text-sm bg-gray-400 text-gray-100 cursor-not-allowed" disabled>
            No results
          </button>
        </div>
      </div>

      {{-- Visitors Table --}}
      <div class="mt-6 pb-4">
        <table class="table table-bordered border border-gray-300 w-full text-sm mb-2">
          <thead class="bg-gray-100 text-gray-700">
            <tr>
              <th class="border border-gray-300 px-2 py-1 whitespace-nowrap">Status</th>
              <th class="border border-gray-300 px-2 py-1 whitespace-nowrap">Category</th>
              <th class="border border-gray-300 px-2 py-1 whitespace-nowrap">Date (desired day)</th>
              <th class="border border-gray-300 px-2 py-1 whitespace-nowrap">
                <span>Time of day</span>
                <span class="ml-4">Trade fair day</span>
              </th>
              <th class="border border-gray-300 px-2 py-1 whitespace-nowrap">Mass</th>
              <th class="border border-gray-300 px-2 py-1 whitespace-nowrap">Trade fair guide</th>
              <th class="border border-gray-300 px-2 py-1 whitespace-nowrap">Kdn No.</th>
              <th class="border border-gray-300 px-2 py-1 whitespace-nowrap">First name</th>
              <th class="border border-gray-300 px-2 py-1 whitespace-nowrap">Last name</th>
              <th class="border border-gray-300 px-2 py-1 whitespace-nowrap">WHAT-Name</th>
              <th class="border border-gray-300 px-2 py-1 whitespace-nowrap">Function</th>
            </tr>
          </thead>
          <tbody>
            <!-- You can loop your data here -->
            <!-- Example row:
            <tr class="text-sm">
              <td class="border px-2 py-1">Pending</td>
              ...
            </tr>
            -->
          </tbody>
        </table>
      </div>

    </main>
  </div>
  @endsection
</x-app-layout>