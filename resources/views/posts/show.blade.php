@extends('layouts.app')
@section('content')

<div class="container">
    <div class="title-block">
        <div class="container">
            <div class="row">
                <div class="col col-md-12">
                    <div col col-md-12>
                        <img style="width: 100%; height: 350px; margin: 0 auto;"
                            src="{{asset('images/' . $post->image)}}">
                    </div>
                    <h3 class="card-title main-title">
                        {{$post->title}}
                    </h3>

                    <a href="{{route('post.index')}}">
                        <button type="button" class="btn btn-primary float-right">
                            Back to post
                        </button>
                    </a>
                    <hr>
                    <p>{{$post->body}}</p>

                </div>
            </div>
        </div>
    </div>
</div>
<section class="recent-posts">
    <h1 class="title">Recent Stories</h1>

    <div class="row">
        @foreach($recentPosts as $post)
        <div class="col col-md-4" style="width: 20rem;">

            <a class="link" href="{{ route('post.show', $post) }}">
                <div style="width: 20rem;">
                    <img class="image card-img-top" src="{{asset('images/' . $post->image)}}">
                    <h5 class="card-title title">
                        {{$post->title}}
                    </h5>
                </div>
            </a>

        </div>
        @endforeach
    </div>
</section>

@endsection