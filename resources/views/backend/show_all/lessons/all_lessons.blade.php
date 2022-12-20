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