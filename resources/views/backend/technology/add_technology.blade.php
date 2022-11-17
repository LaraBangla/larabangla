@extends('backend.backend_header_footer', ['title' => 'Add Technology'])

@section('content')
<section>
    <div class="container mx-auto bg-gray-100 rounded-lg mt-10 rounded">
        <div class="p-5">
            <form action="#" method="post">
                @csrf
                @method('post')
                <div>
                <label for="name" class="font-bold text-lg">Technology Name</label> <br/>
                <input type="text" name="name" id="name" class="w-1/3 py-3" />
                </div>

                <div class="mt-5">
                <label for="slug" class="font-bold text-lg">Slug</label> <br/>
                <input type="text" name="slug" id="slug" class="w-1/3 py-3" />
                </div>

                <button type="submit" class="mt-10 px-5 py-3 bg-gray-200 uppercase rounded-lg font-bold hover:bg-gray-300  ">ADD Technology</button>
            </form>
        </div>
    </div>
</section>
@endsection