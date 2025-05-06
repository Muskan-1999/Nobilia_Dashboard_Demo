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
            <div class="flex flex-wrap justify-between items-center mb-4 gap-4">
                {{-- Per Page Dropdown --}}
                <form method="GET" class="flex items-center gap-2">
                    <label for="per_page" class="text-sm text-gray-700">Show</label>
                    <select name="per_page" id="per_page" onchange="this.form.submit()" class="select select-bordered select-sm">
                        @foreach([10, 25, 50, 75, 100, 250, 500] as $size)
                        <option value="{{ $size }}" {{ $perPage == $size ? 'selected' : '' }}>{{ $size }}</option>
                        @endforeach
                    </select>
                    <span class="text-sm text-gray-700">entries</span>
                </form>

                {{-- Search Form --}}
                <form method="GET" class="flex items-center gap-2">
                    <input type="text" name="search" placeholder="Search......"
                        value="{{ $search }}" class="input input-bordered input-sm w-64"
                        @if($status) disabled @endif />
                    <button class="btn btn-sm btn-primary" @if($status) disabled @endif>Search</button>
                    @if($search)
                    <a href="{{ route('users.index', ['per_page' => $perPage]) }}" class="btn btn-sm btn-ghost">Clear</a>
                    @endif
                </form>

                {{-- Filter by Status --}}
                <form method="GET" class="flex items-center gap-2">
                    <select name="status" class="select select-bordered select-sm" onchange="this.form.submit()" @if($search) disabled @endif>
                        <option disabled selected>Filter By Status</option>
                        <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @if($status)
                    <a href="{{ route('users.index', ['per_page' => $perPage]) }}" class="btn btn-sm btn-error text-black">Clear</a>
                    @endif
                </form>
            </div>

            <div class="mt-6 pb-4">
                <table class="table table-bordered border border-gray-300 w-full text-sm mb-2">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="border border-gray-300 px-2 py-1 whitespace-nowrap">Id</th>
                            <th class="border border-gray-300 px-2 py-1 whitespace-nowrap">Name</th>
                            <th class="border border-gray-300 px-2 py-1 whitespace-nowrap">First Name</th>
                            <th class="border border-gray-300 px-2 py-1 whitespace-nowrap">Last Name </th>
                            <th class="border border-gray-300 px-2 py-1 whitespace-nowrap">Full Name</th>
                            <th class="border border-gray-300 px-2 py-1 whitespace-nowrap">Phone number</th>
                            <th class="border border-gray-300 px-2 py-1 whitespace-nowrap">Email</th>
                            <th class="border border-gray-300 px-2 py-1 whitespace-nowrap">Address</th>
                            <th class="border border-gray-300 px-2 py-1 whitespace-nowrap">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr class="text-sm">
                            <td class="border px-2 py-1">{{ $user->id }}</td>
                            <td class="border px-2 py-1">{{ $user->name }}</td>
                            <td class="border px-2 py-1">{{ $user->first_name }}</td>
                            <td class="border px-2 py-1">{{ $user->last_name }}</td>
                            <td class="border px-2 py-1">{{ $user->full_name }}</td>
                            <td class="border px-2 py-1">{{ $user->phone_number }}</td>
                            <td class="border px-2 py-1">{{ $user->email }}</td>
                            <td class="border px-2 py-1">{{ $user->address }}</td>
                            <td class="border px-2 py-1">
                                @if($user->status === 'active')
                                <span class="inline-flex items-center px-2 py-1 text-xs font-medium text-green-800 border border-green-500 rounded-full">
                                    Active
                                </span>
                                @else
                                <span class="inline-flex items-center px-2 py-1 text-xs font-medium text-red-800 border border-red-500 rounded-full">
                                    Inactive
                                </span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
                {{-- Pagination Links --}}
                <div class="mt-4">
                    {{ $users->appends(['per_page' => $perPage])->links() }}
                </div>
            </div>
        </main>
    </div>
    @endsection
</x-app-layout>