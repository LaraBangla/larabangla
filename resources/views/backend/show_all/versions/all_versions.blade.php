<li class="my-10 border py-5 pl-5">
    <a href="#">{{ $version->name }}</a>
    <div class="float-right">
      {{-- show version --}}
      <a class="mx-1 rounded-sm bg-sky-600 p-2 text-lg text-white"
         href="{{ route('admin.show.version', ['technology_slug' => $find->slug, 'version_slug' => $version->slug]) }}"><i
           class="fa-solid fa-eye"></i></a>
           {{-- edit version --}}
      <a class="mx-1 rounded-sm bg-green-700 p-2 text-lg text-white" href="{{ route('admin.edit.version', $version->slug) }}"><i
           class="fa-solid fa-pen-to-square"></i></a>
           {{-- delete version --}}
      <a class="mx-1 rounded-sm bg-red-700 p-2 text-lg text-white"
         href="{{ route('admin.delete.version', $version->slug) }}" onclick="return confirm('Are you sure?')"><i
           class="fa-solid fa-trash"></i></a>
    </div>
  </li>