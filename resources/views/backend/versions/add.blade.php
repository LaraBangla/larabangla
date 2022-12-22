@extends('backend.backend_header_footer', ['title' => 'Add Version'])

@section('content')
  <section>
    <div class="container mx-auto mt-10 rounded-lg bg-gray-100">
      <div class="p-5">
        <div class="mb-5">
          <a class="rounded-lg bg-slate-200 p-2 text-lg hover:bg-slate-300" href="{{ route('admin.show.technology', $technology->slug) }}">
            < Back</a>
        </div>
        <form action="{{ route('admin.store.version', $technology->slug) }}" method="post">
          @csrf
          @method('put')
          <div>
            <label class="text-lg font-bold" for="name">Version Name *</label> <br />
            <input class="w-1/3 py-3" id="name" name="name" type="text" value="{{ old('name') }}" />
            @error('name')
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
            <label class="text-lg font-bold" for="path_folder_name">Folder Name *</label> <br />
            <input class="w-1/3 py-3" id="path_folder_name" name="path_folder_name" type="text" value="{{ old('path_folder_name') }}" required/>
            @error('path_folder_name')
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

          <button class="mt-10 rounded-lg bg-gray-200 px-5 py-3 font-bold uppercase hover:bg-gray-300" type="submit">ADD Version</button>
        </form>
      </div>
    </div>
  </section>
@endsection
