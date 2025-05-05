@php
    $selected = request('view', 'today'); // default to 'today' if no param
@endphp

<div class="flex gap-2 bg-white p-2 rounded shadow w-fit">
    <a href="#"
       class="px-4 py-2 rounded
              {{ $selected === 'today' ? 'border border-red-600 bg-red-100 text-black' : 'text-gray-600' }}">
        Today's Visitors
    </a>

    <a href="#"
       class="px-4 py-2 rounded
              {{ $selected === 'all' ? 'border border-red-600 bg-red-100 text-black' : 'text-gray-600' }}">
        All Visitors
    </a>
</div>
