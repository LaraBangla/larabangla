@extends('backend.backend_header_footer', ['title' => 'Add Devision'])

@section('content')
  <section>
    <div class="container mx-auto mt-10 rounded-lg bg-gray-100">
      <div class="p-5">
        <form action="{{ route('admin.store.division') }}" method="post">
          @csrf
          @method('put')
          <div>
            <label class="text-lg font-bold" for="name">Devision Name</label> <br />
            <input class="w-1/3 py-3" id="name" name="name" type="text" value="{{ old('name') }}" required />
            @error('name')
              <div class="mt-1 font-medium text-red-500">{{ $message }}</div>
            @enderror
          </div>

          <div class="mt-5">
            <label class="text-lg font-bold" for="slug">Slug</label> <br />
            <input class="w-1/3 py-3" id="slug" name="slug" type="text" value="{{ old('slug') }}" required />
            @error('slug')
              <div class="mt-1 font-medium text-red-500">{{ $message }}</div>
            @enderror
          </div>

          <button class="mt-10 rounded-lg bg-gray-200 px-5 py-3 font-bold uppercase hover:bg-gray-300" type="submit">ADD Devision</button>
        </form>
      </div>
    </div>
  </section>
@endsection
