@extends('layouts.app')
@section('content')
<div class="row posts ">
    @foreach ($posts as $post)

    <div class=" col {{ $loop->iteration % 6 == 0 ? "col-md-4" : "col-md-4" }}">
        <a href="{{route('post.show', $post->id)}}">
            <div class="card" style="width: 20rem;">
                <img class="post-image img-thumbnail" src="{{asset('images/' . $post->image)}}">
                <h5 class="btn btn-light card-title title">{{$post->title}}</h5><br>

            </div>
        </a>
        <!-- </a>-->
    </div>

    @endforeach
</div>


@endsection