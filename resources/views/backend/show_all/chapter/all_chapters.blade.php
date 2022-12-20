<li class="my-10 flex justify-between border py-10 pl-5">
    <div>
      <p class="text-xl font-semibold">{{ $chapter->name }}</p>
      <p class="text-gray-500">{{ $chapter->slug }}</p>
    </div>
    <div class="mr-2">
      {{-- show chapter --}}
      <a class="mx-1 rounded-sm bg-sky-600 p-2 text-lg text-white"
         href="{{ route('admin.show.chapter', $chapter->slug) }}"><i class="fa-solid fa-eye"></i></a>
         {{-- edit chapter --}}
      <a class="mx-1 rounded-sm bg-green-700 p-2 text-lg text-white"
         href="{{ route('admin.edit.chapter', $chapter->slug) }}"><i class="fa-solid fa-pen-to-square"></i></a>
         {{-- delete chapter --}}
      <a class="mx-1 rounded-sm bg-red-700 p-2 text-lg text-white"
         href="{{ route('admin.delete.chapter', $chapter->slug) }}" onclick="return confirm('Are you sure?')"><i
           class="fa-solid fa-trash"></i></a>
    </div>
  </li>