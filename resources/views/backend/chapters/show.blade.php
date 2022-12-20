@extends('backend.backend_header_footer', ['title' => 'Show Chapter || ' . $find->name])

@section('content')
  <section>
    <div class="container mx-auto mt-10 rounded-lg bg-gray-100 pb-10">
      <h1 class="ml-3 mt-3 text-xl font-bold text-gray-600">Show Chapter</h1>
      <a class="float-right mr-3 rounded-md bg-gray-300 p-3 font-normal hover:bg-gray-400"
         href="{{ route('admin.show.version', ['technology_id' => Crypt::encryptString($find->technology->id), 'version_id' => Crypt::encryptString($find->version->id)]) }}">
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
              @foreach ($find->lessons as $lesson)
                <li class="my-10 border py-5 pl-5">
                  <a href="#">{{ $lesson->name }}</a>
                  <div class="float-right">
                    {{-- show lesson --}}
                    <a class="mx-1 rounded-sm bg-sky-600 p-2 text-lg text-white"
                       href="{{ route('admin.show.lesson', $lesson->slug) }}"><i class="fa-solid fa-eye"></i></a>
                    {{-- edit lesson --}}
                    <a class="mx-1 rounded-sm bg-green-700 p-2 text-lg text-white"
                       href="{{ route('admin.edit.lesson',$lesson->slug) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                      {{-- delete lesson --}}
                    <a class="mx-1 rounded-sm bg-red-700 p-2 text-lg text-white"
                       href="{{ route('admin.delete.lesson', $lesson->slug) }}" onclick="return confirm('Are you sure?')"><i
                         class="fa-solid fa-trash"></i></a>
                  </div>
                </li>
              @endforeach
            </ul>
          </div>
    </div>
  </section>
@endsection
