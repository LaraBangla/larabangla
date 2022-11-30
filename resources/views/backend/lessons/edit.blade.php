@extends('backend.backend_header_footer', ['title' => 'Edit Lesson'])

@section('content')
<section>
    <div class="container mx-auto bg-gray-100 rounded-lg mt-10 ">
        <h1 class="ml-3 mt-3 text-xl font-bold text-gray-600">Edit Lesson</h1>
        <a href="{{ route('admin.show.version',['technology_id' =>Crypt::encryptString($find->technology_id),'version_id'=>Crypt::encryptString($find->version_id)]) }}" class=" float-right mr-3 bg-gray-300 p-3 rounded-md font-normal hover:bg-gray-400">< Back</a>
        <div class="p-5">
            <form action="{{ route('admin.update.lesson',Crypt::encryptString($find->id)) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div>
                <label for="name" class="font-bold text-lg">Lesson Name</label> <br/>
                <input type="text" name="name"
                @if (old('name') != null)
                value="{{ old('name') }}"
                @else
                    value="{{ $find->name }}"
                @endif
                id="name" class="w-1/3 py-3" required/>
                @error('name')
                    <div class=" text-red-500 mt-1 font-medium">{{ $message }}</div>
                @enderror
                </div>

                <div class="mt-5">
                <label for="slug" class="font-bold text-lg">Slug</label> <br/>
                <input type="text" name="slug"
                @if (old('slug') != null)
                value="{{ old('slug') }}"
                @else
                    value="{{ $find->slug }}"
                @endif
                id="slug" class="w-1/3 py-3" required />
                @error('slug')
                <div class=" text-red-500 mt-1 font-medium">{{ $message }}</div>
                @enderror
                </div>

                <div class="mt-5">
                    <label for="doc_file" class="font-bold text-lg">Doc file *</label> <br/>
                    <input type="file" name="doc_file"
                    @if (!empty(old('doc_file')))
                        value="{{ old('doc_file') }}"
                    @endif
                     id="doc_file" class="border rounded-lg bg-slate-100 w-1/3 py-3 px-2" />
                        @error('doc_file')
                            <div class=" text-red-500 mt-1 font-medium">{{ $message }}</div>
                        @enderror
                </div>

                <div class="mt-5">
                    <label for="order" class="font-bold text-lg">Order</label> <br/>
                    <input type="text" name="order"
                    @if (old('order') != null)
                    value="{{ old('order') }}"
                    @else
                        value="{{ $find->order }}"
                    @endif
                    id="order" class="w-1/3 py-3" required />
                    @error('order')
                    <div class=" text-red-500 mt-1 font-medium">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="mt-10 px-5 py-3 bg-gray-200 uppercase rounded-lg font-bold hover:bg-gray-300  ">Update Lesson</button>
            </form>
        </div>
    </div>
</section>
@endsection
