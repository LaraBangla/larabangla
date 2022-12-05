@extends('backend.backend_header_footer', ['title' => 'Edit Devision'])

@section('content')
  <section>
    <div class="container mx-auto mt-10 rounded-lg bg-gray-100">
      <h1 class="ml-3 mt-3 text-xl font-bold text-gray-600">Edit Technology Devision</h1>
      <a class="float-right mr-3 rounded-md bg-gray-300 p-3 font-normal hover:bg-gray-400" href="{{ route('admin.show.division') }}">All Tech Devision</a>
      <div class="p-5">
        <form action="{{ route('admin.update.division', $find->id) }}" method="post">
          @csrf
          @method('patch')
          <div>
            <label class="text-lg font-bold" for="name">Devision Name</label> <br />
            <input class="w-1/3 py-3" id="name" name="name" type="text"
                   @if (old('name') != null) value="{{ old('name') }}"
                @else
                    value="{{ $find->name }}" @endif
                   required />
            @error('name')
              <div class="mt-1 font-medium text-red-500">{{ $message }}</div>
            @enderror
          </div>

          <div class="mt-5">
            <label class="text-lg font-bold" for="slug">Slug</label> <br />
            <input class="w-1/3 py-3" id="slug" name="slug" type="text"
                   @if (old('slug') != null) value="{{ old('slug') }}"
                @else
                    value="{{ $find->slug }}" @endif
                   required />
            @error('slug')
              <div class="mt-1 font-medium text-red-500">{{ $message }}</div>
            @enderror
          </div>

          <button class="mt-10 rounded-lg bg-gray-200 px-5 py-3 font-bold uppercase hover:bg-gray-300" type="submit">Update Devision</button>
        </form>
      </div>
    </div>
  </section>
@endsection
