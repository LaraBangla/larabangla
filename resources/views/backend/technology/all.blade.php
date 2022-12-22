@extends('backend.backend_header_footer', ['title' => 'All Technologies'])

@section('content')
  <section class="p-5">
    <table class="w-full border-separate border-spacing-2 border border-slate-400">
      <thead>
        <tr>
          <th class="border border-slate-300 bg-gray-300">SL</th>
          <th class="border border-slate-300 bg-gray-300">Name</th>
          <th class="border border-slate-300 bg-gray-300">Slug</th>
          <th class="border border-slate-300 bg-gray-300">Division</th>
          <th class="border border-slate-300 bg-gray-300">Action</th>
        </tr>
      </thead>
      <tbody>
        {{-- show all technologies --}}
        @include('backend.show_all.technologies.all_technologies')
      </tbody>
    </table>
    <div class="mt-3">
      {{ $data->links() }}
    </div>
  </section>
@endsection
