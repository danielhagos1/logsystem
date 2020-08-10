@extends('layouts.app')

@section('content')

<div class="container">
    <div class="title-block">
        <div class="container">
            <div class="row">
                <div class="col col-md-12 ">
                    <div class="col col-md-12 recent-posts">
                        <img class=" image" src="{{asset('images/' . $post->image)}}">
                        <h3 class="titlee">
                            {{$post->title}}
                        </h3>
                    </div>

                    <a href="{{route('admin.post.edit', $post->id)}}">
                        <button type="button" class="btn btn-primary float-right">
                            Edit
                        </button>
                    </a>
                    <form action="{{ route('admin.post.destroy', $post)}}" method="POST" class="float-right">
                        @csrf
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-warning">Delete</button>
                    </form>
                    <a href="{{route('admin.post.index')}}">
                        <button type="button" class="btn btn-primary float-right">
                            Back to post
                        </button>
                    </a>
                    <br>
                    <hr>
                    <p>{{$post->body}}</p>
                </div>
            </div>
        </div>
    </div>
    <section class="recent-posts">
        <h1 class="title">Recent Stories</h1>

        <div class="row">
            @foreach($recentPosts as $post)
            <div class="col col-md-4">

                <a href="{{ route('admin.post.show', $post) }}">
                    <div>
                        <img class="image-thumbnail" src="{{asset('images/' . $post->image)}}">
                        <h5 class="title">
                            {{$post->title}}
                        </h5>
                    </div>
                </a>

            </div>
            @endforeach
        </div>
    </section>

    @endsection