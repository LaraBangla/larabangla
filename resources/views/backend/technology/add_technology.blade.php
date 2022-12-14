@extends('backend.backend_header_footer', ['title' => 'Add Technology'])

@section('content')
  <section>
    <div class="container mx-auto mt-10 rounded-lg bg-gray-100">
      <div class="p-5">
        <form action="{{ route('admin.store.technology') }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('put')
          <div>
            <label class="text-lg font-bold" for="name">Technology Name *</label> <br />
            <input class="w-1/3 py-3" id="name" name="name" type="text" value="{{ old('name') }}" />
            @error('name')
              <div class="mt-1 font-medium text-red-500">{{ $message }}</div>
            @enderror
          </div>

          <div class="mt-4">
            <label class="text-lg font-bold" for="division">Select Division *</label> <br>
            <select class="w-1/3 py-3" id="division" name="division">
              <option class="ml-3 text-base font-bold" value="" @if (old('division') == null) selected @endif disabled>Select</option>

              @foreach ($division as $row)
                <option class="ml-3 text-base font-bold" value="{{ $row->id }}" @if (old('division') == $row->id) selected @endif>
                  {{ $row->name }}</option>
              @endforeach
            </select>
            @error('division')
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
            <label class="text-lg font-bold" for="path_folder_name">Folder *</label> <br />
            <input class="w-1/3 py-3" id="path_folder_name" name="path_folder_name" type="text" value="{{ old('path_folder_name') }}" required/>
            @error('path_folder_name')
              <div class="mt-1 font-medium text-red-500">{{ $message }}</div>
            @enderror
          </div>

          <div class="mt-5">
            <label class="text-lg font-bold" for="keywords">Keywords </label> <br />
            <input class="w-1/3 py-3" id="keywords" name="keywords" type="text" value="{{ old('keywords') }}" />
            @error('keywords')
              <div class="mt-1 font-medium text-red-500">{{ $message }}</div>
            @enderror
          </div>

          <div class="mt-5">
            <label class="text-lg font-bold" for="image">Image *</label> <br />
            <input class="w-1/3 rounded-lg border bg-slate-100 py-3 px-2" id="image" name="image" type="file" value="{{ old('image') }}" />
            @error('image')
              <div class="mt-1 font-medium text-red-500">{{ $message }}</div>
            @enderror
          </div>

          <button class="mt-10 rounded-lg bg-gray-200 px-5 py-3 font-bold uppercase hover:bg-gray-300" type="submit">ADD Technology</button>
        </form>
      </div>
    </div>
  </section>
@endsection
