@extends('frontend.header_footer')

@section('title'){{ $lesson->title }} - লারা বাংলা@endsection

@section('keywords'){{ $lesson->keywords.','.$lesson->technology->keywords.','.$lesson->version->keywords.','.$lesson->chapter->keywords }}@endsection
@section('description'){{ $lesson->description }}@endsection
@section('pagename'){{ $lesson->technology->name.' '.$lesson->version->name.' Documentation' }}@endsection
@section('category'){{ $lesson->technology->name }}@endsection
@section('that_url'){{ Request::url(); }}@endsection

@if ($lesson->technology->image != null && Storage::disk('tech_images')->exists($lesson->technology->image))
@section('image'){{ asset('storage/tech_images/'.$lesson->technology->image) }} @endsection
@endif


@section('content')
  <section class="docs" x-data="{ mobile_search: false }">
    <div class="container mx-auto">
      <div class="">
        <div class="grid grid-cols-12 gap-3">
          <div class="col-span-12 md:col-span-9">
            <div class="leading-20 mx-5 mt-8 md:pl-10 md:pr-5">
              {{-- version start for mobile --}}
              <div class="mx-3 md:hidden">
                <div class="w-full border-b bg-slate-50 text-left text-gray-600">
                  <label class="w-full bg-slate-50 text-left text-sm uppercase" for="version">Version</label>
                  <select class="select_icon w-full bg-slate-50 pb-1 text-left" id="version" id="" name="version" @change="window.location = $event.target.value">
                    @foreach ($technology->versions as $version)
                    @php
                     $get_lesson = App\Models\Frontend\Technology\Lesson::whereTechnology_id($technology->id)->whereVersion_id($version->id)->whereChapter_id($version->chapter->id)->whereStatus(1)->orderBy('id', 'asc')->select('id', 'slug')->first();
                    @endphp
                    @if ($get_lesson != null)
                      <option value="{{ route('send.to.docs.version',['technology_slug' => $technology->slug, 'version_slug' => $version->slug]) }}"
                      @if ($lesson->version_id == $version->id)
                          selected
                      @endif>
                      {{ $version->name }}
                    </option>
                    @endif
                  @endforeach
                  </select>
                </div>
              </div>
              {{-- version end for mobile --}}
              {{-- search --}}
              <div class="mb-6 md:hidden">
                <div class="mx-3 mt-2 rounded-md" @click="mobile_search =! mobile_search">
                  <div class="flex rounded-md bg-gray-100 py-3 px-3">
                    <div>
                      <span class="pr-4 text-xl font-thin text-gray-500"><i class="fa-solid fa-magnifying-glass"></i></span>
                    </div>
                    <div>
                      <span class="text-lg text-gray-500">অনুসন্ধান</span>
                    </div>
                  </div>
                </div>
                {{-- mobile search body start --}}
                <div class="fixed top-5 right-0 w-screen duration-200" x-show="mobile_search" @click.outside="mobile_search = false"
                     x-transition:enter="transition ml-2 duration-200" x-transition:enter-start="opacity-0 scale-50"
                     x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-100"
                     x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">
                  <div class="mx-4 bg-gray-900 pt-3">
                    <div class="px-3">
                      <div class="flex justify-end">
                        <div @click="mobile_search = false">
                          <div class="text-left text-gray-400"><span><i class="fa-solid fa-xmark"></i></span></div>
                        </div>
                      </div>
                      {{-- search input --}}
                      <div class="flex border-b border-gray-500 pb-1">
                        <div class="mr-3">
                          <span class="text-lg text-gray-400"><i class="fa-solid fa-magnifying-glass"></i></span>
                        </div>
                        <div>
                          <input class="bg-gray-900 text-gray-200  border-transparent focus:border-0 focus:ring-0" type="text" placeholder="ডক অনুসন্ধান">
                        </div>
                      </div>
                      {{-- search instraction --}}
                      <div class="px-5 pt-6 pb-10">
                        <p class="text-sm text-gray-400">
                          ডকুমেন্টেশনে ফলাফল খুঁজে পেতে একটি অনুসন্ধান শব্দ লিখুন।
                        </p>
                      </div>
                      {{-- search footer --}}
                      <div class="border-t border-black pb-2 pt-1 text-right">
                        <span class="text-sm text-gray-400"><span>লারা</span><span class="text-base"> বাংলা</span></span>
                      </div>
                    </div>
                  </div>
                </div>
                {{-- mobile search body end --}}
              </div>
              {{-- search end --}}
              <div :class="mobile_search ? 'blur-sm' : ''" >
                  {!! $data !!}
              </div>
            </div>
          </div>
          <div class="col-span-12 mt-8  pt-1 md:col-span-3">
            {{-- desktop version start --}}
            <div class="-mt-1 w-full  text-center hidden md:block ">
              <label class="w-full text-center font-bold uppercase text-gray-600" for="version">Version</label>
              <select class="select_icon w-full border-b bg-slate-100 pb-1 text-center text-gray-600 focus:border-gray-500 focus:ring-0" id="version" id="" name="version"  @change="window.location = $event.target.value">
                @foreach ($technology->versions as $version)
                  @php
                   $get_lesson = App\Models\Frontend\Technology\Lesson::whereTechnology_id($technology->id)->whereVersion_id($version->id)->whereChapter_id($version->chapter->id)->whereStatus(1)->orderBy('id', 'asc')->select('id', 'slug')->first();
                  @endphp
                  @if ($get_lesson != null)
                    <option value="{{ route('send.to.docs.version',['technology_slug' => $technology->slug, 'version_slug' => $version->slug]) }}"
                    @if ($lesson->version_id == $version->id)
                        selected
                    @endif>
                    {{ $version->name }}
                  </option>
                  @endif
                @endforeach
              </select>
            </div>
            {{-- desktop version end --}}
           
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
