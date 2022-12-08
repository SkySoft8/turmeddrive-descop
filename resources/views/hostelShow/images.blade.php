@extends('layouts.main')
@section('content')
    <main class="blog-post">
        <div class="container">
                    @foreach($images as $image)
                        <img class="img-thumbnail" style="height: 30vh;"
                             src="{{ url('storage/hostel_post_images/' . $image->images )}}" alt="main_image">
                    @endforeach
                    </div>
    </main>
@endsection
