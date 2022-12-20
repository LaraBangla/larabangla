@extends('backend.backend_header_footer', ['title' => 'Show Chapter || ' . $find->name])

@section('content')
  <section>
    <div class="container mx-auto mt-10 rounded-lg bg-gray-100 pb-10">
      <h1 class="ml-3 mt-3 text-xl font-bold text-gray-600">Show Chapter</h1>
      <a class="float-right mr-3 rounded-md bg-gray-300 p-3 font-normal hover:bg-gray-400"
         href="{{ route('admin.show.version', ['technology_slug' => $find->technology->slug, 'version_slug' => $find->version->slug]) }}">
        < Back</a>
          <div class="p-5">
            <p><span class="font-bold">Chapter Name:</span> <span>{{ $find->name }}</span></p>
            <p><span class="font-bold">Chapter Slug:</span> <span>{{ $find->slug }}</span></p>
          </div>
          <div class="border-t">
            <h3 class="ml-5 text-xl font-bold">Lessons</h3>
            {{-- add lesson --}}
            <a class="float-right mr-3 rounded-md bg-gray-300 p-3 font-normal hover:bg-gray-400"
               href="{{ route('admin.add.lesson', $find->slug) }}">Add
              Lesson</a>
            <ul class="ml-5 pt-10 text-lg">
              {{-- show all lessons --}}
              @foreach ($find->lessons as $lesson)
                @include('backend.show_all.lessons.all_lessons')
              @endforeach
            </ul>
          </div>
    </div>
  </section>
@endsection
