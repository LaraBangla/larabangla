@extends('backend.backend_header_footer', ['title' => 'Add Lesson'])

@section('content')
  <section>
    <div class="container mx-auto mt-10 rounded-lg bg-gray-100">
      <div class="p-5">
        <div class="mb-5">
          <a class="rounded-lg bg-slate-200 p-2 text-lg hover:bg-slate-300"
             href="{{ route('admin.show.chapter', ['slug' => $chapter->slug]) }}">
            < Back</a>
        </div>
        <form action="{{ route('admin.store.lesson',['slug' => $chapter->slug]) }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('put')
          <div>
            <label class="text-lg font-bold" for="name">Lesson Name *</label> <br />
            <input class="w-1/3 py-3" id="name" name="name" type="text" value="{{ old('name') }}" />
            @error('name')
              <div class="mt-1 font-medium text-red-500">{{ $message }}</div>
            @enderror
          </div>

          <div class="mt-5">
            <label class="text-lg font-bold" for="title">Title *</label> <br />
            <input class="w-1/3 py-3" id="title" name="title" type="text" value="{{ old('title') }}" />
            @error('title')
              <div class="mt-1 font-medium text-red-500">{{ $message }}</div>
            @enderror
          </div>

          <div class="mt-5">
            <label class="text-lg font-bold" for="slug">Slug *</label> <br />
            <input class="w-1/3 py-3" id="slug" name="slug" type="text" value="{{ old('slug') }}" />
            @error('slug')
              <div class="mt-1 font-medium text-red-500">{{ $message }}</div>
            @enderror
          </div>
          <div class="mt-5">
            <label class="text-lg font-bold" for="doc_file">Doc file *</label> <br />
            <input class="w-1/3 rounded-lg border bg-slate-100 py-3 px-2" id="doc_file" name="doc_file" type="file" value="{{ old('doc_file') }}" />
            @error('doc_file')
              <div class="mt-1 font-medium text-red-500">{{ $message }}</div>
            @enderror
          </div>

          <div class="mt-5">
            <label class="text-lg font-bold" for="keywords">Keywords</label> <br />
            <input class="w-1/3 py-3 form-control tagify" id="keywords" name="keywords" type="text" value="{{ old('keywords') }}" data-role="tagsinput" />
            @error('keywords')
              <div class="mt-1 font-medium text-red-500">{{ $message }}</div>
            @enderror
          </div>

          <div class="mt-5">
            <label class="text-lg font-bold" for="description">Description</label> <br />
            <textarea name="description" id="description" cols="100" rows="10">{{ old('description') }}</textarea>
            @error('description')
              <div class="mt-1 font-medium text-red-500">{{ $message }}</div>
            @enderror
          </div>

          <button class="mt-10 rounded-lg bg-gray-200 px-5 py-3 font-bold uppercase hover:bg-gray-300" type="submit">ADD Lesson</button>
        </form>
      </div>
    </div>
  </section>
@endsection
