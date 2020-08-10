@extends('layouts.app')
@section('content')
<div class="container row">
    <a href="{{route('admin.post.create')}}">
        <button type="button" class="btn btn-primary float-right">
            Create New Post
        </button>
    </a>
</div>
<div class="row">

    @foreach ($posts as $post)

    <div class="col {{ $loop->iteration % 6 == 0 ? "col-md-4" : "col-md-4" }}">


        <a href="{{route('admin.post.show', $post->id)}}">
            <div class="posts images">
                <img class="images" src="{{asset('images/' . $post->image)}}">

                <h5 class="btn btn-light titlee">
                    {{$post->title}}<br> <small>By: {{$post->name}} On: {{$post->created_at}}</small>
                </h5>


            </div>
        </a>
        <!-- </a>-->
    </div>

    @endforeach
</div>


@endsection