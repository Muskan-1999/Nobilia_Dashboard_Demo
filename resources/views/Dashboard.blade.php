<x-app-layout>

@section('content')
  @include('components.navbar')

  <div class="flex h-screen">
    @include('components.sidebar')

    <main class="flex-1 p-6 overflow-auto">
      @include('components.filters')
      @include('components.action-buttons')
      @include('components.table-controls')
      @include('components.visitors-table')
    </main>
  </div>
@endsection

</x-app-layout>
