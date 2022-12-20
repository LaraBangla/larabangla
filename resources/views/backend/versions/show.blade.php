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
            <a class="float-right mr-3 rounded-md bg-gray-300 p-3 font-normal hover:bg-gray-400"
               href="{{ route('admin.add.chapter', Crypt::encryptString($find->id)) }}">Add Chapter</a>
            <ul class="ml-5 pt-10 text-lg">
              @foreach ($chapters as $chapter)
                <li class="my-10 flex justify-between border py-10 pl-5">
                  <div>
                    <p class="text-xl font-semibold">{{ $chapter->name }}</p>
                    <p class="text-gray-500">{{ $chapter->slug }}</p>
                  </div>
                  <div class="mr-2">
                    <a class="mx-1 rounded-sm bg-sky-600 p-2 text-lg text-white"
                       href="{{ route('admin.show.chapter', $chapter->slug) }}"><i class="fa-solid fa-eye"></i></a>
                    <a class="mx-1 rounded-sm bg-green-700 p-2 text-lg text-white"
                       href="{{ route('admin.edit.chapter', Crypt::encryptString($chapter->id)) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a class="mx-1 rounded-sm bg-red-700 p-2 text-lg text-white"
                       href="{{ route('admin.delete.chapter', Crypt::encryptString($chapter->id)) }}" onclick="return confirm('Are you sure?')"><i
                         class="fa-solid fa-trash"></i></a>
                  </div>
                </li>
              @endforeach

            </ul>
          </div>
    </div>
  </section>
@endsection
