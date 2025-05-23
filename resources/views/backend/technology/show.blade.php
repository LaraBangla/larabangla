@extends('backend.backend_header_footer', ['title' => 'Show Technology || ' . $find->name])

@section('content')
  <section>
    <div class="container mx-auto mt-10 rounded-lg bg-gray-100 pb-10">
      <h1 class="ml-3 mt-3 text-xl font-bold text-gray-600">Show Technology</h1>
      <a class="float-right mr-3 rounded-md bg-gray-300 p-3 font-normal hover:bg-gray-400" href="{{ route('admin.all.technologies') }}">All
        Technologies</a>
      <div class="p-5">
        <p><span class="font-bold">Technology Name:</span> <span>{{ $find->name }}</span></p>
        <p><span class="font-bold">Technology Slug:</span> <span>{{ $find->slug }}</span></p>
      </div>
      <div class="border-t">
        <h3 class="ml-5 text-xl font-bold">Versions</h3>
        <a class="float-right mr-3 rounded-md bg-gray-300 p-3 font-normal hover:bg-gray-400"
           href="{{ route('admin.add.version', $find->slug) }}">Add Version</a>
        <ul class="ml-5 pt-10 text-lg">
          @foreach ($versions as $version)
            @include('backend.show_all.versions.all_versions')
          @endforeach

        </ul>
      </div>
    </div>
  </section>
@endsection
