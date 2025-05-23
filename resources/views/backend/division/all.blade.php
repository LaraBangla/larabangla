@extends('backend.backend_header_footer', ['title' => 'All Devisions'])

@section('content')
  <section class="p-5">
    <table class="w-full border-separate border-spacing-2 border border-slate-400">
      <thead>
        <tr>
          <th class="border border-slate-300 bg-gray-300">SL</th>
          <th class="border border-slate-300 bg-gray-300">Name</th>
          <th class="border border-slate-300 bg-gray-300">Slug</th>
          <th class="border border-slate-300 bg-gray-300">Action</th>
        </tr>
      </thead>
      <tbody>

        @foreach ($data as $key => $row)
          <tr>
            <td class="border border-slate-300 p-2 text-center">{{ $key + 1 }}</td>
            <td class="border border-slate-300 p-2">{{ $row->name }}</td>
            <td class="border border-slate-300 p-2">{{ $row->slug }}</td>
            <td class="w-28 border border-slate-300 p-2">
              {{-- <a href="#" class="p-2 text-lg bg-sky-400 mx-1 rounded-sm"><i class="fa-solid fa-eye"></i></a> --}}
              {{-- edit division --}}
              <a class="mx-1 rounded-sm bg-green-700 p-2 text-lg text-white" href="{{ route('admin.edit.division', $row->slug) }}"><i
                   class="fa-solid fa-pen-to-square"></i></a>
                   {{-- delete division --}}
              <a class="mx-1 rounded-sm bg-red-700 p-2 text-lg text-white" href="{{ route('admin.delete.division', $row->slug) }}"
                 onclick="return confirm('Are you sure?')"><i class="fa-solid fa-trash"></i></a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <div class="mt-3">
      {{ $data->links() }}
    </div>
  </section>
@endsection
