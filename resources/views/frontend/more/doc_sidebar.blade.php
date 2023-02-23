<li
x-data="{ doc_side_logo: true }"
{{-- if onload screen size is bigger than 767 then auto show doc_side_logo else hide doc_side_logo --}}
x-if="width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
if (width > 767) {
 doc_side_logo = false
}"
>
  <div class="pt-3 pl-1 text-base font-semibold text-gray-600 mb-3 border-b"
  x-show="doc_side_logo"
{{-- on window resize, if screen width is bigger than 767px then hide doc sidebar logo, else show doc sidebar logo --}}
@resize.window="resize_width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
if (resize_width > 767) {
  doc_side_logo = false
  }
  else{
    doc_side_logo = true
  }"
  >
  <a href="{{ route('/') }}"><img class="" src="{{ asset('img/logo.png') }}" alt="LaraBangla Logo" width="45"><span class=" text-gray-500 text-sm">লারা বাংলা</span></a>
  </div>
 </li>

<li class="pt-3 pl-1 text-base font-semibold text-gray-600"><a href="{{ route('/') }}"><span class="text-xl text-gray-500"><i
          class="fa fa-home mr-4"></i></span>বাড়ি</a></li>
@foreach ($chapters as $chapter)

  @if (count($chapter->lessons) > 0)
    <li class="mt-5 mb-2 border-b pb-1 font-bold text-gray-700">{{ $chapter->name }}</li>
  @endif

  @foreach ($chapter->lessons as $lesson)
    <li class="my-2 pl-1 font-bold text-gray-600 md:pl-2"><a href="{{ route('docs',['technology_slug' => $chapter->technology->slug, 'version_slug' => $chapter->version->slug, 'chapter_slug' => $chapter->slug, 'lesson_slug' =>$lesson->slug]) }}">{{ $lesson->name }}</a></li>
  @endforeach
@endforeach
