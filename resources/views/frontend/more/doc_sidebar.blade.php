<li class="pt-3 pl-1 text-base font-semibold text-gray-600"><a href="{{ route('/') }}"><span class="text-xl text-gray-500"><i
         class="fa fa-home mr-4"></i></span>হোম</a></li>
@foreach ($chapters as $chapter)
  @if (count($chapter->lessons) > 0)
    <li class="mt-5 mb-2 border-b pb-1 font-bold text-gray-700">{{ $chapter->name }}</li>
  @endif

  @foreach ($chapter->lessons as $lesson)
    <li class="my-2 pl-1 font-bold text-gray-600 md:pl-2"><a href="#">{{ $lesson->name }}</a></li>
  @endforeach
@endforeach
