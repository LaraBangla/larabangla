@extends('backend.backend_header_footer', ['title' => 'Edit Lesson'])

@section('content')
  <section>
    <div class="container mx-auto mt-10 rounded-lg bg-gray-100">
      <h1 class="ml-3 mt-3 text-xl font-bold text-gray-600">Edit Lesson</h1>
      <a class="float-right mr-3 rounded-md bg-gray-300 p-3 font-normal hover:bg-gray-400"
         href="{{ route('admin.show.version', ['technology_id' => Crypt::encryptString($find->technology_id), 'version_id' => Crypt::encryptString($find->version_id)]) }}">
        < Back</a>
          <div class="p-5">
            <form action="{{ route('admin.update.lesson', Crypt::encryptString($find->id)) }}" method="post" enctype="multipart/form-data">
              @csrf
              @method('patch')
              <div>
                <label class="text-lg font-bold" for="name">Lesson Name</label> <br />
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

              <div class="mt-5">
                <label class="text-lg font-bold" for="doc_file">Doc file *</label> <br />
                <input class="w-1/3 rounded-lg border bg-slate-100 py-3 px-2" id="doc_file" name="doc_file" type="file"
                       @if (!empty(old('doc_file'))) value="{{ old('doc_file') }}" @endif />
                @error('doc_file')
                  <div class="mt-1 font-medium text-red-500">{{ $message }}</div>
                @enderror
              </div>

              <div class="mt-5">
                <label class="text-lg font-bold" for="keywords">Keywords</label> <br />
                <input class="w-1/3 py-3 form-control tagify" id="keywords" name="keywords" type="text"
                @if (old('keywords') != null)
                value="{{ old('keywords') }}"
                @else
                  value="{{ $find->keywords }}"
                @endif />
                @error('keywords')
                  <div class="mt-1 font-medium text-red-500">{{ $message }}</div>
                @enderror
              </div>

              <div class="mt-5">
                <label class="text-lg font-bold" for="description">Description</label> <br />
                <textarea name="description" id="description" cols="100" rows="10">@if (old('description') != null){{ old('description') }}@else{{ $find->description }}@endif
                  </textarea>
                @error('description')
                  <div class="mt-1 font-medium text-red-500">{{ $message }}</div>
                @enderror
              </div>

              <div class="mt-5">
                <label class="text-lg font-bold" for="order">Order</label> <br />
                <input class="w-1/3 py-3" id="order" name="order" type="text"
                       @if (old('order') != null) value="{{ old('order') }}"
                    @else
                        value="{{ $find->order }}" @endif
                       required />
                @error('order')
                  <div class="mt-1 font-medium text-red-500">{{ $message }}</div>
                @enderror
              </div>

              <button class="mt-10 rounded-lg bg-gray-200 px-5 py-3 font-bold uppercase hover:bg-gray-300" type="submit">Update Lesson</button>
            </form>
          </div>
    </div>
  </section>
@endsection
