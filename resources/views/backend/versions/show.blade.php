@extends('backend.backend_header_footer', ['title' => 'Show Version || ' . $find->name])

@section('content')
  <section>
    <div class="container mx-auto mt-10 rounded-lg bg-gray-100 pb-10">
      <h1 class="ml-3 mt-3 text-xl font-bold text-gray-600">Show Version</h1>
      <a class="float-right mr-3 rounded-md bg-gray-300 p-3 font-normal hover:bg-gray-400"
         href="{{ route('admin.show.technology', $find->technology_id) }}">
        < Back</a>
          <div class="p-5">
            <p><span class="font-bold">Technology Name:</span> <span>{{ $find->technology->name }}</span></p>
            <p><span class="font-bold">Version Name:</span> <span>{{ $find->name }}</span></p>
            <p><span class="font-bold">Version Slug:</span> <span>{{ $find->slug }}</span></p>
          </div>
          <div class="border-t">
            <h3 class="ml-5 text-xl font-bold">Chapters</h3>
            {{-- add chapter --}}
            <a class="float-right mr-3 rounded-md bg-gray-300 p-3 font-normal hover:bg-gray-400"
               href="{{ route('admin.add.chapter', $find->slug) }}">Add Chapter</a>
            <ul class="ml-5 pt-10 text-lg">
              @foreach ($chapters as $chapter)
               @include('backend.show_all.chapter.all_chapters')
              @endforeach

            </ul>
          </div>
    </div>
  </section>
@endsection
